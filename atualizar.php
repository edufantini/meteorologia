<?php
   require_once("conecta.php");
   require_once("functions.php");

	date_default_timezone_set('America/Sao_Paulo');

	$temp=$_POST["temp"];
	$umi=$_POST["umi"];
	$date_e = utf8_encode(strftime('%A, %d de %B de %Y', strtotime('today')));
	$hora_e = date("H:i");
   //echo timeago('2017/05/08 15:25:02');
   //http://www.instructables.com/id/Arduino-Modules-Rain-Sensor/
	$data_n = date("Y/m/d H:i:s");

	if (!empty($temp) && !empty($umi)){
    	$query = "UPDATE dados SET temperatura=$temp, umidade=$umi, data_e='$date_e', hora_e='$hora_e', data_n='$data_n' WHERE local='Medianeira'";
    	mysqli_query($conexao, $query);
	}else{
    	echo "Nada recebido";
	}
	
	header("Location: index.php");