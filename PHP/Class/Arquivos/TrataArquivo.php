<?php

namespace Arquivos;

class TrataArquivo{
	private $file;
	
	public function __construct( $filename ){
		$this->file = fopen( $filename, "r"  );
	}

	public function toArray(){
		$linhas = array();

		$linha = 0;

		while ( !feof($this->file) ){
			$char = "";	

			$char = fgetc( $this->file );
			
			if( $char === "\n" ){
				$linha++;
				continue;
			}

			array_key_exists( $linha, $linhas )? $linhas[ $linha ] .= $char : $linhas[ $linha ] = $char;
		}

		return $linhas;
	}

	public function __destruct(){
		fclose( $this->file );
	} 
}