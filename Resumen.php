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
    <title>E-Salud - Resumen</title>
    <link rel="stylesheet" href="recursos/estilos.css">
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/raphael-min.js"></script>
    <script src="js/morris.min.js"></script>
    <link rel="stylesheet" href="recursos/morris.css">
    <style>
        #caja2{
            width: 600px;
            height: 600px;
        }
        div{
            margin-left: 120px;
        }
    </style>
</head>
<?php
$id = $_SESSION["id"];

include("conexion.php");    

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);


if($conn->connect_error){
    die("Error: ". $conn->connect_error);
}


$sql= "SELECT * FROM Paciente WHERE idPaciente=".$id;

$cursor = $conn->query($sql);

$resultados = mysqli_fetch_assoc($cursor);

$registros = $cursor->num_rows;

if($cursor){

}else{
    /* ESPACIO PARA ERROR */
}

$sql= "SELECT * FROM paciente_has_signovital as A INNER JOIN signovital 
        as B ON B.idSignoVital = A.SignoVital_idSignoVital WHERE A.Paciente_idPaciente=".$_SESSION["id"];
$cursor2 = $conn->query($sql);

if($cursor2){
    $json = "";
    $conta =0;
    while($resultados2 = $cursor2->fetch_assoc()){
        if($conta==0){
            $json = $json.json_encode($resultados2);
        }else{
            $json = $json.",".json_encode($resultados2);
        }
        $conta++;
    }
}



?>
<body>
    <header id="encabezado">
        <img src="recursos/logoGenerico.png" alt="logoGenerico" width="50px" id="logoGenerico">
        <h1>
            E-Salud
        </h1>
        <input type="button" id="cerrar" value="Cerrar sesión" onClick="location.href='cerrar.php'">
    </header>
    <aside id="lateral" name="lateral">
        <nav id="menu">
            <h3><a href="PerfilUsuario.php">Perfil</a></h3>
            <h3><a href="Pastillero.php">Pastillero</a></h3>
            <h3><a href="SignosVitales.php">Signos Vitales</a></h3>
            <h3><a href="Resumen.php">Resumen</a></h3>
        </nav>
    </aside>
    <div>
        <h1>Información del Paciente</h1>
        <label id="nombre">Nombre: <?=$resultados["nombrePaciente"] ?></label>
        <br>
        <label id="ApellidoP">Apellido paterno: <?=$resultados["apellidoP"] ?></label>
        <br>
        <label id="Apellidom">Apellido materno: <?=$resultados["apellidoM"] ?></label>
        <br>
        <label id="GrupoS">Grupo Sanguíneo: <?=$resultados["grupoSanguineo"] ?></label>
        <br>
        <label id="Cronicos">Padecimientos Crónicos: <?=$resultados["padecimiento"] ?></label>
        <br>
        <label id="AlergiasNormie">Alergías Comunes: <?=$resultados["alergia"] ?></label>
        <br>
        <label id="AlergiasMedicamentos">Alergias a Medicamentos: <?=$resultados["alergiasM"] ?></label>
    </div>
    <div>
        <h2>Información de Medicamentos</h2>
        <?php
         
        ?>
        <table border="1">
                <thead>
                    <tr>
                        <th>Medicamento</th>
                        <th>Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    
                    <?php
                    $sql= "SELECT * FROM paciente_has_medicamento as A INNER JOIN medicamento 
                    as B ON B.idMedicamento = A.Medicamento_idMedicamento WHERE A.Paciente_idPaciente=".$_SESSION["id"];
            $cursor3 = $conn->query($sql);
            
            
            while($tupla = $cursor3->fetch_assoc() ){
                
                    echo '
                    <tr>
                        <td>'.$tupla["nombreMedicamento"].'</td>
                        <td>'.$tupla['horarioConsumo'].'</td>
                    </tr>
                    ';} 
                    $conn->close();?>
                </tbody>
            </table>
    </div>
    <div id="caja2">
        <h2>Información de Signos Vitales</h2>
        <label for="grafica">Mediciones de:</label>
            <div id="grafica" name="grafica"></div>
    </div>
    <script>
        new Morris.Line({
            element: 'grafica',

            data: [<?=$json?>],
  xkey: ['fechaSigno'],
  ykeys: ['cantidadMedida'],
  labels: ['Medido'],
  xLabels:['month']
        });
    </script>
</body>

</html>