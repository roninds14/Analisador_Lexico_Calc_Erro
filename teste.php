<?php

require "PHP/config/config.php";

use Arquivos\TrataArquivo;
use Analisador\AnaLex;

$arquivo = new TrataArquivo( "operacao.txt" );
$dados = new AnaLex( $arquivo->toArray() );

$dados->lexenas();

print_r( $dados->chars );
