<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMessage;

class ContactController extends Controller
{
    public function create()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        // Validatie van het formulier
        $request->validate([
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:1000',
        ]);

        // Verzend e-mail naar het gewenste adres
        Mail::raw($request->message, function ($message) use ($request) {
            $message->to('info@coc-check.com') // Ontvanger
                ->subject('Contact Form: ' . $request->subject) // Onderwerp
                ->from('noreply@coc-check.com', $request->name . ' ' . $request->last_name); // Afzender
        });

        return redirect()->route('contact.create')->with('success', 'Thank you! Your message has been sent.');
    }
}
