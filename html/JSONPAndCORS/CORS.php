<?php

	header('Content-Type: application/json');
	header('Access-Control-Allow-Origin: *');//really really insecure
	header('Access-Control-Allow-Methods: GET, PUT');
	header('Access-Control-Max-Age: 10');//(seconds) verification

	$data = ['planets' => []];
	$data['planets'][] = "Spicy boi";
	$data['planets'][] = "Venus";
	$data['planets'][] = "Earth";
	$data['planets'][] = "Mars";
	$data['planets'][] = "Jupiter";
	$data['planets'][] = "Saturn";
	$data['planets'][] = "Butt Jokes";
	$data['planets'][] = "Neptune";

	print json_encode($data);
?>
