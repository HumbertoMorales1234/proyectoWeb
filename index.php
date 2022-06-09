<?php
    session_start();
    if(isset($_SESSION['correo'])){
        header("location: PerfilUsuario.php");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Salud - Login</title>
    <style>
        body {
            background-color: rgb(126, 231, 231);
        }
        #caja{
            background-color: aliceblue;
            align-items: center;
            align-content: center;
            text-align: center;
            height: 120px;
            width: 200px;
            margin:5cm;
        
            
        }
        label{
            margin-top: 5px;
        }
        input{
            margin-top: 1px;
        }
        button{
            margin-top: 2px;
            margin-left: 3px;
        }
    </style>
</head>

<body>
    <header>

    </header>

    <div id="caja" name="caja">
        <form action="validaLogin.php" method="post">
            <label for="correo">Correo: </label>
            <input type="text" name="correo" id="correo" placeholder="Inserte su correo" required>
            <br>
            <label for="clave">Contraseña: </label>
            <input type="password" name="clave" id="clave" required placeholder="Introduce tu contraseña">
            <br>
            <button type="submit">Entrar</button>
        </form> <button>
            <a href="CrearPerfil.html">Crear Cuenta</a></button>
    </div>

</body>

</html>