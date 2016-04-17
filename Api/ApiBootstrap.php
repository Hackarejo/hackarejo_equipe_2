<?php
$scriptName = basename($_SERVER["SCRIPT_NAME"]);
$className	= explode(".", $scriptName)[0];

if(!class_exists($className)){
	die("A Api solicitada não existe.");
} else {

//	if(!$_REQUEST)
//		die('É obrigatório a passagem de parâmetros na Api.');

	new $className($_REQUEST);
}
?>