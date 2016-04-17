/**
 * Autentifica usuario
 *
 * @param	string		email
 * @param	string		senha
 * @return 	void
 */
function AutentificaUsuario(email, senha){

	var count = null;

	$.ajax({
		url       	: 'http://172.40.0.28/Api/processos/AutentificaUsuario.lib.php',
		type      	: 'POST',
		async		: false,
		dataType  	: 'json',
		data		: {
			"cols"	: "count(id_usuario) AS totalReg",
			"where"	: "email = '" + email + "' AND senha = '" + senha + "'"
		},
		error: function (request, status, error) {
			alert("Erro ao autentificar usuário\n" + request.responseText);
		},
		success : function(data){

			if(data.status == "success"){
				count = data.data[0].totalReg;
			} else {
				// Caso der error exibe uma mensagem
				alert("Erro ao autentificar usuário\n" + data.data);
			}
		}
	});

	return count;
}

/**
 * Consulta categorias
 * @return 	obj 	objCategorias
 */
function ConsultaCategorias(){

	var objCategorias = null;

	$.ajax({
		url       	: 'http://172.40.0.28/Api/processos/ConsultaCategorias.lib.php',
		async		: false,
		type      	: 'POST',
		dataType  	: 'json',
		data		: null,
		error: function (request, status, error) {
			alert("Erro ao consultar categorias\n" + request.responseText);
		},
		success : function(data){

			if(data.status == "success"){
				objCategorias = data.data;
			} else {
				// Caso der error exibe uma mensagem
				alert("Erro ao consultar categorias\n" + data.data);
			}
		}
	});

	return objCategorias;
}

/**
 * Consulta pedidos
 *
 * @param	int		id_usuario		Id do usuário
 * @return	obj		objPedidos		Objeto com os pedidos desse usuário
 */
function ConsultaPedidos(id_usuario){

	var objPedidos = null;

	$.ajax({
		url       	: 'http://172.40.0.28/Api/processos/ConsultaPedidos.lib.php',
		type      	: 'POST',
		async		: false,
	    dataType  	: 'json',
	    data		: {
	    	"cols"	: "tab_pedidos.id_pedido, tab_pedidos.id_usuario, tab_pedidos.descricao AS descricao_pedido, tab_pedidos.data, tab_categorias.descricao AS descricao_categoria",
	    	"where" : "id_usuario = " + id_usuario + "",
	    	"join"	: "INNER JOIN tab_categorias ON tab_categorias.id_categoria = tab_pedidos.id_categoria"
	    },
		error: function (request, status, error) {
			alert("Erro ao consultar pedidos\n" + request.responseText);
		},
		success : function(data){
			
			if(data.status == "success"){
				objPedidos = data.data;
			} else {
				alert("Erro ao consultar pedidos\n" + data.data);
			}
		}
	});

	return objPedidos;
}

function ConsultaOfertas(id_pedido){

	var objOfertas = null;

	$.ajax({
		url       	: 'http://172.40.0.28/Api/processos/ConsultaOfertas.lib.php',
		type      	: 'POST',
		async		: false,
	    dataType  	: 'json',
	    data		: {
	    	"cols"	: "tab_usuarios.nome, tab_ofertas.id_usuario, tab_ofertas.id_pedido, tab_ofertas.valor",
	    	"join"	: "INNER JOIN tab_usuarios ON tab_usuarios.id_usuario = tab_ofertas.id_usuario",
	    	"where" : "tab_ofertas.id_pedido = " + id_pedido + "",
	    },
		error: function (request, status, error) {
			alert("Erro ao consultar ofertas\n" + request.responseText);
		},
		success : function(data){
			
			if(data.status == "success"){
				objOfertas = data.data;
			} else {
				alert("Erro ao consultar ofertas\n" + data.data);
			}
		}
	});

	return objOfertas;
}

/**
 * Registra usuário
 *
 * @param	string	nome
 * @param	string	email
 * @param	string	senha
 * @param	int		latitude
 * @param	int		longitude
 * @param	string	endereco
 * @param	string	tipo_usuario
 * @param	int		id_cidade
 *
 * @return	void
 */
function RegistraUsuario(nome, email, senha, latitude, longitude, endereco, tipo_usuario, id_cidade){

	$.ajax({
		url       	: 'http://172.40.0.28/Api/processos/RegistraUsuario.lib.php',
		type      	: 'POST',
	    dataType  	: 'json',
	    data		: {
  	    	"nome"			: nome,
            "email"       	: email,
        	"senha"         : senha,
	        "latitude"      : latitude,
	        "longitude"     : longitude,
	        "endereco"    	: endereco,
	        "tipo_usuario"	: tipo_usuario,
	        "id_cidade"		: id_cidade
		},
		error: function (request, status, error) {
			alert("Erro ao registrar usuário\n" + request.responseText);
		},
		success : function(data){

			if(data.status == "success"){
				alert("Usuário registrado com sucesso");
			} else {
				alert("Erro ao registrar usuário\n" + data.data);
			}
		}
	});
}

/**
 * Registra pedido
 *
 * @param	int		id_usuario
 * @param	string	descricao
 * @param	date 	data
 * @param	date 	data_final
 * @param	file	arquivo
 * @param	int		id_categoria
 *
 * @return	void
 */
function RegistraPedido(id_usuario, descricao, data, data_final, valorMin, valorMax, arquivo, id_categoria){

	$.ajax({
		url       	: 'http://172.40.0.28/Api/processos/RegistraPedidos.lib.php',
		type      	: 'POST',
	    dataType  	: 'json',
	    data		: {
	    	0 : {
	  	    	"id_usuario"        : id_usuario,
	            "descricao"         : descricao,
	        	"data"              : data,
		        "data_final"        : data_final,
		        "arquivo"           : arquivo,
		        "id_categoria"    	: id_categoria,
		        "valor_min"    		: valorMin,
		        "valor_max"    		: valorMax
	    	}
		},
		error: function (request, status, error) {
			alert("Erro ao registrar pedido\n" + request.responseText);
		},
		success : function(data){

			if(data.status == "success"){
				alert("Pedido registrado com sucesso");
			} else {
				alert("Erro ao registrar pedido\n" + data.data);
			}
		}
	});
}