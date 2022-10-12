/**
 * Cookie Generator
 * @author eurowebpage
 */
if (typeof(COOKIE) == 'undefined'){
    COOKIE = {};
}

/** Configuration du cookie */

COOKIE_CSSHOST = null; // Le script charge le fichier CSS présent dans le dossier 'cookie'.

/** Icône en SVG pour l'apparition de la carte */

COOKIE.Browser = null;
COOKIE.QueryParams = {};
COOKIE.Initialized = false;
COOKIE.Init = function(){
    if(COOKIE.QueryParams.mode != undefined && COOKIE.QueryParams.mode =="demo"){
        COOKIE.getReady();
    } else {
        if (!COOKIE.Utils.getCookie("app_cookie")) {
            COOKIE.getReady();
        }
    }
}
COOKIE.getReady = function(){
    if (COOKIE.Initialized == false) {
        COOKIE.Initialized = true;
        var scripts = document.getElementsByTagName("script");
        for (var i = 0; i < scripts.length; i++) {
            var script = scripts[i];
            if (script.src.indexOf('cookie.js') != -1) {
                COOKIE.Utils.getQueryParams(script.src, COOKIE.QueryParams);
                COOKIE_CSSHOST = script.src.replace(".js", ".css");
            }
        }
        COOKIE.CSS.add();
        COOKIE.Noti.build();
    }
}
COOKIE.CSS = {
    added : false,
    add : function(){

        // import css

        if (typeof(COOKIE_HAS_CSS) == "undefined" && COOKIE.CSS.added == false){
            COOKIE.CSS.added = true;
            var css = document.createElement("link");
            css.setAttribute("rel", "stylesheet");
            css.setAttribute("type", "text/css");
            css.setAttribute("charset", "utf-8");
            css.setAttribute("href", COOKIE_CSSHOST);
            document.body.appendChild(css);
        }
    }
}
COOKIE.Noti = {
    build : function(){

        // Carte faite en JavaScript

        var embedBottomPlayer = document.getElementById("cookie_notification");
        if (embedBottomPlayer == null){

            // Corps de la carte

            var bottomPlayer = document.createElement("div");
            bottomPlayer.setAttribute("id", "cookie_notification");
            bottomPlayer.style.visibility = "hidden";
            bottomPlayer.className = COOKIE.QueryParams.skin ? COOKIE.QueryParams.skin : "cookie";
            
            // message cookie_notification

            var messageBox = document.createElement("div");
            messageBox.setAttribute("id", "cookie_message");
            messageBox.innerHTML = COOKIE.QueryParams.msg ? bbcodeParser.bbcodeToHtml(decodeURIComponent(COOKIE.QueryParams.msg)) : bbcodeParser.bbcodeToHtml("En poursuivant votre navigation sur ce site, vous acceptez l’utilisation de Cookies pour réaliser des statistiques de visites. Pour plus d'infos, consulter la [url=https://eurowebpage.com/fr/politique-de-cookies/] Politique des Cookies[/url].");
            bottomPlayer.appendChild(messageBox);

            // accept_button

            var acceptButton = document.createElement("div");
            acceptButton.setAttribute("id", "cookie_accept_button");
            var accept_text = "";
            COOKIE.QueryParams.accept_text != undefined ? accept_text = COOKIE.QueryParams.accept_text : accept_text = "J'accepte"
            acceptButton.setAttribute("title", "Accepter");
            acceptButton.innerHTML = accept_text;
            acceptButton.onclick = COOKIE.Noti.acceptHide;
            bottomPlayer.appendChild(acceptButton);

            // close_button

            var closeButton = document.createElement("div");
            closeButton.setAttribute("id", "cookie_close_button");
            var refuse_text = "";
            COOKIE.QueryParams.refuse_text != undefined ? refuse_text = COOKIE.QueryParams.refuse_text : refuse_text = "Je refuse"
            closeButton.setAttribute("title", "Fermer");
            closeButton.innerHTML = refuse_text;
            closeButton.onclick = COOKIE.Noti.refuseHide;
            bottomPlayer.appendChild(closeButton);

            document.body.appendChild(bottomPlayer);
        }
    },

    // Fonction pour accept_button (Disparition de la carte)

    acceptHide : function(){
        var fadeTarget = document.getElementById("cookie_notification");
        fadeTarget.style.opacity = '0';
        setTimeout(function(){fadeTarget.parentNode.removeChild(fadeTarget);}, 1000);
        var d = new Date();

        // La carte du cookie ne s'affiche pas avant 1 an si elle est acceptée

        d.setTime(d.getTime() + (365 * 24 * 60 * 60 * 1000));
        var expires = "expires=" + d.toUTCString();
        document.cookie = "app_cookie=1; " + expires;
    },

    // Fonction pour close_button (Disparition de la carte)

    refuseHide : function(){
        var fadeTarget = document.getElementById("cookie_notification");
        fadeTarget.style.opacity = '0';
    },
}

