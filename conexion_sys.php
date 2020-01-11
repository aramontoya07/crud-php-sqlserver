<?php

$serverName = "localhost";
$connectionInfo = array("Database"=>"Usuarios", "UID"=>"pruebaUsuarios", "PWD"=>"prueba23*", "CharacterSet"=>"UTF-8");
$con = sqlsrv_connect($serverName, $connectionInfo);

if($con){
    
}else{
    echo "fallo la conexión";
    
}


?>