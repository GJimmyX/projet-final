window._ = require('lodash');

try {
    require('bootstrap');
} catch (e) {}

/**
 * Le chargement de la bibliothèque Axios permet de gérer facilement les requêtes
 * du back-end de Laravel. Cette bibliothèque gére automatiquement le jeton CSRF
 * comme un entête en se basant sur la valeur du jeton cookie "XSRF".
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