// Fonction de conversion des BBCode and HTML code - Source : http;//coursesweb.net/javascript/

var BBCodeHTML = function() {
    var me = this;            // stores the object instance
    var token_match = /{[A-Z_]+[0-9]*}/ig;

    // Définition des BBCode utilisés

    var tokens = {
        'URL' : '((?:(?:[a-z][a-z\\d+\\-.]*:\\/{2}(?:(?:[a-z0-9\\-._~\\!$&\'*+,;=:@|]+|%[\\dA-F]{2})+|[0-9.]+|\\[[a-z0-9.]+:[a-z0-9.]+:[a-z0-9.:]+\\])(?::\\d*)?(?:\\/(?:[a-z0-9\\-._~\\!$&\'*+,;=:@|]+|%[\\dA-F]{2})*)*(?:\\?(?:[a-z0-9\\-._~\\!$&\'*+,;=:@\\/?|]+|%[\\dA-F]{2})*)?(?:#(?:[a-z0-9\\-._~\\!$&\'*+,;=:@\\/?|]+|%[\\dA-F]{2})*)?)|(?:www\\.(?:[a-z0-9\\-._~\\!$&\'*+,;=:@|]+|%[\\dA-F]{2})+(?::\\d*)?(?:\\/(?:[a-z0-9\\-._~\\!$&\'*+,;=:@|]+|%[\\dA-F]{2})*)*(?:\\?(?:[a-z0-9\\-._~\\!$&\'*+,;=:@\\/?|]+|%[\\dA-F]{2})*)?(?:#(?:[a-z0-9\\-._~\\!$&\'*+,;=:@\\/?|]+|%[\\dA-F]{2})*)?)))',
        'LINK' : '([a-z0-9\-\./]+[^"\' ]*)',
        'EMAIL' : '((?:[\\w\!\#$\%\&\'\*\+\-\/\=\?\^\`{\|\}\~]+\.)*(?:[\\w\!\#$\%\'\*\+\-\/\=\?\^\`{\|\}\~]|&)+@(?:(?:(?:(?:(?:[a-z0-9]{1}[a-z0-9\-]{0,62}[a-z0-9]{1})|[a-z])\.)+[a-z]{2,6})|(?:\\d{1,3}\.){3}\\d{1,3}(?:\:\\d{1,5})?))',
        'TEXT' : '(.*?)',
        'SIMPLETEXT' : '([a-zA-Z0-9-+.,_ ]+)',
        'INTTEXT' : '([a-zA-Z0-9-+,_. ]+)',
        'IDENTIFIER' : '([a-zA-Z0-9-_]+)',
        'COLOR' : '([a-z]+|#[0-9abcdef]+)',
        'NUMBER'  : '([0-9]+)'
    };

    var bbcode_matches = [];        // Comparaison des BBCode par rapport au HTML

    var html_tpls = [];             // Grilles (templates) HTML pour la conversion de l'HTML en BBCode

    var html_matches = [];          // Comparaison de l'HTML par rapport aux BBCodes

    var bbcode_tpls = [];           // Grilles (templates) BBCodes pour la conversion des BBCode en HTML

    /**
     * Conversion du BBCode en une expression régulière
     */
    var _getRegEx = function(str) {
        var matches = str.match(token_match);
        var nrmatches = matches.length;
        var i = 0;
        var replacement = '';

        if (nrmatches <= 0) {
            return new RegExp(preg_quote(str), 'g');        // Pas de token donc la chaîne de caractères est récupérée
        }

        for(; i < nrmatches; i += 1) {

            // Suppression des {, } and numéros présents dans le token, on peut donc comparer avec les clés de token

            var token = matches[i].replace(/[{}0-9]/g, '');

            if (tokens[token]) {

                // On récupère rien avant le token

                replacement += preg_quote(str.substr(0, str.indexOf(matches[i]))) + tokens[token];

                // On supprime tout avant la fin du token : token utilisable
                // avec le prochain. Des parties peuvent être récupérées

                str = str.substr(str.indexOf(matches[i]) + matches[i].length);
            }
        }

        replacement += preg_quote(str);      // Ajout peu importe ce qu'il reste à la chaîne de caractères

        return new RegExp(replacement, 'gi');
    };

    /**
     * Génération d'une grille de conversion BBCode
     */
    var _getTpls = function(str) {
        var matches = str.match(token_match);
        var nrmatches = matches.length;
        var i = 0;
        var replacement = '';
        var positions = {};
        var next_position = 0;

        if (nrmatches <= 0) {
            return str;       // Pas de token donc la chaîne de caractères est récupérée
        }

        for(; i < nrmatches; i += 1) {

            // Suppression des {, } and numéros présents dans le token, on peut donc comparer avec les clés de token

            var token = matches[i].replace(/[{}0-9]/g, '');
            var position;

            // Détermination de la variable à utiliser ($#) ($1, $2)

            if (positions[matches[i]]) {
                position = positions[matches[i]];         // Si le token est positonné, on l'utilise
            } else {

                // Le token n'a pas de position, on l'incrémente
                // et on enregistre sa position

                next_position += 1;
                position = next_position;
                positions[matches[i]] = position;
            }

            if (tokens[token]) {
                replacement += str.substr(0, str.indexOf(matches[i])) + '$' + position;
                str = str.substr(str.indexOf(matches[i]) + matches[i].length);
            }
        }

        replacement += str;

        return replacement;
    };

    /**
     * Ajout du BBCode à la liste
     */
    me.addBBCode = function(bbcode_match, bbcode_tpl) {

        // Ajout des expressions régulières et des grilles pour la conversion du BBCode en HTML

        bbcode_matches.push(_getRegEx(bbcode_match));
        html_tpls.push(_getTpls(bbcode_tpl));

        // Ajout des expressions régulières et des grilles pour la conversion du HTML en BBCode

        html_matches.push(_getRegEx(bbcode_tpl));
        bbcode_tpls.push(_getTpls(bbcode_match));
    };

    /**
     * Conversion des BBCode en HTML
     */
    me.bbcodeToHtml = function(str) {
        var nrbbcmatches = bbcode_matches.length;
        var i = 0;

        for(; i < nrbbcmatches; i += 1) {
            str = str.replace(bbcode_matches[i], html_tpls[i]);
        }

        return str;
    };

    /**
     * Conversion du HTML en BBCode
     */
    me.htmlToBBCode = function(str) {
        var nrhtmlmatches = html_matches.length;
        var i = 0;

        for(; i < nrhtmlmatches; i += 1) {
            str = str.replace(html_matches[i], bbcode_tpls[i]);
        }

        return str;
    }

    /**
     * Expressions régulières avec un caractère optionnel
     * Source : phpjs.org
     */
    function preg_quote (str, delimiter) {
        return (str + '').replace(new RegExp('[.\\\\+*?\\[\\^\\]$(){}=!<>|:\\' + (delimiter || '') + '-]', 'g'), '\\$&');
    }

    // Ajout des BBCode et de leur HTML

    me.addBBCode('[b]{TEXT}[/b]', '<strong>{TEXT}</strong>');
    me.addBBCode('[i]{TEXT}[/i]', '<em>{TEXT}</em>');
    me.addBBCode('[u]{TEXT}[/u]', '<span style="text-decoration:underline;">{TEXT}</span>');
    me.addBBCode('[s]{TEXT}[/s]', '<span style="text-decoration:line-through;">{TEXT}</span>');
    me.addBBCode('[mail={EMAIL}]{TEXT}[/mail]', '<a href="mailto:{URL}" class="cookie_link" title="Send email to {URL}">{TEXT}</a>');
    me.addBBCode('[url={URL}]{TEXT}[/url]', '<a href="{URL}" class="cookie_link" title="Lien RGPD cookie" target="_blank">{TEXT}</a>');
    me.addBBCode('[url]{URL}[/url]', '<a href="{URL}" class="cookie_link" title="Lien RGPD cookie" target="_blank">{URL}</a>');
    me.addBBCode('[url={LINK}]{TEXT}[/url]', '<a href="{LINK}" class="cookie_link" title="Lien RGPD cookie" target="_blank">{TEXT}</a>');
    me.addBBCode('[url]{LINK}[/url]', '<a href="{LINK}" class="cookie_link" title="Lien RGPD cookie" target="_blank">{LINK}</a>');
    me.addBBCode('[img={URL} width={NUMBER1} height={NUMBER2}]{TEXT}[/img]', '<img src="{URL}" width="{NUMBER1}" height="{NUMBER2}" alt="{TEXT}" />');
    me.addBBCode('[img]{URL}[/img]', '<img src="{URL}" alt="{URL}" />');
    me.addBBCode('[img={LINK} width={NUMBER1} height={NUMBER2}]{TEXT}[/img]', '<img src="{LINK}" width="{NUMBER1}" height="{NUMBER2}" alt="{TEXT}" />');
    me.addBBCode('[img]{LINK}[/img]', '<img src="{LINK}" alt="{LINK}" />');
    me.addBBCode('[color=COLOR]{TEXT}[/color]', '<span style="{COLOR}">{TEXT}</span>');
    me.addBBCode('[highlight={COLOR}]{TEXT}[/highlight]', '<span style="background-color:{COLOR}">{TEXT}</span>');
    me.addBBCode('[quote="{TEXT1}"]{TEXT2}[/quote]', '<div class="quote"><cite>{TEXT1}</cite><p>{TEXT2}</p></div>');
    me.addBBCode('[quote]{TEXT}[/quote]', '<cite>{TEXT}</cite>');
    me.addBBCode('[blockquote]{TEXT}[/blockquote]', '<blockquote>{TEXT}</blockquote>');
};

