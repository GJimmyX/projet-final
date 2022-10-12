<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Lignes de validation en langue française
    |--------------------------------------------------------------------------
    |
    | Les lignes en langue française suivantes contiennent les messages
    | d'erreur par défaut utilisés par la classe Validator.
    | Certaines règles ont plusieurs versions comme les règles de taille.
    | Il est possible de modifier chacun des messages écrit ci-dessous.
    |
    */

    'accepted' => ':attribute doit être répandu.',
    'accepted_if' => ':attribute doit être répandu quand :other a :value.',
    'active_url' => ':attribute n\'est pas une URL valide.',
    'after' => ':attribute doit être une date après :date.',
    'after_or_equal' => ':attribute doit être une date après OU égale à :date.',
    'alpha' => ':attribute doit contenir uniquement des lettres',
    'alpha_dash' => ':attribute doit contenir uniquement des lettres, nombres, espaces et sous-tirets.',
    'alpha_num' => ':attribute doit contenir uniquement des lettres et des nombres',
    'array' => ':attribute doit être un tableau.',
    'before' => ':attribute doit être une date avant :date.',
    'before_or_equal' => ':attribute doit être une date avant OU égale à :date.',
    'between' => [
        'array' => ':attribute est obliagtoirement compris entre :min et :max objets.',
        'file' => ':attribute est obligatoirement compris entre :min et :max kilo-octets.',
        'numeric' => ':attribute est obligatoirement compris entre :min et :max.',
        'string' => ':attribute est obligatoirement compris entre :min et :max caractères.',
    ],
    'boolean' => 'Le champ ":attribute" doit être vrai OU faux.',
    'confirmed' => 'La confirmation de ":attribute" n\'est pas possible.',
    'current_password' => 'Le mot de passe est incorrect.',
    'date' => ':attribute n\'est pas une date valide.',
    'date_equals' => ':attribute doit être une date égale à :date.',
    'date_format' => ':attribute n\'est pas au format : :format.',
    'declined' => ':attribute doit être refusé.',
    'declined_if' => ':attribute doit être refusé quand :other a :value.',
    'different' => ':attribute et :other doivent être différents.',
    'digits' => ':attribute doit être de :digits chiffres.',
    'digits_between' => ':attribute doit être entre :min et :max chiffres.',
    'dimensions' => ':attribute de mauvaises dimensions d\'image.',
    'distinct' => 'Le champ ":attribute" a une valeur dupliquée.',
    'doesnt_start_with' => ':attribute ne doit pas commencer avec l\'une des valeurs suivantes : :values.',
    'email' => ':attribute doit être une adresse email valide.',
    'ends_with' => ':attribute doit se terminer avec l\'une des valeurs suivantes : :values.',
    'enum' => 'L\'attribut selectionné ":attribute" est invalide.',
    'exists' => 'L\'attribut selectionné ":attribute" existe déjà.',
    'file' => ':attribute doit être un fichier.',
    'filled' => 'Le champ ":attribute" doit avoir une valeur.',
    'gt' => [
        'array' => ':attribute devrait avoir plus de :value objets.',
        'file' => ':attribute devrait être plus grand que :value kilo-octets.',
        'numeric' => ':attribute devrait être plus grand que :value.',
        'string' => ':attribute devrait avoir plus de :value caractères.',
    ],
    'gte' => [
        'array' => ':attribute devrait avoir :value objets ou plus.',
        'file' => ':attribute devrait être plus grand que OU égale à :value kilo-octets.',
        'numeric' => ':attribute devrait être plus grand que OU égale à :value.',
        'string' => ':attribute devrait avoir plus de OU égale à :value caractères.',
    ],
    'image' => ':attribute doit être une image.',
    'in' => 'L\'attribut selectionné ":attribute" est invalide.',
    'in_array' => 'Le champ ":attribute" n\'existe pas dans :other.',
    'integer' => ':attribute doit être un entier (INT,DINT).',
    'ip' => ':attribute doit être une adresse IP valide.',
    'ipv4' => ':attribute doit être une adresse IPv4 valide.',
    'ipv6' => ':attribute doit être une adresse IPv6 valide.',
    'json' => ':attribute doit être une chaîne de caractères JSON valide.',
    'lt' => [
        'array' => ':attribute doit avoir moins de :value objets.',
        'file' => ':attribute doit être de moins de :value kilo-octets.',
        'numeric' => ':attribute doit être plus petit que :value.',
        'string' => ':attribute doit avoir moins de :value caractères.',
    ],
    'lte' => [
        'array' => ':attribute doit avoir :value objets ou moins.',
        'file' => ':attribute doit être de moins de OU égale à :value kilo-octets.',
        'numeric' => ':attribute doit être plus petit que OU égale à :value.',
        'string' => ':attribute doit avoir moins de OU égale à :value caractères.',
    ],
    'mac_address' => ':attribute doit être une adresse MAC valide.',
    'max' => [
        'array' => ':attribute ne devrait pas avoir plus de :max objets.',
        'file' => ':attribute ne devrait pas être plus grand que :max kilo-octets.',
        'numeric' => ':attribute ne devrait pas être plus grand que :max.',
        'string' => ':attribute ne devrait pas avoir plus de :max caractères.',
    ],
    'mimes' => ':attribute doit être un fichier avec comme type : :values.',
    'mimetypes' => ':attribute doit être un fichier avec comme type : :values.',
    'min' => [
        'array' => ':attribute doit avoir au moins :min objets.',
        'file' => ':attribute doit avoir au moins :min kilo-octets.',
        'numeric' => ':attribute doit avoir au moins :min.',
        'string' => ':attribute doit avoir au moins :min caractères.',
    ],
    'multiple_of' => ':attribute doit être un multiple de :value.',
    'not_in' => 'L`\'attribut selectionné ":attribute" est incorrect.',
    'not_regex' => 'Le format de ":attribute" est incorrect.',
    'numeric' => ':attribute doit être un nombre.',
    'password' => [
        'letters' => ':attribute doit contenir au moins une lettre.',
        'mixed' => ':attribute doit contenir au moins une lettre minuscule ET majuscule.',
        'numbers' => ':attribute doit contenir au moins un nombre.',
        'symbols' => ':attribute doit contenir au moins un symbole.',
        'uncompromised' => 'L\'attribut donné ":attribute" est apparu dans une fuite de données. S\'il vous plaît, choisissez un attribut ":attribute" différent.',
    ],
    'present' => 'Le champ ":attribute" doit être présent.',
    'prohibited' => 'Le champ ":attribute" est interdit.',
    'prohibited_if' => 'Le champ ":attribute" est interdit quand :other a :value.',
    'prohibited_unless' => 'Le champ ":attribute" est interdit sauf si :other est dans :values.',
    'prohibits' => 'Le champ ":attribute" interdit à :other d\'être présent.',
    'regex' => 'Le format de ":attribute" est invalide.',
    'required' => 'Le champ ":attribute" est obligatoire.',
    'required_array_keys' => 'Le champ ":attribute" doit contenir des entrées présentes dans : :values.',
    'required_if' => 'Le champ ":attribute" est obligatoire quand :other a :value.',
    'required_unless' => 'Le champ ":attribute" est oblgatoire sauf si :other est dans :values.',
    'required_with' => 'Le champ ":attribute" est obligatoire quand :values est présent.',
    'required_with_all' => 'Le champ ":attribute" est obligatoire quand :values sont présentes.',
    'required_without' => 'Le champ ":attribute" est obligatoire quand :values est non présent.',
    'required_without_all' => 'Le champ ":attribute" est obligatoire quand aucnnes entrées de : :values sont présentes.',
    'same' => ':attribute et :other doivent correspondre.',
    'size' => [
        'array' => ':attribute doit contenir :size objets.',
        'file' => ':attribute doit être de :size kilo-octets.',
        'numeric' => ':attribute doit être de :size.',
        'string' => ':attribute doit être de :size caractères.',
    ],
    'starts_with' => ':attribute doit commencer avec l\'une des entrées suivantes : :values.',
    'string' => ':attribute doit être une chaîne de caratères.',
    'timezone' => ':attribute doit être un fuseau horaire valide.',
    'unique' => ':attribute est déjà pris.',
    'uploaded' => ':attribute n\'a pas été transmis.',
    'url' => ':attribute doit être une URL valide.',
    'uuid' => ':attribute doit être un UUID valide.',

    /*
    |--------------------------------------------------------------------------
    | Lignes de validation en langue française personalisées
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Attributs de validation personalisés
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
