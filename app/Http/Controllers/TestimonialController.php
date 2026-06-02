<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Auth;

class TestimonialController extends Controller
{
    // Show all approved testimonials
    public function index()
    {
        $testimonials = Testimonial::approved()
            ->with('customer')
            ->latest()
            ->get();

        return view('testimonials.index', compact('testimonials'));
    }

    // Show submit form
    public function create()
    {
        return view('testimonials.create');
    }

    // Store new testimonial
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        Testimonial::create([
            'CustEmail' => Auth::user()->email,
            'Content'   => $request->content,
            'Approved'  => false,
        ]);

        return redirect('/testimonials')
            ->with('success', 'Thank you! Your testimonial has been submitted and is awaiting approval.');
    }
    
    // Admin — show all pending testimonials
    public function pending()
    {
        $testimonials = Testimonial::pending()
            ->with('customer')
            ->latest()
            ->get();

        return view('testimonials.pending', compact('testimonials'));
    }

    // Admin — approve a testimonial
    public function approve($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        $testimonial->update(['Approved' => true]);

        return redirect('/admin/testimonials')
            ->with('success', 'Testimonial approved.');
    }

    // Admin — reject/delete a testimonial
    public function reject($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        $testimonial->delete();

        return redirect('/admin/testimonials')
            ->with('success', 'Testimonial rejected and removed.');
    }
}