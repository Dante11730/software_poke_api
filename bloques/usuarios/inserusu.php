<?php 
    include_once 'conexion.php';
    $con=conexion();

    #CAPTURA DE LOS DATOS

    $nombre=$_POST['nombre'];
    $usuario=$_POST['usuario'];
    $clave= sha1($_POST['clave']);    

        #consulta
    $sql="INSERT INTO usuarios  (nombre, email, password) VALUES ('$nombre','$usuario','$clave')";       

     $query=mysqli_query($con,$sql);
     if($query){
         header('refresh:0;url=../../index.php?registrado');
     }else{
         header('refresh:0;url=../../index.php?error');
     }
?>

