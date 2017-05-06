<?php
   	include("conecta.php");

   	setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
	date_default_timezone_set('America/Sao_Paulo');

	$temp=$_POST["temp"];
	$umi=$_POST["umi"];
	$date = strftime('%A, %d de %B de %Y', strtotime('today'));
	$hora = date("H:i");

	if (!empty($temp) && !empty($umi)){
    	$query = "UPDATE dados SET temperatura=$temp, umidade=$umi, data='$date', hora='$hora' WHERE local='Medianeira'";
    	mysqli_query($conexao, $query);
	}else{
    	echo "Nada recebido";
	}
	
	header("Location: index.php");