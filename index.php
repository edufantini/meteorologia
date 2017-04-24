<?php 

require_once("header.php");
require_once("conecta.php");

//$resultado = mysqli_query($conexao, "SELECT * from dados");
//$dados = mysqli_fetch_assoc($resultado);

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
                        <!-- <div class="col-sm-4">
                            <div class="text-center">
                                <span class="ion-thermometer icon-carmine-pink animated zoomIn animDelay02" style="font-size: 64px;"></span>
                                <h4 class="mg-md"><?php echo $dados["temperatura"];?> °C</h4>
                                <p style="font-size: 12px">(Temperatura)</p>
                            </div>
                        </div> -->
                    	<div class="col-sm-4">
                    		<div class="text-center">
                        		<span class="ion-thermometer icon-carmine-pink animated zoomIn animDelay02" style="font-size: 64px;"></span>
                        		<h4 class="mg-md">24 ºC</h4>
                   				<p style="font-size: 12px">(Temperatura)</p>
                    		</div>
                		</div>
                        <!-- <div class="col-sm-4">
                            <div class="text-center">
                                <i class="fa fa-sun-o fa-spin icon-carmine-pink animated zoomIn animDelay05" aria-hidden="true" style="font-size: 82px;"></i>
                                <h3 class="mg-md">SOL!</h3>
                                <p style="font-size: 12px">O dia está ensolorado!</p>
                            </div>
                        </div> -->
                        <div class="col-sm-4">
                            <div class="text-center">
                                <span class="et-icon-cloud icon-carmine-pink animated zoomIn animDelay02" style="font-size: 82px;"></span>
                                <h3 class="mg-md">NUBLADO</h3>
                                <p style="font-size: 12px">O dia está nublado!</p>
                            </div>
                        </div>
                		<!-- <div class="col-sm-4">
                    		<div class="text-center">
                        		<span class="ion-waterdrop icon-carmine-pink animated zoomIn animDelay02" style="font-size: 64px;"></span>
                        		<h4 class="mg-md"><?php echo $dados["umidade"];?> %</h4>
                        		<p style="font-size: 12px">(Umidade relativa do ar)</p>
                    		</div>
                		</div> -->
                        <div class="col-sm-4">
                            <div class="text-center">
                                <span class="ion-waterdrop icon-carmine-pink animated zoomIn animDelay02" style="font-size: 64px;"></span>
                                <h4 class="mg-md">63 %</h4>
                                <p style="font-size: 12px">(Umidade relativa do ar)</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!--     <div class="bloc l-bloc bgc-white" id="dados">
        <div class="container bloc-lg">
            <div class="row">
                <div class="col-sm-4">
                    <div class="text-center">
                        <span class="et-icon-picture icon-xl icon-carmine-pink animated zoomIn animDelay02"></span>
                    </div>
                    <h3 class="text-center mg-md ">
                        Web Design
                    </h3>

                    <p class="text-center">
                        A little feature description could go here. A little feature description.
                    </p>
                </div>
                <div class="col-sm-4">
                    <div class="text-center">
                        <span class="et-icon-gears icon-xl icon-carmine-pink animated zoomIn"></span>
                    </div>
                    <h3 class="text-center mg-md ">
                        Web Development
                    </h3>

                    <p class="text-center">
                        A little feature description could go here. A little feature description.
                    </p>
                </div>
                <div class="col-sm-4">
                    <div class="text-center">
                        <span class="et-icon-linegraph icon-xl icon-carmine-pink animated zoomIn animDelay02"></span>
                    </div>
                    <h3 class="text-center mg-md ">
                        Promotion
                    </h3>

                    <p class="text-center">
                        A little feature description could go here. A little feature description.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="bloc bgc-platinum l-bloc" id="tecnologias">
        <div class="container bloc-lg">
            <div class="row">
                <div class="col-sm-2 text-center">
                    <span class="ion-social-javascript icon-carmine-pink animated zoomIn animDelay02" style="font-size: 72px;"></span>
                </div>
                <div class="col-sm-2 text-center">
                    <span class="ion-social-html5-outline icon-carmine-pink animated zoomIn animDelay02" style="font-size: 72px;"></span>
                </div>
                <div class="col-sm-2 text-center">
                    <span class="ion-social-css3-outline icon-carmine-pink animated zoomIn animDelay02" style="font-size: 72px;"></span>
                </div>
                <div class="col-sm-2 text-center">
                    <span class="ion-social-javascript icon-carmine-pink animated zoomIn animDelay02" style="font-size: 72px;"></span>
                </div>
                <div class="col-sm-2 text-center">
                    <span class="ion-social-javascript icon-carmine-pink animated zoomIn animDelay02" style="font-size: 72px;"></span>
                </div>
                <div class="col-sm-2 text-center">
                    <span class="ion-social-javascript icon-carmine-pink animated zoomIn animDelay02" style="font-size: 72px;"></span>
                </div>
            </div>
        </div>
    </div> -->

    <div class="bloc bgc-carmine-pink d-bloc" id="projeto">
        <div class="container bloc-md">
            <div class="row">
                <div class="col-sm-8">
                    <h3 class="mg-md animated zoomIn">
                        <span class="ion-merge animated zoomIn animDelay02" style="font-size: 42px; color: #fff"></span>
                        Conheça nosso projeto!
                    </h3>
                </div>
                <div class="col-sm-3 text-center">
                    <a href="https://github.com/edufantini/meteorologia" target="_blank" class="btn btn-lg wire-btn-white btn-wire animated zoomIn">VER NO  GITHUB <span class="fa fa-github animated zoomIn animDelay02" style="font-size: 22px; color: #fff"></span></a>                    
                </div>
            </div>
        </div>
    </div>


</div>

<?php require_once("footer.php") ?>