<?php
$root = dirname(dirname(__FILE__));

require_once("$root/lib/Db.lib.php");
require_once("$root/lib/Funcs.lib.php");

class Api{

	public $retorno;
	public $db;
	public $dbMaster;
	
	/**
	 * Construtor
	 * @return  void
	 * @throws 	Exception
	 */
	public function __construct(){

		/* -------------------------------------------------------------------

				Trata parâmetros

		   ------------------------------------------------------------------- */
		
		// Efetua conexão
		$this->db = new Db("127.0.0.1", "squabble", "root", "password");
	}
	
	/**
	 * Retorna array de retorno
	 * @return	array	$retorno
	 */
	public function getRetorno(){
		return $this->retorno;
	}
	
	/**
	 * Seta retorno
	 * 
	 * @param	array		$retorno		Array de retorno
	 * @return	void
	 */
	public function setRetorno($retorno){
		$this->retorno = $retorno;
	}

	/**
	 * Valida parâmetros de consulta
	 * 
	 * @param	array	$params			Parâmetros
	 * @return	array	$paramsSql		Parâmetros validos
	 */
	public function validaParamsConsulta($params){

		if($params)
			$params = Funcs::Utf8_decodeArray($params);
		
		$paramsSql = array();
		
		$paramsSql["cols"] 	= isset($params["cols"]) && $params["cols"] != NULL		? $params["cols"] 					: "*";
		$paramsSql["where"]	= isset($params["where"]) && $params["where"] != NULL	? " WHERE " . $params["where"] 		: NULL;
		$paramsSql["join"] 	= isset($params["join"]) && $params["join"] != NULL		? $params["join"] 					: NULL;
		$paramsSql["order"] = isset($params["order"]) && $params["order"] != NULL	? " ORDER BY " . $params["order"] 	: NULL;
		$paramsSql["limit"] = isset($params["limit"]) && $params["limit"] != NULL	? " LIMIT " . $params["limit"] 		: NULL;
		
		return $paramsSql;
	}

}