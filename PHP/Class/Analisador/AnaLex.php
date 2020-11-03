<?php

namespace Analisador;

class AnaLex{
	protected $dados;
	protected $tabela_lex;

	public function getTabelaLex(){
		return $this->tabela_lex;
	}

	function __construct( $dados ){
		$this->dados = $dados;
	}

	public function lexico(){
		$j = 0;

		foreach( $this->dados as $p ){			
			for( $i = 0; $i < strlen( $p ); $i++, $j++ ){
				$lexena = "";

				switch( $p[$i] ){
					case "+":
						$this->tabela_lex[ $j ] = [ $p[$i], "OP_SOM" ];
						break;
					case "-":
						$this->tabela_lex[ $j ] = [ $p[$i], "OP_SUB" ];
						break;
					case "*":
						$this->tabela_lex[ $j ] = [ $p[$i], "OP_MUL" ];
						break;
					case "/":
						$this->tabela_lex[ $j ] = [ $p[$i], "OP_DIV" ];
						break;
					default:
						while( preg_match( "/[0-9]|\./", $p[$i] ) ){
							$lexena .= $p[$i];
							$i++;

							if( $i >= strlen( $p ) ) break;
						}
						preg_match("/\./", $lexena ) ? $this->tabela_lex[ $j ] = [ $lexena, "NUM_REAL"]: $this->tabela_lex[ $j ] = [ $lexena, "NUM_INT"];

						$i--;
						break;
				}				
			}
		}
	}


}