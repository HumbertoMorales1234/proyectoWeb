<?php
session_start();
include("conexion.php");    

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

if($conn->connect_error){
    die("Error: ". $conn->connect_error);
}
    $medicina = $_POST['medicina'];

$sql= "INSERT INTO Medicamento (nombreMedicamento, horarioConsumo) VALUES ('".$medicina."', CURRENT_DATE)";

$cursor = $conn->query($sql);


/*$sql2= "INSERT INTO paciente_has_medicamento (Paciente_idPaciente) VALUES ('".$_SESSION["id"].")";

$cursor2 = $conn->query($sql2);*/

$registros = $cursor->num_rows;

$conn->close();

if($cursor){
    echo "
    <script>
    alert('Guardado con Exito');
    window.location = 'Pastillero.php';
    </script>";
}else{
    echo "
    <script>
    alert('Error al guardar');
    window.location = 'Pastillero.php';
    </script>";
}

?>