window._ = require('lodash');

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');
} catch (e) {}

require('./blog_detail');


import SimpleMDE from 'simplemde';

const simplemde = new SimpleMDE({
    element: document.getElementById("liyi_post_detail_comment"),
    // autofocus:true,自动对焦
    autosave: {
        enabled: true,
        uniqueId: "MyUniqueID",
        delay: 1000
    },
    status: ["autosave", "lines", "words"],
    //spellChecker: false,拼写检查器
    promptURLs: true,
    toolbar: [
        "bold", "italic", "strikethrough", "heading", "code", "quote", "unordered-list",
        "ordered-list", "clean-block", "link", "image", "table", "horizontal-rule", "preview", "side-by-side", "fullscreen"
    ]
});

window.simplemde = simplemde;

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

import Vue from "vue";

import rankingList from './components/right/rankingList';

const vm = new Vue({
    el: '#app',
    components: {
        rankingList:rankingList
    }
});

// import Echo from 'laravel-echo';

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     forceTLS: true
// });
