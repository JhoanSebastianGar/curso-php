<?php
require 'consts.php';
require 'functions.php';
require_once 'clases/NextMovie.php';

//$data=get_data(API_URL);

//$untilMessage=get_until_message($data["days_until"]);


$next_movie= NextMovie::fetch_and_create_movie(API_URL);
$next_movie_data=$next_movie->get_data();
render_template('head',["title" => $next_movie_data["title"]]);

render_template('main',array_merge(
	$next_movie_data,
	["untilMessage"=>$next_movie->get_until_message()]) );
render_template('styles');

 ?>




