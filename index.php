<?php 

require_once("header.php");
require_once("conecta.php");

$resultado = mysqli_query($conexao, "SELECT * from dados");
$dados = mysqli_fetch_assoc($resultado);

?>
    <div class="bloc bgc-outer-space bg-city-overlay d-bloc" id="header">
        <div class="container bloc-xl">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="text-center mg-lg tc-white">ESSE É UM SIMPLES MEDIDOR DE <span
                            data-typer-targets="TEMPERATURA,UMIDADE"></span></h3>

                    <p class="text-center  mg-lg animated fadeInUp animDelay02">
                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
                        Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus
                        mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa
                        quis enim.
                    </p>
                    
                    <div class="row">

                    <!-- OFFLINE -->

                    	<!-- <div class="col-sm-4">
                    		<div class="text-center">
                        		<span class="ion-thermometer icon-carmine-pink animated zoomIn animDelay02" style="font-size: 64px;"></span>
                        		<h4 class="mg-md">24 ºC</h4>
                   				<p style="font-size: 12px">(Temperatura)</p>
                    		</div>
                		</div>

                        <div class="col-sm-4">
                            <div class="text-center">
                                <span class="et-icon-cloud icon-carmine-pink animated zoomIn animDelay02" style="font-size: 82px;"></span>
                                <h3 class="mg-md">NUBLADO</h3>
                                <p style="font-size: 12px">O dia está nublado!</p>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="text-center">
                                <span class="ion-waterdrop icon-carmine-pink animated zoomIn animDelay02" style="font-size: 64px;"></span>
                                <h4 class="mg-md">63 %</h4>
                                <p style="font-size: 12px">(Umidade relativa do ar)</p>
                            </div>
                        </div>

                        <div class="col-sm-12 text-left coleta">
                            <p style="font-size: 10px;">(Data de coleta: 30/04/2017)</p>
                        </div> -->

                        <!-- ONLINE -->

                        <div class="col-sm-4">
                            <div class="text-center">
                                <span class="ion-thermometer icon-carmine-pink animated zoomIn animDelay02" style="font-size: 64px;"></span>
                                <h4 class="mg-md"><?php echo $dados["temperatura"];?> °C</h4>
                                <p style="font-size: 12px">(Temperatura)</p>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="text-center">
                                <i class="fa fa-sun-o fa-spin icon-carmine-pink animated zoomIn animDelay05" aria-hidden="true" style="font-size: 82px;"></i>
                                <h3 class="mg-md">SOL!</h3>
                                <p style="font-size: 12px">O dia está ensolorado!</p>
                            </div>
                        </div>

                		<div class="col-sm-4">
                    		<div class="text-center">
                        		<span class="ion-waterdrop icon-carmine-pink animated zoomIn animDelay02" style="font-size: 64px;"></span>
                        		<h4 class="mg-md"><?php echo $dados["umidade"];?> %</h4>
                        		<p style="font-size: 12px">(Umidade relativa do ar)</p>
                    		</div>
                		</div>

                        <div class="col-sm-12 text-center coleta">
                        <br>
                            <span class="fa fa-refresh icon-carmine-pink animated zoomIn animDelay02" style="font-size: 12px;">
                            <p style="color: #fff; font-size: 12px;display: inline-block;"><?php echo $dados["data"]; echo " - "; echo $dados["hora"]?></p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<?php require_once("footer.php") ?>