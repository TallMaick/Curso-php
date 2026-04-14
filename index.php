
<?php
/* para esto de forma general se recomienda usar la logica siempre lo mas separada posible de lo renderizado en php*/
$name = "Jorge";
echo "Hello" . $name . ",";
$edad = 30;
$isold = 30;

$ouput = "Hola como sigues \"$name\" y tu edad es $edad";
$ouput .= " y esto es una prueba de concatenacion con atajo";
/*
defnicion de variables constantes de forma global
*/
define("PI", 3.1416);
/*
definicion de constantes de forma local, las constantes no funcionan en tiempo de ejecucion, es decir no pueden ser definidas dentro de funciones o bloques de codigo, por lo tanto se definen de forma global
*/

/* esto es una forma de condicionar para hacer cosas cortas de forma logica */
if ($isold >= 40) {
    echo "Eres viejo CHAMO";
} else {
    echo "Eres joven";
}

/*este es un operador ternario */
$ouputDos = $isold >= 40 ? true : false;

/* esta es una mejor forma de usar un switch y es elegante por que al mismo tiempo es posible agregar los valores de return del match a una avariable */


const carrera = "Ingenieria en Informatica";

$outputTres = match (true) {
    $edad >= 40 => "<h3>eres un viejo parcero</h3>",
    $edad >= 18 && $edad < 40 => "<h2>eres un adulto</h2> y su carrera es " . carrera,
    default => "<h2>eres un niño</h2>"
};
//en este apartado tendriamos la declarcion de arreglos ya llenados manualmente, en estos se peude ingresar el valor sin necesdiad de indice y lo agregaria al final o tambien se peude indicar el indice sin problema ademas son arrays que pueden tener multiples datos integrados en ellos. 
$lenguajes = ["JavaScript", "PHP", "Python", 234232];
$lenguajes[] = "java";

$lenguas = [];

// for ($i=0; $i <=5 ; $i++) {
//     echo"ingrese el nombre de la lengua $i: "; 
//     lenguas[]="lengua $i";
// }

//podremos usar otro tipo de array que podria ser una expecie de diccionario que nos permite poder establecer una clave y un valor para cada elemento que deseamos asignar al array
$lenguas = [
    "ES" => "Español",
    "EN" => "Ingles",
    "FR" => "Frances"
];

//aprenderemos como llamar una api sencilla y poder obtener sus datso para poder despues trabajarlos esta seria la forma mas segura de hacerlo para poder hacer despues los demas metodo put, get, delete, post.

//tambien contamos con la siguiente forma que se hace de forma que peude ser mas rapida pero no estan seguro y solo se permite para el metodo get.
// $datos= file_get_contents("https://whenisthenextmcufilm.com/api");

const API_URL = "https://whenisthenextmcufilm.com/api";
// inicializamos una sesion de curl
$curl = curl_init(API_URL);
//aqui indicamos que queremos obtener el resultado de la peticion en una variable y no mostrarlo directamente
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
// ejecutaremos la peticion y guardaremos el resultado en una variable
$response = curl_exec($curl);
$data = json_decode($response, true);
curl_close($curl);
// var_dump($data);
?>

<main>
    <div>

        <h1><?= $data['following_production']['title'] ?></h1>
            
        
        <img src=<?= $data['following_production']['poster_url'] ?> alt="">
        <p><?= $data['following_production']['overview'] ?></p>

    </div>
</main>

<!-- esto lo vamos a usar para poder usar condiciones pero a su vez permitir el desarrolllo de codigo dentro de las condiciones -->

<?php if ($ouputDos) : ?>
    <p>Eres viejo</p>
<?php else : ?>
    <p>Eres un niño</p>
<?php endif; ?>



<h1>
    <?=
    "bienvenido a php Hola como sigues " . $name . " y esto es una prueba de echo con atajo " . is_int($name);
    carrera
    ?>
    <?=
    $ouput
    ?>
</h1>

<h2><?= $outputTres ?></h2>
<h2><?= $lenguajes[1] ?></h2>

<div>
    <?php foreach ($lenguajes as $key => $lenguaje): ?>
        <p><?= $key + 1 . ": " . $lenguaje ?></p>
    <?php endforeach; ?>
</div>

<div #divdos>
    <?php foreach ($lenguas as $key => $value) : ?>
        <p><?= "<b>$key</b>" . " es el lenguaje conocido como: " . $value ?></p>
    <?php endforeach; ?>
</div>

<!-- esta es una forma de poder mostrar datos de la appi de forma general en nuestra pagina completa -->
<pre>
 <?php
    var_dump($data);
    ?>
</pre>
<!-- esta es una forma a mi concideracion muchoa mas ordenada apra poder mostrar datos de las varaibles de la api -->
<pre>
 <?php
    print_r($data);
    ?>
</pre>

<!-- estilos minimos para nuestro recuadro de la pelicula -->
<style>
    #divdos {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    div {
        display: flex;
        flex-direction: column;
        gap: 10px;
        border-radius: 10px ;
        width: 400px;
        align-items: center;
        background-color: #44DB7E;
        color: white;
    }

    p{
        text-align: center;
    }

    img {
        width: 300px;
        height: 300px;
        border-radius: 7px;
    }

    main {
        display: flex;
        justify-content: center;
        margin-top: 20px;
        
    }
</style>