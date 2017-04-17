<?php
require_once("header.php");
require_once("conecta.php");


$resultado = mysqli_query($conexao, "SELECT * from dados");
$dados = mysqli_fetch_assoc($resultado);

?>

<div class="container text-center page-header">
	<h1>Meteorologia</h1>
</div>
<div class="container text-center">

	<div class="row">
		<div class="col-md-4">
			<i class="fa fa-umbrella fa-3x" aria-hidden="true"></i>
			<p><br><strong>CHUVA!</strong></p>
		</div>
		<br>
		<div class="col-md-4">
			<i class="fa fa-tint fa-3x" aria-hidden="true"></i>
			<p><br><strong><?php echo $dados["umidade"];?>%</strong></p>
		</div>
		<br>
		<div class="col-md-4">
			<i class="fa fa-thermometer fa-3x" aria-hidden="true"></i>
			<p><br><strong><?php echo $dados["temperatura"];?>°C</strong></p>
		</div>
	</div>

<!-- 	<div class="alert alert-info" role="alert">
		<i class="fa fa-cloud fa-3x" aria-hidden="true"></i>
		<p><strong>NUBLADO!</strong></p>
		<p><i class="fa fa-thermometer" aria-hidden="true"></i><strong> 19°C</strong></p>
	</div>

	<div class="alert alert-info" role="alert">
		<i class="fa fa-snowflake-o fa-3x" aria-hidden="true"></i>
		<p><strong>NEVE!?</strong></p>
	</div>

	<div class="alert alert-warning" role="alert">
		<i class="fa fa-sun-o fa-3x" aria-hidden="true"></i>
		<p><strong>SOL!</strong></p>
	</div> -->
</div>