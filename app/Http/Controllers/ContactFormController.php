<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;
use App\Mail\contactMail;

class ContactFormController extends Controller
{
    /* Page de création du formulaire de contact */

    public function createForm(Request $request)
    {
        return view('contact');
    }

    /* Stockage du data du formulaire */

    public function storeForm(Request $request)
    {
        /* Validation des données */

        $request->validate([
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'adresse_mail' => 'required|string',
            'telephone',
            'message' => 'required',
        ]);

        /* Stockage des données */

        Contact::create($request->all());

        /* Envoi d'un message à l'admin du site */

        Mail::to('jim714@hotmail.fr')
            ->send(new contactMail($request->except('_token')));

        /* Redirection sur la page de contact avec message de réussite */

        return redirect()->route('contact')
                        ->with('success', 'Votre message a bien été envoyé. Nous vous réponderons dans les plus brefs délais !');
    }
}
