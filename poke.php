<?xml version='1.0' encoding='UTF-8' ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"
      xmlns:h="http://xmlns.jcp.org/jsf/html">

      <?php require_once('conexion.php') ?>
      <?php require_once('bloqueo.php') ?>  
      <?php require_once('partes/head.php') ?>  

    <h:head>
    <title>Poke API</title>
        <link rel="icon" href="logo.png">       
        <link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon" />
    </h:head>

    <style>

        #pokemon{
            margin: 0px;
            padding: 0px;
        }
        .card {
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            transition: 0.3s;
            width: 11%;
            border-radius: 20px;

        }

        .card:hover {
            box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
            background-color: #0CABA8;
            color: #fff;
        }

        .container {
            padding: 2px 16px;
        }

    </style>

    <body id="ini_poke">
        <h1>Pokemones</h1>
        <div id="pokemon" style="overflow: hidden; padding: 0px 0px 0px 35px">
        </div>
    </body>

    <script>

        const API_URL = "https://pokeapi.co/api/v2/pokemon/";

        async function verPokemones() {
            let num = 0;
            const res = await fetch(API_URL);
            const data = await res.json();
//            console.log(data);
            if (res.status === 200) {
                data.results.forEach(poke => {
                    num++;
                    const tabla = document.getElementById("pokemon");
                    const divCard = document.createElement("div");
                    const img = document.createElement("img");
                    const divCont = document.createElement("div");
                    const a = document.createElement("a");

                    const text = document.createTextNode(poke.name);

                    divCard.className = 'card row';
                    divCont.className = 'container';
                    divCont.style = 'text-align: center;'
                    divCont.id = 'cont' + num;
                    img.style = 'width:100px; height:100px; color: #000';
                    img.id = 'img' + num;
                    divCard.id = 'card' + num;
                    a.setAttribute("target", "_blank");
                    a.setAttribute("href", "pokemon_1.xhtml");
                    a.setAttribute("onclick", "redireccionar()");
                    a.style = 'text-decoration:none; color: #000; font-weight: bold';

                    verImagen(poke.url, img.id, divCard.id, divCont.id);

                    a.appendChild(text);

                    divCont.appendChild(a);
                    divCard.appendChild(img);
                    divCard.appendChild(divCont);
                    tabla.appendChild(divCard);

                });
            }
        }

        function redireccionar() {
            var test = document.querySelectorAll('.card');
            console.log(test);
            test.forEach(function (val) {
                val.addEventListener("click", function (){
                    window.location = 'poke_habilidades.php?pokemon=' + this.id;
                    console.log(this.id);
                });
            });

        }
        
        async function verImagen(url, num, card, cont) {
            const res = await fetch(url);
            const data = await res.json();
//            console.log(data);
            if (res.status === 200) {
                const img = document.getElementById(num);
                img.src = data.sprites.other.dream_world.front_default;
                cambiarColor(data.types[0].type.name, card);

            }
        }

        function cambiarColor(tipo, card) {
            if (tipo === 'grass') {
                const cardPoke = document.getElementById(card);
                cardPoke.style = 'float: left; padding: 30px; margin:20px; text-align: center; background-color: #00ca91';
            }
            if (tipo === 'fire') {
                const cardPoke = document.getElementById(card);
                cardPoke.style = 'float: left; padding: 30px; margin:20px; text-align: center; background-color: #e95c4d';
            }
            if (tipo === 'water') {
                const cardPoke = document.getElementById(card);
                cardPoke.style = 'float: left; padding: 30px; margin:20px; text-align: center; background-color: #A6EFEC';
            }
            if (tipo === 'bug') {
                const cardPoke = document.getElementById(card);
                cardPoke.style = 'float: left; padding: 30px; margin:20px; text-align: center; background-color: #aedf78';
            }
            if (tipo === 'normal') {
                const cardPoke = document.getElementById(card);
                cardPoke.style = 'float: left; padding: 30px; margin:20px; text-align: center; background-color: #a5a5a5';
            }

        }

        verPokemones();
    </script>
    <br>
    <div style="text-align: right" >
<a class="submit" href="salir.php" >Cerrar sesión</a><br>
    </div>
</html>