<?php
session_start();

$usuario = $_POST["usuario"];
$clave = $_POST["clave"];

include("conexion.php");    

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);


if($conn->connect_error){
    die("Error: ". $conn->connect_error);
}


$sql= "SELECT * FROM paciente WHERE correo='".$usuario."' and contraseña='".$clave."'";

$cursor = $conn->query($sql);

$resultados = mysqli_fetch_assoc($cursor);

$registros = $cursor->num_rows;

$conn->close();

if($registros == 1){
    $_SESSION["id"]=$resultados["idPaciente"];

    header("Location: PerfilUsuario.php");
}else{

}

?>