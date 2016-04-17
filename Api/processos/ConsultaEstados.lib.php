<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: text/html; charset=iso-8859-1');

$root = dirname(dirname(dirname(__FILE__)));

require_once("$root/Api/Api.lib.php");
require_once("$root/Api/ApiBootstrap.php");

class ConsultaEstados{
	
	public function __construct($params){

		try {
			
			/* -------------------------------------------------------------------
			
					Trata parâmetros
			
			   ------------------------------------------------------------------- */
			
			$api 		= new Api();
			$paramsSql 	= $api->validaParamsConsulta($params);
			
			/* -------------------------------------------------------------------
			
					Consulta
			
			   ------------------------------------------------------------------- */
			
			$sql = "SELECT SQL_CACHE " .
					$paramsSql["cols"] .
					" FROM tab_estados " .
					$paramsSql["join"] . " " .
					$paramsSql["where"] . " " .
					$paramsSql["order"] . " " .
					$paramsSql["limit"];
			
			$rowsEstados = $api->db->query($sql);
			
			/* -------------------------------------------------------------------
			
					Trata retorno
			
			   ------------------------------------------------------------------- */
			
			$api->setRetorno(array(
					"status"	=> "success",
					"data"		=> $rowsEstados
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
