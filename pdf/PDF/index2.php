


    <link rel="stylesheet" type="text/css" href="web/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="web/css/bootstrap-grid.min.css">
    <link rel="stylesheet" type="text/css" href="web/css/bootstrap-reboot.min.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
 
<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
 

<script>
    //localize();

	function localize(){navigator.geolocation.getCurrentPosition(mapa,error);}
 
    function mapa(pos){
        var latitud = pos.coords.latitude; 
       
        var longitud = pos.coords.longitude;
        $("#latitud").val(latitud);
        $("#longitud").val(longitud);
        var precision = pos.coords.accuracy;
    }
 
    function error(errorCode){
        if(errorCode.code == 1)
            alert("No has permitido buscar tu localizacion")
        else if (errorCode.code==2)
            alert("Posicion no disponible")
        else
            alert("Ha ocurrido un error")
    }

</script>

<form action="" method="POST">

    <input id="latitud" type="text" name="datos[latitud]" value="" hidden>
    <input id="longitud" type="text" name="datos[longitud]" value="" hidden>

</form>


<body onLoad="localize()">


</a>

<script src="bootstrap/js/jquery-3.5.1.slim.min.js"></script>
    <script src="boostrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="web/js/sweetAlert/libreria_sweetAlert.js"></script>
    <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>

  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


<?php 

$datos=$_POST['datos'];

$lat=$datos['latitud'];
$lon=$datos['longitud'];

$googleApiUrl ="https://api.openweathermap.org/data/2.5/weather?lat=" . $lat . "&lon=" . $lon . "&appid=364b8c96a92b46376a612bae9241de67&lang=en"; ?>

<?php 
// Entra con la $googleApiUrl //
include $_SERVER['DOCUMENT_ROOT'] . '/Verano-2022\app\plantillas\bloques\destinos\curl_OpenWeather.inc';?><?php




if (!$data == null) { ?>
<a href="https://www.eltiempo.es/" target="_blank"> <?php
    if ($data->cod != 200) { //exit("An error has occurred: ".$data->message);
        $data = json_decode($response);
    } ?>




<div class="row">
    <div class="col-xl-12 text-center col-lg-12 col-md-12 col-sm-12 col-12">
        <div style="">
                <span><?php echo $data->name; ?></span>
                <span class="weather-forecast">
                    <img src="http://openweathermap.org/img/w/<?php echo ($data->weather[0]->icon);?>.png" class="weather-icon" /> 
                    <?php echo (round(($data->main->temp) - 273, 0, PHP_ROUND_HALF_ODD));?> Cº 
                </span>
        </div>
    </div>
</div>

   <?php
}; 

?>