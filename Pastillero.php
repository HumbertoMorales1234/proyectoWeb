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

        #caja2 {
            border: solid black 2px;
            width: 400px;
            height: 400px;
            text-align: center;
            display: grid;
            grid-template-columns: 12% 12% 12% 12% 12% 12% 12% 12%;
            grid-template-areas: 'horario dia1 dia2 dia3 dia4 dia5 dia6 dia7' 
                                  'hora1  hueco hueco hueco hueco hueco hueco hueco'
                                  'hora2  hueco hueco hueco hueco hueco hueco hueco'
                                  'hora3  hueco hueco hueco hueco hueco hueco hueco'
                                  'hora4  hueco hueco hueco hueco hueco hueco hueco'
                                  'hora5  hueco hueco hueco hueco hueco hueco hueco'
                                  'hora6  hueco hueco hueco hueco hueco hueco hueco'
                                  'hora7  hueco hueco hueco hueco hueco hueco hueco'
                                  'hora8  hueco hueco hueco hueco hueco hueco hueco'
                                  'hora9  hueco hueco hueco hueco hueco hueco hueco';
        }
        #horario{grid-area: horario;}
        #dia1{grid-area: dia1;}
        #dia2{grid-area: dia2;}
        #dia3{grid-area: dia3;}
        #dia4{grid-area: dia4;}
        #dia5{grid-area: dia5;}
        #dia6{grid-area: dia6;}
        #dia7{grid-area: dia7;}
        #hora1{grid-area: hora1;}
        #hora2{grid-area: hora2;}
        #hora3{grid-area: hora3;}
        #hora4{grid-area: hora4;}
        #hora5{grid-area: hora5;}
        #hora6{grid-area: hora6;}
        #hora7{grid-area: hora7;}
        #hora8{grid-area: hora8;}
        #hora9{grid-area: hora9;}
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
        <form action="conexion/insertPastillas.php" method="post">
            <br>
            <label for="medicina">Medicina: </label>
            <input type="text" id="medicina" name="medicina" required placeholder="Introduce el nombre de la medicina">
            <br>
            <label for="hora">Hora: </label>
            <input type="text" id="hora" name="hora" required placeholder="Introduce la hora de medicación">
            <br>
            <button type="input">Guardar</button>
            <button><a href="PerfilUsuario.php">Cancelar</a></button>
        </form>

        <div>
            <label for="atomar">Medicamentos listados</label>
            <br>
                <input type="checkbox" name="medicamentosborrar1" id="medicamentosborrar1">Med1
                <input type="checkbox" name="medicamentosborrar2" id="medicamentosborrar2">Med2
                <input type="checkbox" name="medicamentosborrar3" id="medicamentosborrar3">Med3
                <button id="eliminar">Eliminar</button>
        </div>

        <div id="caja2">
            <div id="horario">Horario</div>
            <div id="dia1">Lun</div>
            <div id="dia2">Mar</div>
            <div id="dia3">Miér</div>
            <div id="dia4">Jue</div>
            <div id="dia5">Vie</div>
            <div id="dia6">Sab</div>
            <div id="dia7">Dom</div>
            <div id="hora1">8:00</div>
            <div id="hora2">9:00</div>
            <div id="hora3">10:00</div>
            <div id="hora4">11:00</div>
            <div id="hora5">12:00</div>
            <div id="hora6">13:00</div>
            <div id="hora7">14:00</div>
            <div id="hora8">15:00</div>
            <div id="hora9">16:00</div>
        </div>
    </div>
</body>

</html>