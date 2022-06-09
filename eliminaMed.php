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
include("conexion.php");    


$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

if($conn->connect_error){
    die("Error: ". $conn->connect_error);
}

$idMedicamento = $_GET['idMedicamento'];
$sql= "DELETE FROM paciente_has_medicamento WHERE Medicamento_idMedicamento=".$idMedicamento;

$cursor = $conn->query($sql);

$registros = $cursor->num_rows;

$sql2= "DELETE FROM medicamento WHERE idMedicamento=".$idMedicamento;
$cursor2 = $conn->query($sql2); 
$conn->close();

if($cursor){
    echo "
    <script>
    alert('Borrado con Exito');
    window.location = 'Pastillero.php';
    </script>";
}else{
    echo "
    <script>
    alert('Error al Borrar');
    window.location = 'Pastillero.php';
    </script>";
}

?>