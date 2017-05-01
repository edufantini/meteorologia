<?php
   	include("conecta.php");

   	date_default_timezone_set('America/Sao_Paulo');

	$temp=$_POST["temp"];
	$umi=$_POST["umi"];

	if (!empty($temp) && !empty($umi)){
    	$query = "UPDATE dados SET temperatura=$temp, umidade=$umi, data=timestamp('d-m-Y H:i') WHERE local='Medianeira'";
    	mysqli_query($conexao, $query);
	}else{
    	echo "Nada recebido";
	}

	header("Location: index.php");