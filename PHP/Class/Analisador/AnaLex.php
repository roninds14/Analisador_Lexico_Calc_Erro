<?php

namespace Analisador;

class AnaLex{
	protected $dados;
	protected $tabela_lex;
	public $chars;

	public function getTabelaLex(){
		return $this->tabela_lex;
	}

	function __construct( $dados ){
		$this->dados = $dados;
	}

	private function caracteres(){
		$j = 0;

		$elements = [];

		foreach( $this->dados as $linha => $string ){
			$ini = 1;
			$fim = 1;
			
			$array = str_split($string);

			for( $i = 0; $i < count($array); $i++ ){								
				if( $i < count($array) && !preg_match( "/\s/", $array[$i] ) ){
					$element = [
						"char" => $array[$i],
						"linha" => $linha + 1,
						"ini" => $ini,
						"fim" => $fim
					];

					array_push( $elements, $element );
				}
				
				$fim++;

				$ini = $fim;	
			}
		}

		$this->chars = $elements;
	}

	public function lexenas(){
		$chars = $this->chars;

		$lenexas = []; 

		for( $i = 0; $i < count($chars); $i++ ){
			if( preg_match( "[0-9]|\.", $chars[$i] ) ) {
				$prox = $chars[ $i+1 ];	
			}
			$prox = $chars[ $i+1 ];
		}
	}
}