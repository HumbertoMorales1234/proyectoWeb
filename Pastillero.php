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
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Salud - Pastillero</title>
    <link rel="stylesheet" href="recursos/estilos.css">
    <style>
        form {
            margin: 10px;
        }

        #caja {
            float: left;
            margin: 10px;
            text-align: right;
        }

    </style>
</head>

<body>
    <header id="encabezado">
        <img src="recursos/logoGenerico.png" alt="logoGenerico" width="50px" id="logoGenerico">
        <h1>
            E-Salud
        </h1>
        <input type="button" id="cerrar" value="Cerrar sesión" onClick="location.href='index.php'">
    </header>
    <aside id="lateral" name="lateral">
        <nav id="menu">
            <h3><a href="PerfilUsuario.php">Perfil</a></h3>
            <h3><a href="Pastillero.php">Pastillero</a></h3>
            <h3><a href="SignosVitales.php">Signos Vitales</a></h3>
            <h3><a href="Resumen.php">Resumen</a></h3>
        </nav>
    </aside>
    <div id="caja">
        <form action="insertPastillas.php" method="post">
            <br>
            <label for="medicina">Medicina: </label>
            <input type="text" id="medicina" name="medicina" required placeholder="Introduce el nombre de la medicina">
            <br>
            <button type="input">Guardar</button>
            <button><a href="PerfilUsuario.php">Cancelar</a></button>
        </form>
    </div>
    <br>
    <div>
        <label for="atomar">Medicamentos listados</label>
            <table border="1" id="atomar">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Medicamento</th>
                        <th>Fecha</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    
                    <?php
                    $id = $_SESSION["id"];

                    include("conexion.php");    
                    
                    $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
                    
                    
                    if($conn->connect_error){
                        die("Error: ". $conn->connect_error);
                    }

                    $sql= "SELECT * FROM paciente_has_medicamento as A INNER JOIN medicamento 
                    as B ON B.idMedicamento = A.Medicamento_idMedicamento WHERE A.Paciente_idPaciente=".$_SESSION["id"];

                    $cursor = $conn->query($sql);

                    while($tupla = $cursor->fetch_assoc()){
                        echo '
						<tr>
							<td>'.$tupla["idMedicamento"].'</td>
							<td>'.$tupla["nombreMedicamento"].'</td>
                            <td>'.$tupla["horarioConsumo"].'</td>
							<th>
							<button><a href="eliminaMed.php?idMedicamento='.$tupla["idMedicamento"].'">Eliminar</a></button>
							</th>
						</tr>';
                        ?>
                    <?php }
                    $conn->close();?> 
                </tbody>
            </table>
    </div>
</body>

</html>