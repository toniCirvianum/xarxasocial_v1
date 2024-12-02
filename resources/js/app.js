import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import jquery from 'jquery';
window.$ = window.jQuery = jquery;
window.addEventListener('load', function(){
    $('body').css('background-color', 'red');
});
