;(function ($, window, document, undefined){

	var formValidate 	= $( 'form.validate' ),
		formTarget;


	var app = (function(){

		var initialize = function (){

			if ( ! $.fn.validate ){
		        setTimeout(app.init, 500);
		        return false;
		    };



		    // Apply validate plugin
		    apllyValidate();


		    // Aplly plugin mask
		    app.masker();

		},

		apllyValidate = function (){

			$.each(formValidate, function(ind, obj) {
		
				var objForm = $( obj );

				objForm.validate({
					submitHandler: function(form) {

						formTarget = $( form );
						formTarget
							.trigger( 'submitHandler' )
							.trigger('showAlert', ['info', '<b>Aguarde,</b> conectando!'])
							.find( 'input[type="submit"], button' ).prop('disabled', true);

						return false;

					},
					invalidHandler: function (event, validator){

						$( event.target ).trigger('showAlert', ['info', '<b>Por favor,</b> preencha todos os campos!', 4500]);

					}
				});

				/* Events forms */
				
				objForm.on('submitSuccess', function (event, data){

					if ( data.status === 'error' ){

						$( event.target ).trigger('showAlert', ['error', data.message || '<b>Ops! tente novamente,</b> Algo inesperado aconteceu!']);

					} else if ( data.status ){

						objForm.find( 'input,select,textarea' ).not(':button, :submit, :reset, :hidden').val('').removeAttr('checked').removeAttr('selected');
					
						if ( data.redirect ) window.location = data.redirect;

					}

				}).on('submitFail', function (event, data){

					// console.log( data );

				});

			});

		},

		apllyMask = function (){

			try {
				var input = $( 'input' );
				input.filter( "[type='tel']" ).mask( '(99) 9999-9999?9' );
				input.filter( "[name='cpf']" ).mask( '999.999.999-99' );
			} catch (err){
				console.warn( 'Not defined plugin mask!' );
			};

		};



		return {

			init: initialize,
			masker: apllyMask

		};

	} ());


	app.init();





}( jQuery, window, document ));