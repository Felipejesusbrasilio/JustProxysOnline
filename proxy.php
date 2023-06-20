<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="css/mod.css">
    <link rel="stylesheet" type="text/css" href="css/style_v36.css">
    <link rel="stylesheet" href="css/slider_v5.css">
    <link rel="stylesheet" href="css/carrosel_v11.css">
    <title>Bot ganhe dinheiro com anuncios</title>
</head>

<body>

<div class="container">


<?php

include_once('conexao.php');


$count = "SELECT COUNT(*) AS id FROM proxys";

$contar = mysqli_query($unir,$count);

foreach ($contar as $key => $value) {

    echo ' '.' '."Numeros de proxys onlines:".' '.$value['id']."</br>";

}


echo "<form action='' method='POST'>";

echo "<button type='submit' name='limpar'>Limpar proxys existents</button>";

echo "</form>";


echo "</br>";
echo "</br>";


echo "<form action='' method='POST'>";

echo "<button type='submit' name='enviar'>Gerar novas proxys onlines</button>";

echo "</form>";



if (isset($_POST['limpar'])) {

include_once('conexao.php');

$buscar = "TRUNCATE TABLE proxys";

$inject = mysqli_query($unir,$buscar);

if (!$inject):
    die('Error ao limpar tabela mysql'.mysqli_connect_error());
endif;

header('location:proxy.php');

}


if (isset($_POST['enviar'])) {

include_once('conexao.php');

$buscar = "SELECT * FROM proxys";

$inject = mysqli_query($unir,$buscar);

if (!$inject):
    die('Error ao gerar as proxys'.mysqli_connect_error());
endif;

echo "</br>";

foreach ($inject as $key => $value) {

echo $value['proxy']."</br>";

}

}


?>

  
</div>    

</body>
</html>