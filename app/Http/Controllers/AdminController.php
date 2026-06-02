<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\NewsPost;
use App\Models\Testimonial;

class AdminController extends Controller
{
    // Admin dashboard
    public function index()
    {
        $products = Product::all();
        $pendingTestimonials = Testimonial::pending()->count();
        $latestNews = NewsPost::getLatest();

        return view('admin.index', compact('products', 'pendingTestimonials', 'latestNews'));
    }

    // Show add product form
    public function createProduct()
    {
        return view('admin.products.create');
    }

    // Store new product
    public function storeProduct(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'required|string',
            'price'       => 'required|numeric|min:0',
            'category'    => 'nullable|string|max:100',
            'colour'      => 'nullable|string|max:50',
            'size'        => 'nullable|string|max:50',
            'available'   => 'nullable|boolean',
        ]);

        Product::create([
            'name'        => $request->name,
            'description' => $request->description,
            'price'       => $request->price,
            'category'    => $request->category,
            'colour'      => $request->colour,
            'size'        => $request->size,
            'available'   => $request->has('available') ? true : false,
        ]);

        return redirect('/admin')
            ->with('success', 'Product added successfully.');
    }

    // Show edit product form
    public function editProduct($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.edit', compact('product'));
    }

    // Update product
    public function updateProduct(Request $request, $id)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'required|string',
            'price'       => 'required|numeric|min:0',
            'category'    => 'nullable|string|max:100',
            'colour'      => 'nullable|string|max:50',
            'size'        => 'nullable|string|max:50',
            'available'   => 'nullable|boolean',
        ]);

        $product = Product::findOrFail($id);
        $product->update([
            'name'        => $request->name,
            'description' => $request->description,
            'price'       => $request->price,
            'category'    => $request->category,
            'colour'      => $request->colour,
            'size'        => $request->size,
            'available'   => $request->has('available') ? true : false,
        ]);

        return redirect('/admin')
            ->with('success', 'Product updated successfully.');
    }


    // Delete product — mark as unavailable instead of deleting
    public function deleteProduct($id)
    {
        $product = Product::findOrFail($id);
        $product->update(['available' => false]);

        return redirect('/admin')
            ->with('success', 'Product removed from store.');
    }

    // Post news item
    public function storeNews(Request $request)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        NewsPost::create([
            'Content' => $request->content,
        ]);

        return redirect('/admin')
            ->with('success', 'News post published.');
    }
}