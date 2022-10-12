@props(['date'])
<div {{ $attributes }}>
    <?php

    /* Méthode permettant de transformer l'affichage de la date de publication d'un article */

    $date; // Récupération du format de date initial

    /* Découpage de la date en trois parties (Année, Mois et Jour) */

    $jour = date('d', strtotime($date));
    $mois = date('m', strtotime($date));
    $annee = date('Y', strtotime($date));

    /* Tableau permmettant d'effectuer la comparaison de la valeur avec le mois de l'année */

    $mois_table = [
            '01' => 'Janvier',
            '02' => 'Février',
            '03' => 'Mars',
            '04' => 'Avril',
            '05' => 'Mai',
            '06' => 'Juin',
            '07' => 'Juillet',
            '08' => 'Août',
            '09' => 'Septembre',
            '10' => 'Octobre',
            '11' => 'Novembre',
            '12' => 'Décembre',
    ];

    /* Comparaison de la valeur du mois pour retourner le mot correspondant à celle-ci */

    ?>

    <p>
        {{ $jour }} {{ $mois_table[$mois] }} {{ $annee }}
    </p>

</div>