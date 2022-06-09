<?php
//Aquí estan las variables de conexion
include("conexion.php");    

//Establecer conexion
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

if($conn->connect_error){
    die("Error: ". $conn->connect_error);
}

    $correo = $_POST['correo'];
    $passwd = $_POST['clave'];

$sql= "SELECT * FROM Paciente WHERE correo='".$correo."' and contraseña=md5('".$passwd."')";

$cursor = $conn->query($sql);

$resultados = mysqli_fetch_assoc($cursor);

$registros = $cursor->num_rows;

$conn->close();

if($registros == 1){
    session_start();
    $_SESSION["correo"]=$correo;
    $_SESSION["id"]=$resultados["idPaciente"];
    
    header("Location: PerfilUsuario.php");
}else{
    echo "
    <script>
        alert('Usuario y contraseña incorrectos');
        window.location = 'index.php';
    </script>";
}

?>