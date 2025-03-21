@props(["nom_ecurie"])
@props(["points_ecurie"])
<div {{ $attributes }}>
    <?php

        /* Récupération des données du nom de l'écurie */

        $nom_ecurie;

        /* Récupération des données du nombre de points */

        $points_ecurie;

        /* Init des variables affichées par le composant */

        $imgEcurie = '';
        $ecurie = $nom_ecurie;
        $drapEcurie = '';
        $points = $points_ecurie;

        /* Condition pour chacune des écuries */

        if ($ecurie == 'Alpine') {
            $imgEcurie = asset('images/ecurie/logo_alpine.png');
            $drapEcurie = asset('images/ecurie/logo_france.png');
        }
        if ($ecurie == 'Aston Martin') {
            $imgEcurie = asset('images/ecurie/logo_astonmartin.png');
            $drapEcurie = asset('images/ecurie/logo_royaumeuni.png');
        }
        if ($ecurie == 'Ferrari') {
            $imgEcurie = asset('images/ecurie/logo_ferrari.png');
            $drapEcurie = asset('images/ecurie/logo_italie.png');
        }
        if ($ecurie == 'Haas') {
            $imgEcurie = asset('images/ecurie/logo_haas.png');
            $drapEcurie = asset('images/ecurie/logo_etatsunis.png');
        }
        if ($ecurie == 'Mclaren') {
            $imgEcurie = asset('images/ecurie/logo_mclaren.png');
            $drapEcurie = asset('images/ecurie/logo_royaumeuni.png');
        }
        if ($ecurie == 'Mercedes') {
            $imgEcurie = asset('images/ecurie/logo_mercedes.png');
            $drapEcurie = asset('images/ecurie/logo_allemagne.png');
        }
        if ($ecurie == 'Racing Bulls') {
            $imgEcurie = asset('images/ecurie/logo_racing_bulls.png');
            $drapEcurie = asset('images/ecurie/logo_italie.png');
        }
        if ($ecurie == 'RedBull') {
            $imgEcurie = asset('images/ecurie/logo_redbull.png');
            $drapEcurie = asset('images/ecurie/logo_autriche.png');
        }
        if ($ecurie == 'Sauber') {
            $imgEcurie = asset('images/ecurie/logo_stakef1.png');
            $drapEcurie = asset('images/ecurie/logo_suisse.png');
        }
        if ($ecurie == 'Williams') {
            $imgEcurie = asset('images/ecurie/logo_williams.png');
            $drapEcurie = asset('images/ecurie/logo_royaumeuni.png');
        }
    ?>

    <!-- Affichage des données (Nom de l'écurie et son nombre de points) -->

    <p>
        <img src="{{ $imgEcurie }}" alt="Logo de l'écurie"> <span class="nom-ecurie">{{ $nom_ecurie }}</span> <img src="{{ $drapEcurie }}" alt="Drapeau de nationalité de l'écurie"> <span class="points-ecurie">{{ $points }} pts</span>
    </p>
</div>