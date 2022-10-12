@extends('layouts.header')

@section('title', 'Contact')

@section('contenu')
    <main class="contact">

        <!-- Message concernant l'envoi du formulaire -->

        <div class="contact-message">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
        </div>

        <!-- Formulaire de contact du site 'Passionné de Formule 1' -->

        <form action="{{ route('contact.store') }}" method="post" enctype="multipart/form-data" class="form-contact">

            @csrf

            <div class="row form-contenu">
                <div class="col form-contact-champs-infos">
                    <!-- Nom de Contact -->
                    <div class="form-contact-champ-nom">
                        <label for="nom"><p class="label-champ">Votre Nom<i>*</i> : </p></label>
                        <input type="text" name="nom" id="nom" class="form-control" required>
                    </div>
                    <!-- Prénom de Contact -->
                    <div class="form-contact-champ-prenom">
                        <label for="prenom"><p class="label-champ">Votre Prénom<i>*</i> : </p></label>
                        <input type="text" name="prenom" id="prenom" class="form-control" required>
                    </div>
                    <!-- Adresse mail de Contact -->
                    <div class="form-contact-champ-adresse-mail">
                        <label for="adresse_mail"><p class="label-champ">Votre Adresse mail<i>*</i> : </p></label>
                        <input type="text" name="adresse_mail" id="adresse_mail" class="form-control" required>
                    </div>
                    <!-- Téléphone de Contact -->
                    <div class="form-contact-champ-telephone">
                        <label for="telephone"><p class="label-champ">Votre Téléphone (Facultatif) : </p></label>
                        <input type="text" name="telephone" id="telephone" class="form-control">
                    </div>
                </div>
                <!-- Message de contact -->
                <div class="col form-contact-champ-message">
                    <p class="label-champ">Votre Message<i>*</i> : </p>
                    <textarea name="message" id="message" placeholder="Votre Message" cols="30" rows="10" class="form-control" required></textarea>
                </div>
            </div>

            <!-- Champs obligatoires -->
            
            <p class="text-obligatoire"><i>* </i>: Champs obligatoires</p>

            <!-- Conditions RGPD du formulaire -->

            <div class="contact-rgpd">
                <div class="check-rgpd">
                    <input type="checkbox" name="rgpd" id="rgpd" class="form-check-input">
                    <label for="rgpd"><i class="rgpd-obligatoire">* </i></label>
                </div>
                <p class="text-rgpd">En cochant cette case, je m’engage à accepter par la présente, les conditions relatives à la politique RGPD du site <i>Passionné de Formule 1</i>.</p>
            </div>

            <!-- Bouton d'envoi du formulaire (rempli) de contact -->

            <div class="contact-envoy">
                <button type="submit" class="btn-envoy"><img src="{{ url('/images/bouton_icones/envoyContactBtn.png') }}" alt="Icône du bouton d'envoi"><span>Envoyer</span></button>
            </div>
        </form>

    </main>

    @include('layouts.footer')

@endsection