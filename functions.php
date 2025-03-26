<?php
#Iniciar una nueva sesion con curl;ch =cURL handle

//INDICAR que queremos recibir peticion pero no mostrarla en pantalla
/*
$ch=curl_init(API_URL);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
#EJECUTAMOS LA PETICION Y GUARDAMOS EL RESULTADO
$result=curl_exec($ch);
$data=json_decode($result,true);
curl_close($ch);

*/

function render_template(string $template,array $data =[])
{
	extract($data);
 require "templates/$template.php";
}


function get_data(string $url):array
{
	$result=file_get_contents($url);//SI SOLO QUIERES HACER UN GET DE API;
	$data=json_decode($result,true);
	return $data;
}

function get_until_message(int $days){
	return match (true) {
		$days===0 => "Hoy se estrena",
		$days===1 => "Mañana se estrena",
		$days<1 => "En esta semana se estrena",
		$days<30 => "En esta mes se estrena",
		default => " se estrena ".$days,
	};
}
?>