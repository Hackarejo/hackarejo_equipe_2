<?php





if ( is_ajax() ) {
	
	$action = isset($_POST["action"]) ? $_POST["action"] : $_GET["action"];
	if ( ! empty($action) ) { // Checks if action value exists
	


		switch ($action){ // Switch case for value of action

			case "contato":
			default:
				formDemo();
			break;

		}

	}

};


// Function to check if the request is an AJAX request
function is_ajax() {
	return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
}




/*
 * Criar integração com base de dados e retornar para o .js conforme as configurações abaixo;
 */
function formDemo (){


	/*
	 * Implementação com o bd
	 */



	$return['status']  = 'success'; // accept custom style ['success', 'error', 'warning', 'info']
	// $return['message'] = '<b>Keep calm</b> is ok!';

    echo json_encode( $return );

}
