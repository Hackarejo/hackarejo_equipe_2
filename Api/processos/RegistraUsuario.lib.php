<?php

header("Access-Control-Allow-Origin: *");
header('Content-Type: text/html; charset=iso-8859-1');

$root = dirname(dirname(dirname(__FILE__)));

require_once("$root/Api/Api.lib.php");
require_once("$root/Api/ApiBootstrap.php");

class RegistraUsuario{
	
	public function __construct($params){

		try {
			
			/* -------------------------------------------------------------------
			
					Trata parâmetros
			
			   ------------------------------------------------------------------- */
			
			$api = new Api();
			
			/* -------------------------------------------------------------------
			
					Verifica se o usuário já existe
			
			   ------------------------------------------------------------------- */

			$countUsuarios = $api->db->query("SELECT SQL_CACHE count(id_usuario) AS totalReg FROM tab_usuarios WHERE email = '" . $params['email'] . "' AND senha = '" . $params['senha'] . "'", array(), "fetchRow")['totalReg'];

			// Registra o usuário			
			if($countUsuarios == 0){

				$api->db->exec("INSERT INTO tab_usuarios (nome, email, senha, latitude, longitude, endereco, tipo_usuario, id_cidade) VALUES ('" . $params['nome'] . "', '" . $params['email'] . "', '" . $params['senha'] . "', '" . $params['latitude'] . "', '" . $params['longitude'] . "', '" . $params['endereco'] . "', '" . $params['tipo_usuario'] . "', '" . $params['id_cidade'] . "') ");

				// Retorno
				$api->setRetorno(array(
					"status"	=> "success",
					"data"		=> "Usuário registrado com sucesso."
				));

			} else {

				// Retorno
				$api->setRetorno(array(
					"status"	=> "error",
					"data"		=> "Usuário já registrado."
				));
			}
			
		} catch (Exception $e) {
			$api->setRetorno(array(
					"status"	=> "error",
					"data"		=> $e->getMessage()
			));
		}

		echo json_encode(Funcs::Utf8_encodeArray($api->getRetorno()));
		exit();
	}
}
