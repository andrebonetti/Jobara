<?php

	function tipo_negocio_infinitivo($tipo){	
		if($tipo == "venda")	{return "vender";}
		if($tipo == "aluguel")	{return "alugar";}
	}
	
	function tipo_negocio_infinitivo2($tipo){	
		if($tipo == "venda")	{return "Comprar";}
		if($tipo == "aluguel")	{return "Alugar";}
	}
	
	function changeView($string){	
		if($string == "menor_preco")	{return "Menor Preço";}
		if($string == "maior_preco")	{return "Maior Preço";}
	}
	
	function numeroEmReais($numero) {
	    return "R$ " . number_format($numero, 2, ",", ".");
	}
	
	function no_acento_code($string){
			
		$string = preg_replace("/ /", "-", $string); 
		$string = preg_replace("/ã/", "a", $string);
		$string = preg_replace("/Ã/", "A", $string);
        $string = preg_replace("/á/", "a", $string);
        $string = preg_replace("/Á/", "A", $string);
        $string = preg_replace("/â/", "a", $string);
        $string = preg_replace("/Â/", "A", $string);
		$string = preg_replace("/é/", "e", $string);
        $string = preg_replace("/É/", "E", $string);
        $string = preg_replace("/ê/", "e", $string);
        $string = preg_replace("/Ê/", "E", $string);
		$string = preg_replace("/ç/", "c", $string);
        $string = preg_replace("/Ç/", "C", $string);	
        $string = preg_replace("/í/", "i", $string);
        $string = preg_replace("/Í/", "I", $string);
		$string = preg_replace("/,/", "-", $string);
        
		return $string;
	}
	
	function no_acento_decode($string){		
		$string = preg_replace("/-/", " ", $string); 
		return $string;
	}

    function dataPtBrParaMysql($dataPtBr) {
    	$partes = explode("/", $dataPtBr);
		return $partes[0];
    }
	
	function dataMysqlParaPtBr($dataPtBr) {
    	$partes = explode("-", $dataPtBr);
		return "{$partes[2]}/{$partes[1]}/{$partes[0]}";
	}

    function dataMysqlParaPtBr_completo($dataPtBr) {
        $data = explode("/", $dataPtBr);
    	$partes = explode("-", $data[0]);
        
        if($partes[2] < 10){
            $dia = "0".$partes[2];
        }
        else{$dia = $partes[2];}
        
        if($partes[1] < 10){
            $mes = "0".$partes[1];
        }
        else{$mes = $partes[1];}

		return "{$dia}/{$mes}/{$partes[0]}";
	}
	