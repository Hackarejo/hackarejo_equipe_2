<?php

class Funcs{

	/**
	 * Function debug
	 * 
	 * @param	string/array		$var		Variável para debugar
	 * @param 	boolean 			$exit		Parar execução do código (true / false)
	 * 
	 * @return	void
	 */
	public static function Debug($var, $exit = true){
		echo "<pre><b>Function Debug (". $_SERVER['PHP_SELF'].")</b><br/>";
		
		if (is_array($var) || is_object($var))
			print_r($var);
		else 
			echo $var . "<br/>";
		
		echo "</pre>";
		
		if ($exit)
			exit();
	}

	/**
	 * Efetua upload de arquivo no servidor	
	 *
	 * @param 	string 		$filePathTemp 		Caminho do arquivo temporário
	 * @param 	string 		$fileFullPath 		Caminho completo do arquivo
	 *
	 * @return 	boolean
	 */
	public static function UploadFile($filePathTemp, $fileFullPath){

		/* -------------------------------------------------------

				Trata parâmetros

		   ------------------------------------------------------- */

		if(!$filePathTemp)	die('É obrigatório a passagem do parâmetro "$filePathTemp"');
		if(!$fileFullPath)	die('É obrigatório a passagem do parâmetro "$fileFullPath"');

		/* -------------------------------------------------------

				Efetua o upload do arquivo

		   ------------------------------------------------------- */

		if(move_uploaded_file($filePathTemp, $fileFullPath)){
			return true;
		} else {
			return false;
		}
	}

	/**
	 * Decode array
	 *
	 * @param 	array 	$array
	 * @return	array	$newArray
	 */
	public static function Utf8_decodeArray($array){

		foreach ($array as $key => $row){
			if(is_string($row))
				$newArray[$key] = utf8_decode($row);
			else if(is_array($row))
				$newArray[$key] = Funcs::Utf8_decodeArray($row);
			else
				$newArray[$key] = $row;
		}
		
		return $newArray;
	}
	
	/**
	 * Encode array
	 * 
	 * @param 	array 	$array
	 * @return	array	$newArray
	 */
	public static function Utf8_encodeArray($array){

		foreach ($array as $key => $row){
			
			if(is_string($row))
				$newArray[$key] = utf8_encode($row);
			else if(is_array($row))
				$newArray[$key] = Funcs::Utf8_encodeArray($row);
			else
				$newArray[$key] = $row;
		}

		if(isset($newArray))
			return $newArray;
	}
}