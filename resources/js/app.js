if (typeof browser === "undefined") {
    var browser = chrome;
}
require('./bootstrap');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
