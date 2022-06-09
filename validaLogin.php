<?php
//Aquí estan las variables de conexion
include("conexion.php");    

//Establecer conexion
$conn = new mysqli($servidor, $user, $password, $bd);

if($conn->connect_error){
    die("Error: ". $conn->connect_error);
}

    $correo = $_POST['correo'];
    $passwd = $_POST['clave'];

$sql= "SELECT * FROM Paciente WHERE correo='".$correo."' and contraseña=md5('".$passwd."')";

$cursor = $conn->query($sql);

$registros = $cursor->num_rows;

$conn->close();

if($registros == 1){
    session_start();
    $_SESSION["correo"]=$correo;
    header("Location: PerfilUsuario.php");
}else{
    header("Location: index.php?error=usuario y /opassword invalido");
}

?>