<!DOCTYPE html>
<html>
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
    <div class="contenedor">
        <header>
            <div class="titulo-header">
                <h1>CRUD CON PHP Y SQL SERVER</h1>
            </div>
        </header>
        <div class="col-md-8 col-md-offset-2">
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
    </div>
   

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
    <div class="contenedor">
        <div class="tabla">
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
                    
                ?>
                <tr align="center">
                    <td><?php echo $id; ?></td>
                    <td><?php echo $usuario; ?></td>
                    <td><?php echo $password; ?></td>
                    <td><?php echo $mail; ?></td>
                    <td><a href="formulario.php?editar=<?php echo $id; ?>">Editar</a></td> <!--Para poder editar, edito por el id-->
                    <td><a href="formulario.php?borrar=<?php echo $id; ?>">Borrar</a></td>
                </tr>

                    <?php } ?>
            </table>

            <?php
                if(isset($_GET['editar'])){
                    include('editar.php');
                }
            ?>

            <?php
                if(isset($_GET['borrar'])){
                    $borrar_id = $_GET['borrar']; //esto es para guardar en una variable el id a borrar
        
                    $borrar = "DELETE FROM usuarios WHERE id='$borrar_id'";
                    $ejecutar = sqlsrv_query($con, $borrar);
        
                    if($ejecutar){
                        echo "<script>alert('El usuario ha sido borrado')</script>";
                        echo "<script>window.open('formulario.php', '_self')</script>";
                    }	
                }
            ?>
        </div>
    </div>
    <footer class="footer">
        <div class="contenedor">
            
        </div>
    </footer>

</body>

</html>