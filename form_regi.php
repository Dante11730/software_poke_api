<!DOCTYPE html>
<html>
<?php require_once('partes/head.php'); ?>

<body id="inicios" class="let">

    <div class="container-form">

        <form class="formulario" action="bloques/usuarios/inserusu.php" method="POST" >
            <h2 class="create-account">Crea tu cuenta</h2>

            <input type="text" name="nombre" placeholder="Nombre" required="required">

            <input type="email" name="usuario" placeholder="Correo electronico" required="required">

            <input type="password" name="clave" placeholder="Contraseña" required="required">

            <input type="submit" id="regi" value="Registrarse">

            <p class="mt-3 mb-1 text-muted">&copy; 2022</p>

        </form>

        <div class="welcome-back">
            <div class="message">
                <h2>Bienvenido a Poke API</h2>
                <p> Si tienes cuenta aqui puedes</p> <br>
                <a class="a" id="sesion" href="index.php">Iniciar Sesión</a>

            </div>
        </div>
    </div>
  </div>
</body>
</html>