var bbcodeParser = new BBCodeHTML();       // Création d'une instance Objet avec la fonction BBCodeHTML()

COOKIE.Utils = {
    getByClass : function(className, element){
        try {
            if (element != null){
                return document.querySelectorAll(element+' > .'+className);
            } else {
                return document.querySelectorAll('.'+className);
            }
        } catch(e){
            if (element != null){
                var node = element;
            } else {
                var node = document.getElementsByTagName('body')[0];
            }
            var a = [], re = new RegExp('\\b' + className + '\\b'); els = node.getElementsByTagName('*');
            for (var i = 0, j = els.length; i < j; i++) { if ( re.test(els[i].className) ) { a.push(els[i]); } } return a;
        }
    },
    hasClass : function (element, clas) {
        try {
            return element.classList.contains(clas);
        } catch(e){
            try {
                var m = element.className.match(new RegExp('(\\s|^)'+clas+'(\\s|$)'));
                if (m == null){
                    return false;
                } else {
                    return true;
                }
            } catch(e){}
        }
    },
    addClass : function(elements, clas) {
        try {
            if (elements.length != undefined){
                for (var i = 0; i < elements.length; i++){
                    var element = elements[i];
                    element.classList.add(clas);
                }
            } else {
                elements.classList.add(clas);
            }
        } catch(e){
            try {
                if (elements.length != undefined){
                    for (var i = 0; i < elements.length; i++){
                        var element = elements[i];
                        if (!COOKIE.Utils.hasClass(element, clas)) {
                            var c = COOKIE.Utils.trimString(element.className += " "+clas);
                            element.className = c;
                        }
                    }
                } else {
                    if (!COOKIE.Utils.hasClass(elements, clas)) {
                        var c = COOKIE.Utils.trimString(elements.className += " "+clas);
                        elements.className = c;
                    }
                }
            } catch(e){}
        }
    },
    removeClass : function(elements, clas){
        try {
            if (elements.length != undefined){
                for (var i = 0; i < elements.length; i++){
                    var element = elements[i];
                    element.classList.remove(clas);
                }
            } else {
                elements.classList.remove(clas);
            }
        } catch(e){
            try {
                if (elements.length != undefined){
                    for (var i = 0; i < elements.length; i++){
                        var element = elements[i];
                        if (COOKIE.Utils.hasClass(element, clas)) {
                            var reg = new RegExp('(\\s|^)'+clas+'(\\s|$)');
                            element.className = element.className.replace(reg,' ');
                        }
                    }
                } else {
                    if (COOKIE.Utils.hasClass(elements, clas)) {
                        var reg = new RegExp('(\\s|^)'+clas+'(\\s|$)');
                        elements.className = elements.className.replace(reg,' ');
                    }
                }
            } catch(e){}
        }
    },
    trimString : function(str){
        return str.replace(/^\s\s*/, '').replace(/\s\s*$/, '');
    },
    getQueryParams : function(str, obj){
        try {
            var splits = str.split("?");
            var paramString = splits[1];
            var params = paramString.split("&");
            for (var i = 0; i < params.length; i++){
                var param = params[i];
                var keyValue = param.split("=");
                obj[keyValue[0]] = keyValue[1];
            }
        } catch(e){}
    },

    // Source : underscore.js

    debounce : function(func, wait) {
        return COOKIE.Utils.limit(func, wait, true);
    },

    // Source : underscore.js

    limit : function(func, wait, debounce) {
        var timeout;
        return function() {
            var context = this, args = arguments;
            var throttler = function() {
                timeout = null;
                func.apply(context, args);
            };
            if (debounce) clearTimeout(timeout);
            if (debounce || !timeout) timeout = setTimeout(throttler, wait);
        };
    },
    on : function (elSelector, eventName, selector, fn) {
        var element = document.querySelector(elSelector);
        element.addEventListener(eventName, function(event) {
            var possibleTargets = element.querySelectorAll(selector);
            var target = event.target;
            for (var i = 0, l = possibleTargets.length; i < l; i++) {
                var el = target;
                var p = possibleTargets[i];

                while(el && el !== element) {
                    if (el === p) {
                        return fn.call(p, event);
                    }

                    el = el.parentNode;
                }
            }
        });
    },
    getCookie: function (cname) {
        var name = cname + "=";
        var ca = document.cookie.split(';');
        for(var i=0; i<ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0)==' ') c = c.substring(1);
            if (c.indexOf(name) == 0) return c.substring(name.length,c.length);
        }
        return "";
    }
}

