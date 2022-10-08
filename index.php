<!DOCTYPE html>
<html>
<?php require_once('partes/head.php'); ?>

<body id="inicios" class="let">
    <div class="container-form ">
        <form class="formulario" action="login.php" method="post" >
            <h2 class="create-account">Iniciar Sesión</h2>

          <input type="email" id="usuario" name="usuario" placeholder="Correo electronico "required="required" autofocus>

          <input type="password" name="clave" id="clave" placeholder="Contraseña" required>

          <input type="submit" id="regi" name="boton" value="Iniciar Sesion">

             <br><br>

            <p class="mt-3 mb-1 text-muted">&copy; 2022</p>

        </form>

        <div class="welcome-back">
            <div class="message">
                <h2>Bienvenido a Poke API</h2>
                <p>¿No tienes cuenta? </p>
          <br>
                <a class="a" id="sesion" href="form_regi.php">Registrate</a>
            </div>
        </div>
    </div>
</body>
</html>
