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
    <title>E-Salud - Signos vitales</title>
    <link rel="stylesheet" href="recursos/estilos.css">
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/raphael-min.js"></script>
    <script src="js/morris.min.js"></script>
    <link rel="stylesheet" href="recursos/morris.css">
    <style>
        form{
            margin: 10px;
        }
        #caja{
            float: left;
            margin: 10px;
            text-align: right;
        }
        #caja2{
            border: solid black 2px;
            width: 600px;
            height: 400px;
            text-align: center;
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
        <form action="conexion/insertSigno.php" method="post">
            <br>
            <label for="vital">Signo vital: </label>
            <select name="vital" id="vital">
                <option value="Presion">Presión arterial</option>
                <option value="Glucosa">Glucosa</option>
                <option value="Oxigeno">Oxígeno</option>
            </select>
            <br>
            <label for="valor">Valor: </label>
            <input type="text" id="valor" name="valor" required placeholder="Introduce el valor">
            <br>
            <button type="input">Guardar</button>
            <button><a href="PerfilUsuario.html">Cancelar</a></button>
        </form>
        <div id="caja2">
            <label for="gráfica">Mediciones de:</label>
            <div id="grafica"></div>
        </div>
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
  xLabels:'month'
});
        </script>
</body>
</html>