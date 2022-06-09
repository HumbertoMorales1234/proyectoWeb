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
    <title>E-Salud - Perfil de usuario</title>
    <link rel="stylesheet" href="recursos/estilos.css">
    <style>
        form{
            float: left;
            margin: 10px;
        }
        #caja{
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
    <div id="caja">
    <form action="" method="post">
        <br>
        <label for="nombre">Nombre: </label>
        <input type="text" id="nombre" required placeholder="Introduce tu nombre">
        <br>
        <label for="aPaterno">Apellido paterno: </label>
        <input type="text" id="aPaterno" required placeholder="Introduce tu apellido paterno">
        <br>
        <label for="aMaterno">Apellido materno: </label>
        <input type="text" id="aMaterno" required placeholder="Introduce tu apellido materno">
        <br>
        <label for="text" >Correo: </label>
        <input type="mail" required placeholder="Introduce tu correo">
        <br>
        <label for="alergias" >Alergias: </label>
        <input type="text" id="alergias" placeholder="Confirma la contraseña">
        <br>
        <label for="cronicos">Padecimientos crónicos: </label>
        <input type="text" id="aMaterno" required placeholder="Introduce tus padecimientos">
        <br>
        <label for="aergiasM" >Alergias a medicamentos: </label>
        <input type="text" id="alergiasM" placeholder="Confirma la contraseña">
        <br>
        <label for="sangre" >Tipo de sangre: </label>
        <input type="text" id="sangre" placeholder="Confirma la contraseña">
        <br>
        <label for="contraseña" >Contraseña: </label>
        <input type="password" id="contraseña" required placeholder="Introduce tu contraseña">
        <br>
        <label for="confirmar" >Confirmar contraseña: </label>
        <input type="password" id="confirmar" required placeholder="Confirma la contraseña">
        <br>
        <button>Guardar cambios</button>
        <button><a href="PerfilUsuario.html">Cancelar</a></button>
    </form>
    </div>  
</body>
</html>