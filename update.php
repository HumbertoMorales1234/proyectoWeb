<?php
session_start();


include("conexion.php");    


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
    $alergias = $_POST['alergias'];
    $cronicos = $_POST['cronicos'];
    $alergiasM = $_POST['alergiasM'];
    $sangre = $_POST['sangre'];


    if($confirmar != $contraseña){
        echo "
        <script>
            alert('Ingresa usuario y contraseña');
            window.location = 'index.php';
        </script>"
    die;
    }

$sql= "UPDATE Paciente SET nombrePaciente='".$nombre."', apellidoP='".$aPaterno."', apellidoM='".$aMaterno."',grupoSanguineo='".$sangre."',
        correo='".$correo."', alergia='".$alergias."', padecimiento='".$cronicos."',alergiasM='".$alergiasM."' WHERE idPaciente=".$_SESSION["id"];

$cursor = $conn->query($sql);

$resultados = mysqli_fetch_assoc($cursor);

$registros = $cursor->num_rows;

$conn->close();

if($registros==1){
    echo "
    <script>
    alert('Guardado con Exito');
    window.location = 'PerfilUsuario.php';
    </script>"
}else{
    echo "
    <script>
    alert('Error al guardar');
    window.location = 'PerfilUsuario.php';
    </script>"
}

?>