<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Purchase;

class OrderConfirmationBuyer extends Mailable
{
    use Queueable, SerializesModels;

    public Purchase $purchase;

    public function __construct(Purchase $purchase)
    {
        $this->purchase = $purchase;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Order Confirmation #' . $this->purchase->PurchaseNo,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.order-confirmation-buyer',
        );
    }
}