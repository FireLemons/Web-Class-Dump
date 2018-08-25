<?php

	$callback = empty($_GET['callback']) ? 'dataRecieved' : $_GET['callback'];

	header('Content-Type: application/json');
	$data = ['planets' => []];
	$data['planets'][] = "Spicy boi";
	$data['planets'][] = "Venus";
	$data['planets'][] = "Earth";
	$data['planets'][] = "Mars";
	$data['planets'][] = "Jupiter";
	$data['planets'][] = "Saturn";
	$data['planets'][] = "Butt Jokes";
	$data['planets'][] = "Neptune";

	print $callback . "(" . json_encode($data) . ");";
?>
