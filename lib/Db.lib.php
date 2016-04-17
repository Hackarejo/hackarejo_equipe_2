<?php

class Db extends PDO{

	public $connection;
	
	/**
	 * Construtor
	 * 
	 * @param	string		$hostname			Host
	 * @param	string		$dbname				Nome do banco de dados
	 * @param	string		$username			Usuário
	 * @param	string 		$password			Senha
	 * 
	 * @return	void
	 */
	public function __construct($hostname, $dbname, $username, $password){
		
		/* -------------------------------------------------------------------

				Trata parâmetros

		   ------------------------------------------------------------------- */

		if(!$hostname)	die('É obrigatória a passagem do parâmetro "$hostname"');
		if(!$dbname)	die('É obrigatória a passagem do parâmetro "$dbname"');
		if(!$username)	die('É obrigatória a passagem do parâmetro "$username"');
		
		$dsn = "mysql:host=$hostname;dbname=$dbname";
		
		/* -------------------------------------------------------------------
		
				Conecta ao banco de dados
		
		   ------------------------------------------------------------------- */

		try {

			$this->connection = new PDO($dsn, $username, $password);

			parent::__construct($dsn, $username, $password);
			$this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
		} catch (PDOException $e){
			die("Erro ao conectar ao banco de dados. " . $e->getMessage());
		}
	}

	/**
	 * Executa query que não retorno dados
	 * 
	 * @param	string		$statement			Query
	 * @param	array		$arrBindParams		Array com parâmetros bind
	 * 
	 * @return	void
	 */
	public function exec($statement, $arrBindParams = array()){
		
		/* -------------------------------------------------------------------
		  
				Trata parâmetros
		 
		   ------------------------------------------------------------------- */
		
		if(!$statement)					die('É obrigatória a passagem do parâmetro "$statement"');
		if(!is_array($arrBindParams))	die('O parâmetro "$arrBindParams" deve ser um array');

		// Verifica se a query não e um select
		if(strstr($statement, "SELECT"))
			die(utf8_encode('Impossível utilizar "' . substr($statement, 0, 16) . ' ..." na função "$db->exec()", favor utilizar a função "$db->query()"'));

		/* -------------------------------------------------------------------

				Executa query

		   ------------------------------------------------------------------- */
		
		try {
		
			// Prepara query
			$stmt = parent::prepare($statement);
		
			// Acrescenta bind params
			if(count($arrBindParams) > 0){
				foreach ($arrBindParams as $bindParam)
					$stmt->bindParam($bindParam[0], $bindParam[1], $bindParam[2]);
			}

			// Executa query
			$stmt->execute();
		
		} catch (Exception $e) {
			die("Erro ao executar query. " . $e->getMessage());
		}
	}

	/**
	 * Executa consulta no banco de dados
	 * 
	 * @param	string			$statement			Query sql
	 * @param	array			$arrBindParams		Array com parâmetros bind
	 * 
	 * @return	array/string	$retorno
	 */
	 public function query($statement, $arrBindParams = array(), $fetch = "fetchAll"){
		
	 	/* -------------------------------------------------------------------
	 	
				Trata parâmetros
	 	
	 	   ------------------------------------------------------------------- */

	 	if(!$statement)					die('É obrigatória a passagem do parâmetro "$statement"');
	 	if(!is_array($arrBindParams))	die('O parâmetro "$arrBindParams" deve ser um array');

	 	// Verifica se a query não e diferente de um select
	 	if(strstr($statement, "INSERT") || strstr($statement, "UPDATE") || strstr($statement, "DELETE") || strstr($statement, "TRUNCATE"))
	 		die(utf8_encode('Impossível utilizar "' . substr($statement, 0, 16) . ' ..." na função "$db->query()", favor utilizar a função "$db->exec()"'));

	 	$retorno = null;
	 	
	 	/* -------------------------------------------------------------------
	 	  
				Executa query
	 	 
	 	   ------------------------------------------------------------------- */

	 	try {

	 		// Prepara query
	 		$stmt = parent::prepare($statement);

	 		// Acrescenta bind params
	 		if(count($arrBindParams) > 0){
	 			foreach ($arrBindParams as $bindParam)
	 				$stmt->bindParam($bindParam[0], $bindParam[1], $bindParam[2]);
	 		}

	 		// Executa query
	 		$stmt->execute();
	 		
	 	} catch (Exception $e) {
	 		die("Erro ao executar query. " . $e->getMessage());
	 	}
	 	
	 	/* -------------------------------------------------------------------
	 	
				Trata retorno
	 	
	 	   ------------------------------------------------------------------- */
	 	
	 	try {

	 		if($fetch == "fetchAll")
	 			$retorno = $stmt->fetchAll(PDO::FETCH_ASSOC);
	 		else if($fetch == "fetchRow")
	 			$retorno = $stmt->fetch(PDO::FETCH_ASSOC);
	 		else 
	 			die("Formado de retorno inválido. Esperado 'fetchAll' ou 'fetchRow'. Informado '" . $fetch . "'.");
	 			
	 	} catch (Exception $e) {
	 		die("Erro ao retornar dados da consulta. " . $e->getMessage());
	 	}
	 	
	 	return $retorno;
	}
	
}