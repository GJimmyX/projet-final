<!-- Template mail envoyé à l'admin après qu'un visiteur ait fait une demande de contact sur le site -->

<h3>Bonjour, </h3> <br><br>

<p>
    Vous avez un mail de {{ $contact['prenom'] }} avec comme détails : <br><br>
    <br>
    Nom : {{ $contact['nom'] }},<br>
    Adresse Mail : {{ $contact['adresse_mail'] }},<br>
    Téléphone éventuel : {{ $contact['telephone'] }},<br>
    Message : {{ $contact['message'] }}.
    <br>
    Bonne réception.
</p>