/* Fonctions DOM */

if (window.opera) {
    COOKIE.Browser = "Opera";
} else {
    if (window.ActiveXObject) {
        COOKIE.Browser = "IE"
    } else {
        if (!navigator.taintEnabled) {
            COOKIE.Browser = "Webkit"
        } else {
            if (navigator.product == "Gecko"){
                COOKIE.Browser = "Mozilla";
            }
        }
    }
}

(function(){
    var scripts = document.getElementsByTagName("script");
    for (var i = 0; i < scripts.length; i++){
        var script = scripts[i];
        if (script.src.indexOf('cookie.js') != -1){
            COOKIE.Utils.getQueryParams(script.src, COOKIE.QueryParams);
        }
    }
})();

(function(){
    try{
        var domready = function(){
            COOKIE.Init();
        };
        switch (COOKIE.Browser){
            case 'IE':
                var temp = document.createElement('div');
                (function(){
                    try {
                        (function(){
                            temp.innerHTML = 'temp';
                            document.body.appendChild(temp);
                            document.body.removeChild(temp);
                            domready();
                        })();
                    } catch (e){
                        setTimeout(arguments.callee, 50);
                    }
                })();
                break;
            case 'Webkit': (function(){
                if (document.readyState == 'loaded' || document.readyState == 'complete'){
                    domready();
                } else {
                    setTimeout(arguments.callee, 50);
                }
            })();
                break;
            default:
                try {
                    window.addEventListener('load', domready, false);
                    document.addEventListener('DOMContentLoaded', domready, false);
                } catch(e){}
        }
    } catch(e){}
})();