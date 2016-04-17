<?php

header("Access-Control-Allow-Origin: *");
header('Content-Type: text/html; charset=iso-8859-1');

$root = dirname(dirname(dirname(__FILE__)));

require_once("$root/Api/Api.lib.php");
require_once("$root/Api/ApiBootstrap.php");

class RegistraPedidos{
	
	public function __construct($params){

		try {
			
			/* -------------------------------------------------------------------
			
					Trata parâmetros
			
			   ------------------------------------------------------------------- */
			
			$api = new Api();
			
			/* -------------------------------------------------------------------
			
					Registra pedidos
			
			   ------------------------------------------------------------------- */

			foreach ($params as $rowPedido){

				// Efetua upload de arquivo, caso informado
				$fileFullPath = null;
				if(isset($params['arquivo'])){
					$fileFullPath = $root . "/public/temp/" . $fileName;
					Funcs::UploadFile($_FILES['arquivo']['tmp_name'], $fileFullPath);
				}

				$api->db->exec("INSERT INTO tab_pedidos (id_usuario, descricao, data, data_final, arquivo, id_categoria, valor_min, valor_max) VALUES ('" . $rowPedido['id_usuario'] . "', '" . $rowPedido['descricao'] . "', '" . $rowPedido['data'] . "', '" . $rowPedido['data_final'] . "', '" . $fileFullPath . "', '" . $rowPedido['id_categoria'] . "', '" . $rowPedido['valor_min'] . "', '" . $rowPedido['valor_max'] . "')");
			}

			// Retorno
			$api->setRetorno(array(
					"status"	=> "success",
					"data"		=> "Pedidos regitrados com sucesso"
			));

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
