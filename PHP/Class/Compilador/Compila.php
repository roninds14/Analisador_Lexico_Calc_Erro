<?php

namespace Compilador;

use Analisador\AnaLex;

class Compila extends AnaLex{
	private $resultados;

	public function getResultados(){
		return $this->resultados;
	}
	
	function __construct( $dados ){
		parent::__construct( $dados );

		$this->resultados = [];

		$this->lexico();
	}

	public function compilar(){

		foreach ($this->tabela_lex as $k => $v ) {
			$v1 = 0;
			$v2 = 0;

			if( preg_match( "/OP_/", $v[1] ) ){			
				$v1 = floatval( $this->tabela_lex[ $k - 1 ][0] );
				
				$v2 = floatval( $this->tabela_lex[ $k + 1 ][0] );				
			}
			else
				continue;

			switch( $v[1] ){
				case "OP_SOM":
					array_push( $this->resultados, $v1 + $v2 );
					break;
				case "OP_SUB":
					array_push( $this->resultados, $v1 - $v2 );
					break;
				case "OP_MUL":
					array_push( $this->resultados, $v1 * $v2 );
					break;
				case "OP_DIV":
					array_push( $this->resultados, $v1 / $v2 );
					break;				
			}
		}
	}	
}