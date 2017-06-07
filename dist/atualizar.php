<?php
	require_once("conecta.php");
 	require_once("functions.php");

	setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
	date_default_timezone_set('America/Sao_Paulo');

	$temp=$_POST["temp"];
	$umi=$_POST["umi"];
	$chuva=$_POST["chuva"];
   $sol=$_POST["sol"];
	$date_e = utf8_encode(strftime('%A, %d de %B de %Y', strtotime('today')));
	$hora_e = date("H:i");
   //http://www.instructables.com/id/Arduino-Modules-Rain-Sensor/
	$data_n = time();

	if (!empty($temp) && !empty($umi)){
    	$query = "UPDATE dados SET temperatura=$temp, umidade=$umi, chuva='$chuva', sol='$sol', data_e='$date_e', hora_e='$hora_e', data_n='$data_n' WHERE local='Medianeira'";
    	mysqli_query($conexao, $query);
	}else{
    	echo "Nada recebido";
	}
	
	header("Location: index.php");