var Funcs = function(){};

/**
 * Formata número
 * 
 * @param	string		valor			Número para formatar
 * @param 	string 		formato			Formato (pt_br / en_us)
 * 
 * @return 	string		valor			Número formatado
 */
Funcs.FormataNumero = function(valor, formato){
	
	if(formato == "en_us"){
		valor = valor.replace(".", "");
		valor = valor.replace(",", ".");
	} else if(formato == "pt_br"){
		
		valor = String(valor);
		
		var index = valor.indexOf(",");
		if(index != -1)
			valor = valor.replace(",", ".");
		
		valor 	= Funcs.NumberFormat(valor, 2, ',', '.');
	}
	
	return valor;
}

/**
 * Formata Números (Baseada na função number_format() do PHP)
 * 
 * @param	string/float	numero				Número
 * @param	int				decimal				Casas Decimais
 * @param	string			decimal_separador	Separador decimal
 * @param	string			milhar_separador	Separador de milhar
 * 
 * @return	string/float
 */
Funcs.NumberFormat = function(numero, decimal, decimal_separador, milhar_separador){

	numero 	= (numero + '').replace(/[^0-9+\-Ee.]/g, '');
    var n 	= !isFinite(+numero) ? 0 : +numero,
    prec 	= !isFinite(+decimal) ? 0 : Math.abs(decimal),
    sep 	= (typeof milhar_separador === 'undefined') ? ',' : milhar_separador,
    dec 	= (typeof decimal_separador === 'undefined') ? '.' : decimal_separador,
    s 		= '',
    
    toFixedFix = function (n, prec) {
    	var k = Math.pow(10, prec);
        return '' + Math.round(n * k) / k;
    };

    // Fix para IE: parseFloat(0.55).toFixed(0) = 0;
    s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');

    if (s[0].length > 3)
        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);

    if ((s[1] || '').length < prec) {
        s[1] = s[1] || '';
        s[1] += new Array(prec - s[1].length + 1).join('0');
    }

    return s.join(dec);
}