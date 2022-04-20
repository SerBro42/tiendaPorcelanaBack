<?php

namespace App\Http\Controllers;

use App\contactForm;
use Illuminate\Http\Request;

class ContactFormController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required|string|min:10'
        ]);

        $contactForm = new contactForm;
        $contactForm->name = $request->name;
        $contactForm->email = $request->email;
        $contactForm->phone = $request->phone;
        $contactForm->message = $request->message;
        $contactForm->save();
        return response()->json(['message'=>'Contact form sent successfully'], 200);
    }
}
