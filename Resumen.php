<?php
session_start();

if(!isset($_SESSION["usuario"])){
    echo "
    <script>
        alert('Ingresa usuario y contraseña');
        window.location = 'index.php';
    </script>"
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

<body>
    <header id="encabezado">
        <img src="recursos/logoGenerico.png" alt="logoGenerico" width="50px" id="logoGenerico">
        <h1>
            E-Salud
        </h1>
        <input type="button" id="cerrar" value="Cerrar sesión" onClick="location.href='index.html'">
    </header>
    <aside id="lateral" name="lateral">
        <nav id="menu">
            <h3><a href="PerfilUsuario.html">Perfil</a></h3>
            <h3><a href="Pastillero.html">Pastillero</a></h3>
            <h3><a href="SignosVitales.html">Signos Vitales</a></h3>
            <h3><a href="Resumen.html">Resumen</a></h3>
        </nav>
    </aside>
    <div>
        <h1>Información del Paciente</h1>
        <label id="nombre">Nombre: </label>
        <br>
        <label id="ApellidoP">Apellido paterno: </label>
        <br>
        <label id="Apellidom">Apellido materno: </label>
        <br>
        <label id="GrupoS">Grupo Sanguíneo: </label>
        <br>
        <label id="Cronicos">Padecimientos Crónicos: </label>
        <br>
        <label id="AlergiasNormie">Alergías Comunes: </label>
        <br>
        <label id="AlergiasMedicamentos">Alergias a Medicamentos: </label>
    </div>
    <div>
        <h2>Información de Medicamentos</h2>
        <label id="med1">Medicamento 1: &nbsp;&nbsp;&nbsp;&nbsp;</label>
        <label id="hora1">Hora de consumo:</label>
        <br>
        <label id="med2">Medicamento 2:&nbsp;&nbsp;&nbsp;&nbsp;</label>
        <label id="hora2">Hora de consumo:</label>
    </div>
    <div id="caja2">
        <h2>Información de Signos Vitales</h2>
        <label for="grafica">Mediciones de:</label>
            <div id="grafica" name="grafica"></div>
    </div>
    <script>
        new Morris.Line({
            element: 'grafica',

            data: [
                { mes: '2022-01', value: 32 },
                { mes: '2022-02', value: 90 },
                { mes: '2022-03', value: 46.3 },
                { mes: '2022-04', value: 50 },
                { mes: '2022-05', value: 85.23 }
            ],
            xkey: 'mes',
            ykeys: ['value'],
            labels: ['Valor'],
            xLabels: 'month'
        });
    </script>
</body>

</html>