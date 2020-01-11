<!DOCTYPE html>
    <?php
        include("conexion_sys.php");
    ?>
    <meta charset="UTF-8">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CRUD CON PHP & SQL SERVER</title>
        <link href="css/bootstrap.min.css" rel="stylesheet"> 
        <link href="css/style.css" rel="stylesheet">
    </head>

    <body>
        <?php	
            if(isset($_GET['editar'])){
                    $editar_id = $_GET['editar'];

                    $consulta = "SELECT * FROM usuarios WHERE id='$editar_id'";
                    $ejecutar = sqlsrv_query($con, $consulta);

                    $fila = sqlsrv_fetch_array($ejecutar);

                    $usuario = $fila['usuario'];
                    $password = $fila['password'];
                    $mail = $fila['mail'];
                }
        ?>

    <br />
    <div class="contenedor">
        <div class="col-md-8 col-md-offset-2">
                <form method="POST" action="">
                    <div class="form-group">
                        <label>Nombre:</label>
                        <input type="text" name="nombre" class="form-control" value="<?php echo $usuario; ?>"><br />
                    </div>
                    <div class="form-group">
                        <label>Contraseña:</label>
                        <input type="text" name="passw" class="form-control" value="<?php echo $password; ?>"><br />
                    </div>
                    <div class="form-group">
                        <label>Mail:</label>
                        <input type="text" name="mail" class="form-control" value="<?php echo $mail; ?>"><br />
                    </div>
                    <div class="form-group">				
                        <input type="submit" name="actualizar" class="btn btn-warning" value="ACTUALIZAR DATOS"><br />
                    </div>
                </form>
        </div>
    </div>

    <?php

        if(isset($_POST['actualizar'])){
            $actualizar_nombre = $_POST['nombre'];
            $actualizar_password = $_POST['passw'];
            $actualizar_mail = $_POST['mail'];

            $consulta = "UPDATE usuarios SET usuario='$actualizar_nombre', password='$actualizar_password', mail='$actualizar_mail' WHERE id='$editar_id'";

            $ejecutar = sqlsrv_query($con, $consulta);

            if($ejecutar){
                    echo "<script>alert('Datos actualizados')</script>";
                    echo "<script>window.open('formulario.php', '_self')</script>";
            }			
        }

    ?>
    </body>
<html>



