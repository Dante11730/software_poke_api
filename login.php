<?php
    session_start();
    require_once('conexion.php');
    
    if(isset($_POST['boton'])) {
    
       $usuario = $_POST['usuario'];
       $clave = sha1($_POST['clave']); 
    
       $consulta = "select * from usuarios where email = '$usuario' AND password = '$clave'";
       $resultado = mysqli_query($conexion, $consulta) or die('No se consulto el usuario');
       $user = mysqli_fetch_array($resultado);
       
       if($user['id'] != "" && $user['estado']==1) {
          $_SESSION['usuario'] = $user['id'];
          header("location:poke.php");
       }else {
          header("location: index.php");
       }
       
    }else {
       header("location: index.php");
    }
 ?> 