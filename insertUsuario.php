<?php
//Aquí estan las variables de conexion
include("conexion.php");    

//Establecer conexion
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

if($conn->connect_error){
    die("Error: ". $conn->connect_error);
}
    $nombre = $_POST['nombre'];
    $aPaterno = $_POST['aPaterno'];
    $aMaterno = $_POST['aMaterno'];
    $correo = $_POST['correo'];
    $contraseña = $_POST['contraseña'];
    $confirmar = $_POST['confirmar'];

    if($confirmar != $contraseña){
        echo "
        <script>
            alert('Ingresa usuario y contraseña');
            window.location = 'index.php';
        </script>";
    die;
    }

$sql= "INSERT INTO Paciente (nombrePaciente, apellidoP, apellidoM, correo, contraseña) 
        VALUES ('".$nombre."','".$aPaterno."','".$aMaterno."','".$correo."', md5('".$contraseña."'))";

$cursor = $conn->query($sql);

$registros = $cursor->num_rows;

$conn->close();

if($cursor){
    echo "
    <script>
    alert('Guardado con Exito');
    window.location = 'index.php';
    </script>";
}else{
    echo "
    <script>
    alert('Error al guardar');
    window.location = 'index.php';
    </script>";
}

?>