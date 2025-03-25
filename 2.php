<?php
const API_URL="https://whenisthenextmcufilm.com/api";
#Iniciar una nueva sesion con curl;ch =cURL handle
$ch=curl_init(API_URL);
//INDICAR que queremos recibir peticion pero no mostrarla en pantalla
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
#EJECUTAMOS LA PETICION Y GUARDAMOS EL RESULTADO
$result=curl_exec($ch);
$data=json_decode($result,true);
curl_close($ch);


//$result=file_get_contents(API_URL)//SI SOLO QUIERES HACER UN GET DE API;
 ?>
<!DOCTYPE html>
<html>
 <head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css">
	<title>Proxima pelicula de marvel</title>
</head>

<main>
	<pre style="font-size: 8px; overflow: scroll; height: 250px;">
		<?php var_dump($data); ?>
	</pre>
	<section>
		<img src="<?=$data["poster_url"]; ?>" width="200" alt="POSTER DE <?=$data["title"]; ?>">
	</section>
	<hgroup>
		<h2><?=$data["title"]; ?> Se estrena en <?=$data["days_until"]; ?></h2>
		<p>fecha de estreno <?=$data["release_date"]; ?></p>
		<p>la siguiente es <?=$data["following_production"]["title"]; ?></p>
	</hgroup>
</main>

 <style>
    :root{
        color-scheme: light dark;
    }
    body{
        display: grid;
        place-content: center;
    }
    section{
    	display:flex;
    	justify-content: center;
    	text-align:center;
    }
    hgroup{
    	display:flex;
    	flex-direction: column;
    	justify-content:center;
    	text-align: center;
    }
    img {
    	margin: 0 auto;

    }
</style>
</html>

