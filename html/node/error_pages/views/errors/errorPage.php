<?php include 'statusCode.php'?>
<?php $errorCode = http_response_code()?>
<!DOCTYPE html>
<html>
	<head>
		<title><?=$errorCode?> Error</title>
		<link rel="stylesheet" type="text/css" href="/error/CSS/errorPage.css" />
	</head>
	<body class="<?=($errorCode < 500) ? 'clientError' : 'serverError'?>">
		<h1><?=$errorCode?></h1>
		<h2><?=$statusCodes[(string)$errorCode]?></h2>
	</body>
</html>
