<!DOCTYPE html>
<?php
    include("conexion_sys.php");
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width-device-width, initial-scale=1">

    <title>CRUD CON PHP & SQL SERVER</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="col-md-8 col-md-offset-2">
        <h1>CRUD CON PHP Y SQL SERVER</h1>

        <form method="POST" action="formulario.php">
            <div class="form-group">
                <label>Nombre</label>
                <input type="text" name="nombre" class="form-control" placeholder="Escriba su nombre"><br />
            </div>
            <div class="form-group">
                <label>Contraseña</label>
                <input type="text" name="passw" class="form-control" placeholder="Escriba su contraseña"><br />
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="text" name="mail" class="form-control" placeholder="Escriba su mail"><br />
            </div>
            <div class="form-group">
                <input type="submit" name="insert" class="btn btn-warning" value="INSERTAR DATOS"><br />
            </div>
        </form>

    </div>
    <br /><br /><br />

    <?php
        if(isset($_POST['insert'])){
            $usuario = $_POST['nombre'];
            $pass = $_POST['passw'];
            $mail = $_POST['mail'];

            $insertar = "INSERT INTO usuarios(usuario, password, mail)VALUES('$usuario', '$pass', '$mail')";
            $ejecutar = sqlsrv_query($con, $insertar);

            if($ejecutar){
                echo "<h3>Insertado correctamente</h3>";
            }
        }
    ?>

    <div class="col-md-8 col-md-offset-2">
        <table class="table table-bordered table-responsive">
            <tr>
                <td>ID</td>
                <td>Usuario</td>
                <td>Passwod</td>
                <td>Mail</td>
                <td>Accion</td>
                <td>Accion</td>
            </tr>

            <?php
                $consulta = "SELECT * FROM usuarios";
                $ejecutar = sqlsrv_query($con, $consulta);

                $i = 0;

                while($fila = sqlsrv_fetch_array($ejecutar)){
                    $id = $fila['id'];
                    $usuario = $fila['usuario'];
                    $password = $fila['password'];
                    $mail = $fila['mail'];
                    $i++;
                }
            ?>
            <tr align="center">
                <td><?php echo $id; ?></td>
                <td><?php echo $usuario; ?></td>
                <td><?php echo $password; ?></td>
                <td><?php echo $mail; ?></td>
                <td><a href="formulario.php?editar=<?php echo $id; ?>">Editar</a></td> <!--Para poder editar, edito por el id-->
                <td><a href="formulario.php?borrar=<?php echo $id; ?>">Borrar</a></td>
            </tr>
        </table>
    </div>

</body>

</html>