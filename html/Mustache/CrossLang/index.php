<?php
	require 'vendor/Old/mustache.php-master/src/Mustache/Autoloader.php';
	Mustache_Autoloader::register();

	$template = file_get_contents('templates/alerts.mustache');
	$hash = array(
		'message' => 'ALERT',
		'title' => 'ERROR!',
		'close' => true,
		'type' => 'danger');

	$hash0 = array(
		'message' => 'CONSUME',
		'title' => 'success.',
		'close' => true,
		'type' => 'success'
	);

	$hash2 = array(
		'alerts' => array($hash, $hash0)
	);
	//$template = "Hello, {{planet}}!";
	//$hash = array('planet' => 'World');//also called the "view"

	$m = new Mustache_Engine;
?>

<!DOCTYPE html> 
<!-- Created by Professor Wergeles for CS4830 at the University of Missouri -->
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ Mustache }} Across Languages</title>
        
        <link 
        	href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
        	rel="stylesheet" 
        	integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" 
        	crossorigin="anonymous">
        
        <style>
            #wrapper {
                width: 600px; 
                margin: 100px auto; 
            }
        </style>
        
        <script
            src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
            crossorigin="anonymous"></script>
        
        <script 
        	src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" 
        	integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" 
        	crossorigin="anonymous"></script>

		<script src="js/mustache.js"></script>
		<script>
			$(function(){
				var template = $("#alertsTemplate").html();

				var hash = {
					alerts:{
						title: 'Info.',
						message: 'oooh heaven is a place on earth',
						close: true,
						type: 'info'
					}
				};

				var output = Mustache.render(template, hash);
				$("#wrapper").append(output);
			});
		</script> 
    </head>
    <body>
		<script id="alertsTemplate" type='text/mustache-template'><!--set to unknown type so script doesn't run-->
			<?php include('templates/alerts.mustache'); ?>
		</script>
        <div id="wrapper">
			<?php
				echo $m->render($template, $hash2);
			?>
        </div>
    </body>    
</html>
