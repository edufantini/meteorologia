<?php 

require_once("header.php");
require_once("conecta.php");
require_once("functions.php");

$resultado = mysqli_query($conexao, "SELECT * from dados");
$dados = mysqli_fetch_assoc($resultado);
$data_n = $dados["data_n"];
$chuva = $dados["chuva"]; //0 = erro 1 = chuva forte 2 = chuva fraca 3 = seco
$sol = $dados["sol"];

?>
    <div class="bloc bgc-outer-space bg-city-overlay d-bloc" id="header">
        <div class="container bloc-xl">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="text-center mg-lg tc-white" style="font-size: 24px;">ESSE É UM SIMPLES MEDIDOR <br>DE <span
                            data-typer-targets="TEMPERATURA,UMIDADE"></span></h3>

                    <p class="text-center  mg-lg animated fadeInUp animDelay02">
                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
                        Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus
                        mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa
                        quis enim.
                    </p>
                    
                    <div class="row">

                        <div class="col-sm-4">
                            <div class="text-center">
                                <span class="ion-thermometer icon-carmine-pink animated zoomIn animDelay02" style="font-size: 64px;"></span>
                                <h4 class="mg-md"><?php echo $dados["temperatura"];?> °C</h4>
                                <p style="font-size: 13px; color: #fff">(Temperatura)</p>
                            </div>
                        </div>

                        <?php

                        if($chuva == 0 || $sol == 0) { ?>
                                
                                <div class="col-sm-4">
                                    <div class="text-center">
                                        <span class="fa fa-times animated zoomIn animDelay02" style="font-size: 82px; color: #d32f2f;"></span>
                                        <h3 class="mg-md" style="color: #fff;">ERRO!</h3>
                                        <p style="font-size: 13px; color: #fff">Ops, parece que tivemos um problema!<br>Ou nossos sensores estão iniciando, ou...</p>
                                    </div>
                                </div> <?php

                        }else if($chuva == 1) {?>
                                
                                <div class="col-sm-4">
                                    <div class="text-center">
                                        <span class="owf owf-232 icon-carmine-pink animated zoomIn animDelay02" style="font-size: 82px;"></span>
                                        <h3 class="mg-md">TEMPESTADE</h3>
                                        <p style="font-size: 13px; color: #fff">Está havendo uma tempestade, tome cuidado com possíveis raios!</p>
                                    </div>
                                </div> <?php

                        }else if($chuva == 2) {?>
                                
                                <div class="col-sm-4">
                                    <div class="text-center">
                                        <span class="owf owf-522 icon-carmine-pink animated zoomIn animDelay02" style="font-size: 82px;"></span>
                                        <h3 class="mg-md">CHUVA LEVE</h3>
                                        <p style="font-size: 13px; color: #fff">Pegue seu guarda chuva, está chovendo!</p>
                                    </div>
                                </div> <?php

                        }else if($chuva == 3) {

                        	if($sol == 1) {?>
                                
                                <div class="col-sm-4">
                                    <div class="text-center">
                                        <i class="fa fa-sun-o fa-spin icon-carmine-pink animated zoomIn animDelay05" aria-hidden="true" style="font-size: 82px;"></i>
                                        <h3 class="mg-md">SOL!</h3>
                                        <p style="font-size: 13px; color: #fff">O dia está ensolorado, aproveite!</p>
                                    </div>
                                </div> <?php

                        	}else if($sol == 2) {?>
                                
                                <div class="col-sm-4">
                                    <div class="text-center">
                                        <i class="owf owf-803 icon-carmine-pink animated zoomIn animDelay05" aria-hidden="true" style="font-size: 82px;"></i>
                                        <h3 class="mg-md">NUBLADO!</h3>
                                        <p style="font-size: 13px; color: #fff">O dia está nublado!</p>
                                    </div>
                                </div> <?php

                        	}
                        }

                        /*switch ($chuva) {

                            case 0:?>
                                
                                <div class="col-sm-4">
                                    <div class="text-center">
                                        <span class="fa fa-times animated zoomIn animDelay02" style="font-size: 82px; color: #d32f2f;"></span>
                                        <h3 class="mg-md" style="color: #fff;">ERRO!</h3>
                                        <p style="font-size: 13px; color: #fff">Ops, parece que tivemos um problema!<br>Ou nossos sensores estão iniciando, ou...</p>
                                    </div>
                                </div> <?php
                                break;

                            case 1:?>
                                
                                <div class="col-sm-4">
                                    <div class="text-center">
                                        <span class="owf owf-232 icon-carmine-pink animated zoomIn animDelay02" style="font-size: 82px;"></span>
                                        <h3 class="mg-md">TEMPESTADE</h3>
                                        <p style="font-size: 13px; color: #fff">Está havendo uma tempestade, cuidado com os raios!</p>
                                    </div>
                                </div> <?php
                                break;
                            
                            case 2:?>
                                
                                <div class="col-sm-4">
                                    <div class="text-center">
                                        <span class="owf owf-522 icon-carmine-pink animated zoomIn animDelay02" style="font-size: 82px;"></span>
                                        <h3 class="mg-md">CHUVA LEVE</h3>
                                        <p style="font-size: 13px; color: #fff">Pegue seu guarda chuva, está chovendo!</p>
                                    </div>
                                </div> <?php
                                break;

                            case 3:?>
                                
                                <div class="col-sm-4">
                                    <div class="text-center">
                                        <i class="fa fa-sun-o fa-spin icon-carmine-pink animated zoomIn animDelay05" aria-hidden="true" style="font-size: 82px;"></i>
                                        <h3 class="mg-md">SOL!</h3>
                                        <p style="font-size: 13px; color: #fff">O dia está ensolorado, aproveite!</p>
                                    </div>
                                </div> <?php
                                break;
                        }*/

                        ?>

                		<div class="col-sm-4">
                    		<div class="text-center">
                        		<span class="ion-waterdrop icon-carmine-pink animated zoomIn animDelay02" style="font-size: 64px;"></span>
                        		<h4 class="mg-md"><?php echo $dados["umidade"];?> %</h4>
                        		<p style="font-size: 13px; color: #fff">(Umidade relativa do ar)</p>
                    		</div>
                		</div>

                        <div class="col-sm-12 text-center coleta">
                        	<br>
                            <span class="fa fa-refresh icon-carmine-pink animated zoomIn animDelay05" style="font-size: 16px;">
                            <p style="color: #fff; font-size: 14px;display: inline-block;"><?php /*echo $dados["data_e"]; echo " - "; echo $dados["hora_e"];*/ echo "Atualizado "; echo time_ago($data_n);?></p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<?php require_once("footer.php") ?>