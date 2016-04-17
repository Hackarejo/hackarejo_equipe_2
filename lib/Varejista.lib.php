<?php
$root = dirname(dirname(__FILE__));
require_once("$root/lib/Db.lib.php");
require_once("$root/lib/Funcs.lib.php");

class Varejista{

	public static $id_varejista = null;
	
	/**
	 * Consulta pedidos relacionados as categorias do varejsta
	 * @return 	array 	$rowsPedidos
	 */
	static function ConsultaPedidos(){

		/* -------------------------------------------------------------------

				Consulta categorias do usuário logado

		   ------------------------------------------------------------------- */

		$rowsCategorias = $GLOBALS['db']->query("SELECT SQL_CACHE id_categoria FROM tab_usuarios_categorias WHERE id_usuario = :id_usuario", array(
				array(":id_usuario", self::$id_varejista, PDO::PARAM_INT)
			));

		// Gera string com as categorias do varejista
		$strBindValues = null;

		foreach ($rowsCategorias as $rowCategoria) {

			if($strBindValues)
				$strBindValues .= ",";

			$strBindValues .= $rowCategoria['id_categoria'];
		}

		/* -------------------------------------------------------------------

				Consulta pedidos conforme a categoria do varejista

		   ------------------------------------------------------------------- */

		$rowsPedidos = $GLOBALS['db']->query("SELECT SQL_CACHE * FROM tab_pedidos WHERE id_categoria IN(" . $strBindValues . ")");

		return $rowsPedidos;
	}
}

?>