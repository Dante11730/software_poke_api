<?php 

    function conexion(){

        $conexion=mysqli_connect('localhost','root','','pokemon_api');

        return $conexion;

    }


?>