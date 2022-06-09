<?php
session_start();
include("conexion.php");    

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

if($conn->connect_error){
    die("Error: ". $conn->connect_error);
}


$sql= "INSERT INTO paciente_has_signovital (Paciente_idPaciente) VALUES (".$_SESSION["id"].")";

$cursor = $conn->query($sql);

$registros = $cursor->num_rows;

$conn->close();

if($cursor){
    echo "
    <script>
    alert('Guardado con Exito');
    window.location = 'SignosVitales.php';
    </script>";
}else{
    echo "
    <script>
    alert('Error al guardar');
    window.location = 'SignosVitales.php';
    </script>";
}

?>