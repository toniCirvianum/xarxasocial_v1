import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

import jquery from 'jquery';


window.addEventListener('load', function () {


    function setLike() {
        //afegeix like a la BBDD

    }

    //button dislike
    $(document).on('click', '.btn-like', function () {
        console.log('dislike afegit!');
        //canviem la classe del boto per accedir des de l'altra func
        $(this).addClass('btn-dislike').removeClass('btn-like');
        //boto de dislike
        const icon = $(this).find('i');
        icon.removeClass('fa-solid').addClass('fa-regular');
        icon.css('color', '');
        //aconseguim el id del post o iamtge
        const postId = $(this).data('id');
        axios.get(apiUrl + "/like/" + postId)
            // .then(response => {
            //     console.log(response.data);
            //     if (response.data.like) {
            //         console.log('like afegit!');
            //     }
            // })
            // .catch(error => {
            //     console.error(error);
            // });
        
    });
    //button like
    $(document).on('click', '.btn-dislike', function () {
        console.log('like afegit!');
        //canviem la classe del boto per accedir des de l'altra func
        $(this).addClass('btn-like').removeClass('btn-dislike');
        //boto de like
        const icon = $(this).find('i');
        icon.removeClass('fa-regular').addClass('fa-solid');
        icon.css('color', 'red');
        const postId = $(this).data('id');
        axios.get(apiUrl + "/like/" + postId)
            // .then(response => {
            //     console.log(response.data);
            //     if (response.data.like) {
            //         console.log('like eliminat!');
            //     }
            // })
            // .catch(error => {
            //     console.error(error);
            // });

    });

});
