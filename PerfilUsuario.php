<?php
session_start();

if(!isset($_SESSION["correo"])){
    echo "
    <script>
        alert('Ingresa usuario y contraseña');
        window.location = 'index.php';
    </script>";
    session_destroy();
    die;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Salud - Perfil de usuario</title>
    <link rel="stylesheet" href="recursos/estilos.css">
    <style>
        form{
            float: left;
            margin: 10px;
        }
        #caja{
            text-align: right;
        }
    </style>
</head>
<body>
    <header id="encabezado">
        <img src="recursos/logoGenerico.png" alt="logoGenerico" width="50px" id="logoGenerico">
        <h1>
            E-Salud
        </h1>
        <input type="button" id="cerrar" value="Cerrar sesión" onClick="location.href='index.php'">
    </header>
    <aside id="lateral" name="lateral">
        <nav id="menu">
                <h3><a href="PerfilUsuario.php">Perfil</a></h3>
                <h3><a href="Pastillero.php">Pastillero</a></h3>
                <h3><a href="SignosVitales.php">Signos Vitales</a></h3>
                <h3><a href="Resumen.php">Resumen</a></h3>
        </nav>
    </aside>
    <?php
    
$id = $_SESSION["id"];

include("conexion.php");    

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);


if($conn->connect_error){
    die("Error: ". $conn->connect_error);
}


$sql= "SELECT * FROM Paciente WHERE idPaciente=".$_SESSION["id"];

$cursor = $conn->query($sql);

$resultados = mysqli_fetch_assoc($cursor);

$registros = $cursor->num_rows;

$conn->close();


?>
    <div id="caja">
    <form action="update.php" method="post">
        <br>
        <label for="nombre">Nombre: </label>
        <input type="text" id="nombre" name="nombre" required placeholder="Introduce tu nombre" value="<?=$resultados["nombrePaciente"] ?>">
        <br>
        <label for="aPaterno">Apellido paterno: </label>
        <input type="text" id="aPaterno" name="aPaterno" required placeholder="Introduce tu apellido paterno" value="<?=$resultados["apellidoP"] ?>">
        <br>
        <label for="aMaterno">Apellido materno: </label>
        <input type="text" id="aMaterno" name="aMaterno" required placeholder="Introduce tu apellido materno" value="<?=$resultados["apellidoM"] ?>">
        <br>
        <label for="correo" >Correo: </label>
        <input type="mail" required placeholder="Introduce tu correo" id="correo" name="correo" value="<?=$resultados["correo"] ?>">
        <br>
        <label for="alergias" >Alergias: </label>
        <input type="text" id="alergias" name="alergias" placeholder="Introduce tus alergias" value="<?=$resultados["alergia"] ?>">
        <br>
        <label for="cronicos">Padecimientos crónicos: </label>
        <input type="text" id="cronicos" name="cronicos" placeholder="Introduce tus padecimientos" value="<?=$resultados["padecimiento"] ?>">
        <br>
        <label for="aergiasM" >Alergias a medicamentos: </label>
        <input type="text" id="alergiasM" name="alergiasM" placeholder="Confirma la contraseña" value="<?=$resultados["alergia"] ?>">
        <br>
        <label for="sangre" >Tipo de sangre: </label>
        <input type="text" id="sangre" name="sangre" placeholder="Introduce tipo de sangre" value="<?=$resultados["grupoSanguineo"] ?>">
        <br>
        <label for="contraseña" >Contraseña: </label>
        <input type="password" id="contraseña" name="contraseña" required placeholder="Introduce tu contraseña" >
        <br>
        <label for="confirmar" >Confirmar contraseña: </label>
        <input type="password" id="confirmar" name="confirmar" required placeholder="Confirma la contraseña">
        <br>
        <button type="submit">Guardar</button>
    </form>
    </div>  
</body>
</html>