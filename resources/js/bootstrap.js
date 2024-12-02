import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

import jquery from 'jquery';
window.$ = window.jQuery = jquery;


//button like
window.addEventListener('load', function () {

    //button like
    $('.btn-like').click(function () {
        console.log('jQuery is like');
        $(this).addClass('btn-dislike')
        $(this).removeClass('btn-like');
        $('#btnlike').hide();
        //boto de like
        const icon = $(this).find('i');
        icon.removeClass('fa-solid');
        icon.removeClass('fa-heart');
        icon.addClass('fa-regular');
        icon.addClass('fa-heart');
        icon.css('color', '');
    });
    //button dislike
    $('.btn-dislike').click(function () {
        console.log('jQuery dislike!');
        $(this).addClass('btn-like').removeClass('btn-dislike');

        //boto de like
        const icon = $(this).find('i');
        icon.removeClass('fa-regular');
        icon.removeClass('fa-heart');
        icon.addClass('fa-solid');
        icon.addClass('fa-heart');
        icon.css('color', 'red');
    });

});