<?php

require_once "PHP/Config/Config.php";

use Arquivos\TrataArquivo;
use Compilador\Compila;

$arquivo = new TrataArquivo( $newName );

$dados = $arquivo->texto();

$resultado = new Compila( $dados );

$resultado->compilar();

$results = $resultado->getResultados();

?>

<div class="card">
	<div class="card-header">
		<h2 class="font-weight-bold text-primary">Resultados</h2>
	</div>
	<div class="card-body row">
	<?php
		foreach ($dados as $k => $v )
			echo "<p class='col-12'>" . $v . " = " . $results[ $k ] . "</p>";
		?>
	</div>

</div>