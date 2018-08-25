<?php

	$count = empty($_COOKIE['count']) ? null : $_COOKIE['count'];
	
	(!$count) ? setCookie('count', 1) : setCookie('count', $count + 1);

	//usually set to *
	header('Access-Control-Allow-Origin: null');//null allows cookies when connecting to server from user's machine
	header('Allow-Control-Allow-Credentials: true');
	header('Content-Type: application/json');

	$data = ['planets' => []];
	$data['planets'][] = 'Mercury';
	$data['planets'][] = 'Venus';
	$data['planets'][] = 'Earth';
	$data['planets'][] = 'Mars';
	$data['planets'][] = 'Jupiter';
	$data['planets'][] = 'Saturn';
	$data['planets'][] = 'Uranus';
	$data['planets'][] = 'Neptune';

	print json_encode($data);
?>
