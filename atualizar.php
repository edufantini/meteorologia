<?php
   include("conecta.php");

	$temp=$_GET["temp"];
	$umi=$_GET["umi"];

   if (!empty($temp) && !empty($umi)){
      $query = "UPDATE dados SET temperatura=$temp, umidade=$umi WHERE local='Medianeira'";
      mysqli_query($conexao, $query);
   }else{
      echo "Nada recebido";
   }
