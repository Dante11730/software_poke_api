<?xml version='1.0' encoding='UTF-8' ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"
      xmlns:h="http://xmlns.jcp.org/jsf/html">

      <?php require_once('conexion.php') ?>
      <?php require_once('bloqueo.php') ?>  
      <?php require_once('partes/head.php') ?>  

    <h:head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>

        <link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon" />
    </h:head>
    <style>

        #pokemon{
            margin: 0px;
            padding: 0px;
        }
        .center {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: #A6EFEC;
            border-radius: 10px;
        }
        .card {
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            transition: 0.3s;
            width: 50%;
        }

        .container {
            padding: 2px 16px;
        }

    </style>
    <body  id="ini_hab">
    <div>
    <br><br><h2>Habilidades</h2><br>
        <div  id="pokemon">
        <a class="habili"  href="poke.php" >Pokemones</a>
        </div>
    </div>
    </body>
    <script>

        var API_URL = "https://pokeapi.co/api/v2/pokemon/";
        async function verHabilidades() {
            var URLactual = window.location;
            const href = URLactual.href;
            var arrayDeCadenas = href.split('=');
            
            arrayDeCadenas = arrayDeCadenas[1].match(/[a-z]+|[^a-z]+/gi).join(" ").replace(/\s+/g, " ");

            var id = arrayDeCadenas.split(' ');
            API_URL = API_URL + id[1];
            console.log(API_URL);
            const res = await fetch(API_URL);
            const data = await res.json();
            console.log(data);
            if (res.status === 200) {
                const tabla = document.getElementById("pokemon");
                const divCard = document.createElement("div");
                const divCont = document.createElement("div");
                const img = document.createElement("img");
                divCard.className = 'card center';
                divCont.className = 'container';
                divCont.style = 'text-align: center;';
                img.src = data.sprites.other.dream_world.front_default;
                console.log(data.sprites.other.dream_world.front_default);
                img.style = 'width:150px; height:150px;';
                divCard.style = 'float: left; padding: 30px; margin:20px; text-align: center; background-color: #00ca91';

                data.abilities.forEach(poke => {
                    const p = document.createElement("p");
                    const text = document.createTextNode(poke.ability.name);

                    p.appendChild(text);
                    divCont.appendChild(p);
                });


                divCard.appendChild(img);
                divCard.appendChild(divCont);
                tabla.appendChild(divCard);
                

            }
        }

        async function verImagen(img) {
            const res = await fetch(url);
            const data = await res.json();
//            console.log(data);
            if (res.status === 200) {
                const img = document.getElementById(num);
                img.src = data.sprites.other.dream_world.front_default;
                cambiarColor(data.types[0].type.name, card);

            }
        }

        verHabilidades();
    </script>
</html>
