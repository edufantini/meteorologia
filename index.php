<?php 

require_once("header.php");
require_once("conecta.php");
require_once("functions.php");

$resultado = mysqli_query($conexao, "SELECT * from dados");
$dados = mysqli_fetch_assoc($resultado);
$data_n = $dados["data_n"];

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

                        <div class="col-sm-4">
                            <div class="text-center">
                                <i class="fa fa-sun-o fa-spin icon-carmine-pink animated zoomIn animDelay05" aria-hidden="true" style="font-size: 82px;"></i>
                                <h3 class="mg-md">SOL!</h3>
                                <p style="font-size: 13px; color: #fff">O dia está ensolorado!</p>
                            </div>
                        </div>

                        <!-- <div class="col-sm-4">
                            <div class="text-center">
                                <span class="fa fa-cloud icon-carmine-pink animated zoomIn animDelay02" style="font-size: 82px;"></span>
                                <h3 class="mg-md">NUBLADO</h3>
                                <p style="font-size: 13px">O dia está nublado!</p>
                            </div>
                        </div> -->

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
                            <p style="color: #fff; font-size: 14px;display: inline-block;"><?php echo $dados["data_e"]; echo " - "; echo $dados["hora_e"]; echo " - "; echo timeago($data_n); echo "($data_n)"?></p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<?php require_once("footer.php") ?>