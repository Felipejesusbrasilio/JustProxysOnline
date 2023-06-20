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

$curl = curl_init();

$url = 'https://proxylist.geonode.com/api/proxy-list?limit=500&page=1&sort_by=lastChecked&sort_type=desc';

curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);


$result = curl_exec($curl);

$converte = json_decode($result);

/*echo "<pre>";

var_dump($converte);

echo "</pre>";*/

foreach ($converte as $key => $value) {

for ($i=0; $i < 500 ; $i++){

if (isset($value[$i]->ip)){

$id = $value[$i]->ip;
$porta = json_decode($value[$i]->port);
$usuario = $value[$i]->_id;
$senha = $value[$i]->asn;

/*echo "<pre>";
echo 'IP:'.' '.$id;
echo "</br>";
echo 'PORTA:'.$porta;
echo "</pre>";*/


@$fp = fsockopen ("$id",$porta, $errno, $errstr,1);

if (!$fp){

echo "<p style='color:red;'>Offline: $id</p>";


$offline = "DELETE FROM proxys WHERE proxy = '$id'";

$inject_offline = mysqli_query($unir,$offline);

if (!$inject_offline):
    die('Error ao inserir dados no mysql'.mysqli_connect_error());
endif;


}else{

echo "<p style='color:green;'>Online: $id</p>";

$insert = "INSERT INTO proxys (proxy) VALUES ('$id')";

$inject = mysqli_query($unir,$insert);

if (!$inject):
    die('Error ao inserir dados no mysql'.mysqli_connect_error());
endif;

}

}

}

}



curl_close($curl);

?>

  
</div>    

</body>
</html>