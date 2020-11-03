<?php

require_once "PHP/Config/Config.php";

use Arquivos\TrataArquivo;
use Analisador\AnaLex;

$arquivo = new TrataArquivo( $newName );

$dados = $arquivo->texto();

$resultado = new AnaLex( $dados );

$resultado->lexico();

$results = $resultado->getTabelaLex();

?>

<div class="card">
	<div class="card-header">
		<h2 class="font-weight-bold text-primary">Resultados</h2>
	</div>
	<div class="card-body row">
		<table class="table table-striped">
			<thead>
			<tr>
				<th scope="col">Lexena</th>
				<th scope="col">Token</th>
			</tr>
			</thead>
			<tbody>
			<?php
			foreach ($results as $k => $v )
				echo '<tr><th scope="row">'. $v[0] .'</th><td>'. $v[1] .'</td></tr>';
			?>
			</tbody>
		</table>
	</div>
</div>