<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Purchase;
use App\Models\PurchaseItem;
use App\Models\Product;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderConfirmationBuyer;
use App\Mail\OrderConfirmationStore;

class OrderController extends Controller
{
    public function submit(Request $request)
    {
        // 1 — Validate inputs
        $validated = $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name'  => 'required|string|max:100',
            'email'      => 'required|email|max:255',
            'phone'      => 'required|string|max:20',
            'address'    => 'required|string|max:255',
            'city'       => 'required|string|max:100',
            'state'      => 'required|string|max:100',
            'country'    => 'required|string|max:100',
            'postcode'   => 'required|string|max:20',
        ]);

        // 2 — Get cart
        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect('/cart')->with('error', 'Your cart is empty.');
        }

        // 3 — Create or update customer
        $customer = Customer::updateOrCreate(
            ['CustEmail' => $validated['email']],
            [
                'CustFName' => $validated['first_name'],
                'CustLName' => $validated['last_name'],
                'Phone'     => $validated['phone'],
                'Address'   => $validated['address'],
                'City'      => $validated['city'],
                'State'     => $validated['state'],
                'Country'   => $validated['country'],
                'PostCode'  => $validated['postcode'],
            ]
        );

        // 4 — Create purchase
        $purchase = Purchase::create([
            'CustEmail' => $customer->CustEmail,
        ]);

        // 5 — Create purchase items
        $total = 0;
        foreach ($cart as $productId => $details) {
            PurchaseItem::create([
                'PurchaseNo' => $purchase->PurchaseNo,
                'ProductNo'  => $details['ProductNo'],
                'Quantity'   => $details['quantity'],
            ]);
            $total += $details['price'] * $details['quantity'];
        }

        // 6 — Clear the cart
        session()->forget('cart');

       // 8 — Send email to buyer
        Mail::to($customer->CustEmail)
            ->send(new OrderConfirmationBuyer(
                $purchase->load('purchaseItems.product', 'customer')
            ));

        // 9 — Send email to store handler
        Mail::to('thuanquangnguyen2003@gmail.com')
            ->send(new OrderConfirmationStore(
                $purchase->load('purchaseItems.product', 'customer')
            ));
                // 7 — Redirect to confirmation page
                return redirect('/order/confirmation/' . $purchase->PurchaseNo)
                    ->with('success', 'Your order has been placed successfully!');
            }

    public function confirmation($purchaseNo)
    {
        $purchase = Purchase::with(['purchaseItems.product', 'customer'])
            ->where('PurchaseNo', $purchaseNo)
            ->firstOrFail();

        return view('order.confirmation', compact('purchase'));
    }
}