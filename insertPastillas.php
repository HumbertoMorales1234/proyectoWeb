<?php
include("conexion.php");    

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

if($conn->connect_error){
    die("Error: ". $conn->connect_error);
}
    $medicina = $_POST['medicina'];
    $hora = $_POST['hora'];

$sql= "INSERT INTO Medicamento (nombreMedicamento, horarioConsumo) 
        VALUES ('".$medicina."', '".$hora."')";

$cursor = $conn->query($sql);

$resultados = mysqli_fetch_assoc($cursor);

$registros = $cursor->num_rows;

$conn->close();

if($registros==1){
    echo "
    <script>
    alert('Guardado con Exito');
    window.location = 'index.php';
    </script>"
}else{
    echo "
    <script>
    alert('Error al guardar');
    window.location = 'index.php';
    </script>"
}

?>