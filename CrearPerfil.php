
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Salud - Registro</title>
    <link rel="stylesheet" href="recursos/estilos.css">
    <style>
        input {
            margin: 4px; 
        }
        #caja{
            width: 50%;
            text-align: right;
        }
        input{
            width: 400px;
        }
        #enviar{
            width: auto;
        }
    </style>
</head>

<body>
    <header id="encabezado">
        <img src="recursos/logoGenerico.png" alt="logoGenerico" width="50px" id="logoGenerico">
        <h1>
            E-Salud
        </h1>
    </header>
    <div id="caja">
        <form action="conexion/insertUsuario.php" method="post">
            <br>
            <label for="nombre">Nombre: </label>
            <input type="text" id="nombre" name="nombre" required placeholder="Introduce tu nombre">
            <br>
            <label for="aPaterno">Apellido paterno: </label>
            <input type="text" id="aPaterno" name="aPaterno" required placeholder="Introduce tu apellido paterno">
            <br>
            <label for="aMaterno">Apellido materno: </label>
            <input type="text" id="aMaterno" name="aMaterno" required placeholder="Introduce tu apellido materno">
            <br>
            <label for="correo" >Correo: </label>
            <input type="mail" id="correo" name="correo" required placeholder="Introduce tu correo">
            <br>
            <label for="contraseña" >Contraseña: </label>
            <input type="password" id="contraseña" name="contraseña" required placeholder="Introduce tu contraseña">
            <br>
            <label for="confirmar" >Confirmar contraseña: </label>
            <input type="password" id="confirmar" name="confirmar" required placeholder="Confirma la contraseña">
            <br>
            <button type="submit">Guardar</button>
            <button><a href="index.php">Regresar</a></button>
        </form>
    </div>
</body>

</html>