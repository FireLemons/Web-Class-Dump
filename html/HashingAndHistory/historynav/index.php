<?php
	$path = empty($_SERVER['REQUEST_URI']) ? '' : explode("/", $_SERVER['REQUEST_URI']);
	$page = (count($path) > 3) ? $path[3] : "";
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Home</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/cosmo/bootstrap.min.css" rel="stylesheet" integrity="sha384-h21C2fcDk/eFsW9sC9h0dhokq5pDinLNklTKoxIZRUn3+hvmgQSffLLQ4G4l2eEr" crossorigin="anonymous">

		<style>
			@media(min-width:768px){
				.container{
					max-width:730px;
				}
			}

			.header{
				margin-top:30px;
				border-bottom: 1px solid #EEE;
			}
			.header h2{
				margin-top:0;
				line-height:40px;
			}
			#stage{
				padding:15px;
			}
		</style>

		<noscript>
			<style>
				label{
					padding: 10px 15px;
					color: #2780e3;
					cursor: pointer;
				}
				label:hover{
					background-color: #e6e6e6;
				}
				.hide, input[type=radio]{
					display: none;
				}
				input[type=radio]:checked + div > .title, input[type=radio]:checked + div > .text{
					display: block !important;
				}
			</style>
		</noscript>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<!-- jQuery ScrollTo Plugin -->
		<script src="//balupton.github.io/jquery-scrollto/lib/jquery-scrollto.js"></script>

		<!-- History.js -->
		<script src="//browserstate.github.io/history.js/scripts/bundled/html4+html5/jquery.history.js"></script>

		<script>
			function stageContent(content){
				$("#stage").html(content);
			}

			function evaluatePath(path){
				var request = path.split("/").pop();
				$("#nav").children().removeAttr("class");
				if(request == "about"){
					$.get("ajaxResources/about.html", stageContent);
					$("title").html("About");
					$("#navAbout").addClass("active");
				} else if(request == "contact") {	
					$.get("ajaxResources/contact.html", stageContent);
					$("title").html("Contact");
					$("#navContact").addClass("active");
				} else {
					$.get("ajaxResources/home.html", stageContent);
					$("title").html("Home");
					$("#navHome").addClass("active");
				}
			}

			$(function(){
				evaluatePath(location.pathname);
				
				$("nav[role=navigation] a").click(function(e){
					e.preventDefault();

					var request = $(this).attr("href");
					History.pushState(null/*data*/, null/*title*/, request/*url*/);
					evaluatePath(request);
				});

				//back action listener

				$(window).on("popstate", function(){
					evaluatePath(location.pathname);
				});
			});
		</script>
	</head>
	<body>
		<div class="container">
			<div class="header clearfix">
				<nav role="navigation">
					<ul id="nav" class="nav nav-pills pull-right">
						<li id="navHome" class="hidden"><a href="./">Home</a></li>
						<li id="navAbout" class="hidden"><a href="./about">About</a></li>
						<li id="navContact" class="hidden"><a href="./contact">Contact</a></li>
					</ul>
					<noscript>
						<ul id="nav" class="nav nav-pills pull-right">
							<li id="navHome"><label for="home">Home</label></a></li>
							<li id="navAbout"><label for="about">About</label></a></li>
							<li id="navContact"><label for="contact">Contact</label></a></li>
						</ul>
					</noscript>
				</nav>
				<h2 class="text-muted">History Navigation</h2>
				<div id="stage">
					<noscript>
						<input type="radio" name="displayControl" id="about" <?= (strcmp($page, "about") == 0) ? "checked" : "" ?>>
						<div>
							<h3 class="hide title">About Us</h3>
							<p class="hide text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In at quam vel metus suscipit consequat eu a nisl. Donec nec sapien vitae orci vulputate ornare et ut nulla. Vestibulum sit amet eros mauris. Mauris nisi metus, dictum in blandit sed, egestas ut tellus. Quisque non malesuada tellus. Integer elit libero, venenatis vitae condimentum nec, tristique quis dolor. Nulla dapibus, enim et pulvinar iaculis, nisl leo posuere risus, eu sodales ex velit nec enim. Maecenas auctor sapien vitae arcu consectetur semper. Sed malesuada accumsan pellentesque. Morbi commodo elit sed scelerisque venenatis.</p>
							<p class="hide text">Quisque hendrerit rutrum nunc, sed interdum eros auctor vitae. Aenean tristique erat velit, at iaculis magna egestas sit amet. Phasellus nec bibendum ex, sit amet congue risus. Integer arcu nulla, tempus vel nulla id, semper rhoncus magna. Cras sapien nisl, pretium eu tristique ac, aliquet suscipit ipsum. Fusce placerat lobortis orci, condimentum vestibulum odio pulvinar mollis. Sed lacinia nisi et consectetur iaculis. Curabitur ex magna, vestibulum at posuere ut, ultrices a nulla. Pellentesque varius mattis metus.</p>
						</div>

						<input type="radio" name="displayControl" id="contact" <?= (strcmp($page, "contact") == 0) ? "checked" : "" ?>>
						<div>
							<h3 class="hide title">Send Us a Message</h3>
							<p class="hide text">Etiam porttitor faucibus odio, vitae auctor turpis posuere eget: <a href="mailto:loremipsum.xyz">loremipsum.xyz</a>. Etiam vel risus a nibh malesuada viverra quis non sem. Pellentesque pellentesque nisl non dolor ultricies, nec aliquet ligula sagittis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse maximus, nunc quis rutrum sagittis, nulla dolor vulputate arcu, sit amet vestibulum augue augue et felis. Phasellus eleifend consequat accumsan. Pellentesque at risus elit. Mauris tincidunt nisi vel facilisis laoreet. Fusce eget lobortis sapien.</p>
						</div>
						<input type="radio" name="displayControl" id="home"  <?= (empty($page)) ? "checked" : "" ?>>
						<div>
							<h2 class="hide title" id="test">Welcome to the home page.</h2>
							<p class="hide text">Thank you for stopping by.</p>
						</div>
					</noscript>
				</div>
			</div>
		</div>
	</body>
</html>
