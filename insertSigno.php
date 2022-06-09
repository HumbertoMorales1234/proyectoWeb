<?php
include("conexion.php");    

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

if($conn->connect_error){
    die("Error: ". $conn->connect_error);
}
    $vital = $_POST['vital'];
    $valor = $_POST['valor'];

$sql= "INSERT INTO SignoVital (nombreSigno, cantidadMedida, fechaSigno) 
        VALUES ('".$vital."', '".$valor."', CURRENT_DATE)";

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