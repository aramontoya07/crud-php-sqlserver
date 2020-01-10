<?php

$serverName = "localhost";
$connectionInfo = array("Database"=>"Usuarios", "UID"=>"pruebaUsuarios", "PWD"=>"prueba23*", "CharacterSet"=>"UTF-8");
$con = sqlsrv_connect($serverName, $connectionInfo);

if($con){
    echo"conexion exitosa";
}else{
    echo "fallo la conexion";
    
}


?>