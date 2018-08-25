<?php
	$dinoID = empty($_GET['dinoID']) ? 'index' : strtolower($_GET['dinoID']);
	$appData = json_decode(file_get_contents('appData.json'), true);
	$dino = empty($appData['dinosaurs'][$dinoID]) ? null : $appData['dinosaurs'][$dinoID];
?>

<!DOCTYPE html>
<html>
	<head>
		<Title>Dinos App</Title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" >
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		<!-- JQuery -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<!-- Popper -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
			integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
			crossorigin="anonymous"></script>
		<!-- Bootstrap -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
			integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
			crossorigin="anonymous"></script>

		<style>
			body {
				text-align: center;
			}
			p, .list-group{
				width: 450px;
				margin: 0 auto;
			}
			img {
				margin-top: 15px;
				margin-bottom: 100px;
				width: 450px;
			}
		</style>
	</head>
	<body>
		 <?php if($dinoID == 'index'){ ?>
			<h1> <?php print $appData['appTitle']; ?> </h1>
			<ul class="list-group">
				<?php foreach($appData['dinosaurs'] as $k => $v){ ?>
					<li class="list-group-item">
						<!--<a href="<?=""/*$k*/?> <?=$v['name']?>">-->
						<a href="<?='index.php?dinoID=' . $k?>"><?=$k?></a>
					</li>
				<?php } ?>
			</ul>
		<?php } else { ?>
			<h1> <?=$dino['name']?> </h1>
			<p> <?=$dino['desc']?> </p>
			<img src="<?=$appData['imageBasePath'] . $dino['img']?>">
		<?php } ?>
	</body>
</html>
