
;(function ($, window, document, undefined){
    // 'use strict';

    // Definitions
    var _window = $( window ),
    	_document = $( 'html, body' ),
    	_body   = $( 'body' );


    ;(function (){

        /*
         * Banner
         */
        var banner = $( '#banner' ).find( '.slick-slider' );
        banner.slick({
            speed: 500,
            slide: 'li',
            infinite: true
        });




        /*
         * Slide Discografia
         */
        var slideDiscografia = $( '.widget-discografia' );
        slideDiscografia.slick({
            speed: 500,
            slide: 'li',
            infinite: true,
            slidesToShow: 4,
            slidesToScroll: 4,
            responsive: 
            [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                    }
                }, 
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                    }
                }, 
                {
                    breakpoint: 400,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                    }
                }
            ]

        });


    } ());





    ;(function (){

        var navbar = $( '.main-navigation' );

        $( document ).on('scroll', function(event) {

            if ( $(this).scrollTop() < $( '.header' ).height() ){

                //if ( ! navbar.hasClass( 'fixed' ) )
                navbar.removeClass( 'fixed' );

            } else {
                navbar.addClass( 'fixed' );
            };
            
        }).trigger('scroll');

    } ())








    ;(function (){

        $('.gallery a.zoom').simpleLightbox();
        
    } ());








	/*
     * Request All Form
     */
    var formAlert = '.form-msg',
    	status      = {
            'success'   : 'success',
            'error'     : 'error',
            'warning'   : 'warning',
            'info'      : 'info'
        };


    var form = (function (){


        var formPost = function (target, serialize){

            $.ajax({
                url     : target.attr( 'action' ) || 'action.php',
                type    : target.attr( 'method' ) || 'POST',
                dataType: 'json',
                data    : serialize || target.serialize(),
            })
            .done(function (res, textStatus, jqXHR){
                setTimeout(function(){

                    target
                    	.trigger('submitSuccess', [res, textStatus, jqXHR])
                    	.trigger('showAlert', [res.status || 'success', res.message, 5500]);

                }, 1200);
            })
            .fail(function (jqXHR, textStatus, errorThrown){
                target.trigger('submitFail', [jqXHR, textStatus, errorThrown]);
                target.trigger('showAlert', ['error', '<b>ERRO</b> ao conectar ao servidor!', 4500]);
            })
            .always(function (){
                setTimeout(function (){
                    target.find( 'input[type="submit"], button' ).prop('disabled', false);
                }, 1300);
            });

        },

        clearAlert = function (target){
            target.removeClass('success error warning info show');
        },

        showAlert = function (target, status, message){

            var obj = target.find( formAlert );

            if ( !obj.length ) return false;
            clearAlert( obj );
            obj.addClass('show ' + status).find( '.message' ).html( message );

        },

        basicValidate = function (event){

            var target = $(event.target);
            if ( checkFields(target) ) event.data.success(target);
            else event.data.erro(target);
            return false;

        };


        return {

            post: formPost,
            notify: showAlert,
            basicValidate: basicValidate,
            clearAlert: clearAlert

        };


    } ());


    /* All event form */
    $( 'form.validate' ).on('submitHandler', function (event){
        
        form.post( $(event.target) );
        return false;

    }).on('showAlert', function (event, state, message, time){
        
        form.notify($( event.target ), status[state], message);
        if ( time ){
            clearTimeout( timer );
            var timer = setTimeout(function (){
                form.clearAlert( $( event.target ).find(formAlert) );
            }, time);
        };

    });


    /*
     * Close alert
     */
    $( formAlert ).on('click', '.closed', function (event){

        $( formAlert ).slideUp(150, function (){
            form.clearAlert( $(this) );
            $(this).removeAttr('style');
        });
        return false;

    });


$(document).ready(function(){
    $("a[rel=modal]").click( function(ev){
        ev.preventDefault();
 
        var id = $(this).attr("href");
 
        var alturaTela = $(document).height();
        var larguraTela = $(window).width();
     
        //colocando o fundo preto
        $('#mascara').css({'width':larguraTela,'height':alturaTela});
        $('#mascara').fadeIn(1000); 
        $('#mascara').fadeTo("slow",0.8);
 
        var left = ($(window).width() /2) - ( $(id).width() / 2 );
        var top = ($(window).height() / 2) - ( $(id).height() / 2 );
     
        $(id).css({'top':top,'left':left});
        $(id).show();   
    });
 
    $("#mascara").click( function(){
        $(this).hide();
        $(".window").hide();
    });
 
    $('.fechar').click(function(ev){
        ev.preventDefault();
        $("#mascara").hide();
        $(".window").hide();
    });
});


	




} (jQuery, window, document));
