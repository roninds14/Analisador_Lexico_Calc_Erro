<?php

$newName = "operacao.txt";

spl_autoload_register( function($nameClass) {

	$dirClass = $_SERVER["DOCUMENT_ROOT"] . DIRECTORY_SEPARATOR . "Analisador_Lexico_Calc_Erro" . DIRECTORY_SEPARATOR ."PHP". DIRECTORY_SEPARATOR ."Class";
	$filename = str_replace ("\\", "/", $dirClass . DIRECTORY_SEPARATOR . $nameClass . ".php");

	if(file_exists($filename))
		require_once( $filename );

});