<?php
function newModel($name){
	$myfile = fopen("new-laravel-model.bat", "w") or die("Unable to open file!");
	$txt = "php artisan make:model ".$name." --migration";
	fwrite($myfile, $txt);
	fclose($myfile);
	pclose(popen("start /B new-laravel-model.bat", "r")); header('Location: zlaravel.php'); die(); 
}

function newController($name){
	$myfile = fopen("new-laravel-controller.bat", "w") or die("Unable to open file!");
	$txt = "php artisan make:controller ".$name."Controller --resource";
	fwrite($myfile, $txt);
	fclose($myfile);
	pclose(popen("start /B new-laravel-controller.bat", "r")); header('Location: zlaravel.php'); die(); 
}

function newMiddleware($name){
	$myfile = fopen("new-laravel-middleware.bat", "w") or die("Unable to open file!");
	$txt = "php artisan make:middleware ".$name;
	fwrite($myfile, $txt);
	fclose($myfile);
	pclose(popen("start /B new-laravel-middleware.bat", "r")); header('Location: zlaravel.php'); die(); 
}

function newRequest($name){
	$myfile = fopen("new-laravel-request.bat", "w") or die("Unable to open file!");
	$txt = "php artisan make:request ".$name."Request";
	fwrite($myfile, $txt);
	fclose($myfile);
	pclose(popen("start /B new-laravel-request.bat", "r")); header('Location: zlaravel.php'); die(); 
}

function newSeeder($name){
	$myfile = fopen("new-laravel-seeder.bat", "w") or die("Unable to open file!");
	$txt = "php artisan make:seeder ".$name."Seeder";
	fwrite($myfile, $txt);
	fclose($myfile);
	pclose(popen("start /B new-laravel-seeder.bat", "r")); header('Location: zlaravel.php'); die(); 
}

function startServe(){
	$myfile = fopen("new-start-serve.bat", "w") or die("Unable to open file!");
	$txt = "php artisan serve";
	fwrite($myfile, $txt);
	fclose($myfile);
	pclose(popen("start /B new-start-serve.bat", "r")); header('Location: zlaravel.php'); die(); 
}

function startMigrate(){
	$myfile = fopen("new-start-migrate.bat", "w") or die("Unable to open file!");
	$txt = "php artisan migrate";
	fwrite($myfile, $txt);
	fclose($myfile);
	pclose(popen("start /B new-start-migrate.bat", "r")); header('Location: zlaravel.php'); die(); 
}

function startOptimize(){
	$myfile = fopen("new-start-optimize.bat", "w") or die("Unable to open file!");
	$txt = "php artisan optimize";
	fwrite($myfile, $txt);
	fclose($myfile);
	pclose(popen("start /B new-start-optimize.bat", "r")); header('Location: zlaravel.php'); die(); 
}
function dumpAutoLoad(){
	$myfile = fopen("new-dump-autoload.bat", "w") or die("Unable to open file!");
	$txt = "composer dump-autoload";
	fwrite($myfile, $txt);
	fclose($myfile);
	pclose(popen("start /B new-dump-autoload.bat", "r")); header('Location: zlaravel.php'); die(); 
}

function clearBats(){
	if (file_exists("new-laravel-model.bat")) unlink("new-laravel-model.bat");
	if (file_exists("new-laravel-controller.bat")) unlink("new-laravel-controller.bat");
	if (file_exists("new-laravel-middleware.bat")) unlink("new-laravel-middleware.bat");
	if (file_exists("new-laravel-request.bat")) unlink("new-laravel-request.bat");
	if (file_exists("new-laravel-seeder.bat")) unlink("new-laravel-seeder.bat");
	if (file_exists("new-start-serve.bat")) unlink("new-start-serve.bat");
	if (file_exists("new-start-migrate.bat")) unlink("new-start-migrate.bat");
	if (file_exists("new-dump-autoload.bat")) unlink("new-dump-autoload.bat");
	if (file_exists("new-start-optimize.bat")) unlink("new-start-optimize.bat");
}

session_start();

if($_SERVER["REQUEST_METHOD"] == "POST"){
	if(isset($_POST["makes"])){
		if($_POST["model"]) $model = $_POST["model"];
		if($_POST["controller"]) $controller = $_POST["controller"];
		if($_POST["middleware"]) $middleware = $_POST["middleware"];
		if($_POST["request"]) $request = $_POST["request"];
		if($_POST["seeder"]) $seeder = $_POST["seeder"];
	}
		
	if(isset($_POST["serve"]) && $_POST["serve"] !="") $serve = $_POST["serve"];
	if(isset($_POST["migrate"]) && $_POST["migrate"] !="") $migrate = $_POST["migrate"];
	if(isset($_POST["optimize"]) && $_POST["optimize"] !="") $optimize = $_POST["optimize"];
	if(isset($_POST["dump-autoload"]) && $_POST["dump-autoload"] !="") $dumpAutoLoad= $_POST["dump-autoload"];
	if(isset($_POST["clear"]) && $_POST["clear"] !="") $clear = $_POST["clear"];

	if(isset($model)) newModel($model);
	if(isset($controller)) newController($controller);
	if(isset($middleware)) newMiddleware($middleware);
	if(isset($request)) newRequest($request);
	if(isset($seeder)) newSeeder($seeder);
	if(isset($serve)) startServe();
	if(isset($migrate)) startMigrate();
	if(isset($optimize)) startOptimize();
	if(isset($dumpAutoLoad)) dumpAutoLoad();
	if(isset($clear)) clearBats();
}
?>

<!doctype html>
<html lang="pt_BR">
  <head>

  	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-status-bar-style" content="yes" />
    <meta http-equiv="cleartype" content="on" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="MobileOptmized" content="320" />

    <!-- Favicons -->
	<!-- For IE 9 and below. ICO should be 32x32 pixels in size -->
	<!--[if IE]><link rel="shortcut icon" href="path/to/favicon.ico"><![endif]-->
	<!-- Touch Icons - iOS and Android 2.1+ 180x180 pixels in size. --> 
	<link rel="apple-touch-icon-precomposed" href="apple-touch-icon-precomposed.png">
	<!-- Firefox, Chrome, Safari, IE 11+ and Opera. 196x196 pixels in size. -->
	<link rel="icon" href="path/to/favicon.png">
	<!-- Favicons-->


    <!-- Titulo, Descrição, Keywords e Autor -->
    <title>zLaravel</title>
    <meta name="description" content="Esqueleto">
	<meta name="keywords" content="HTML,CSS,XML,JavaScript">
	<meta name="author" content="Jeferson Eurides"> 
	<!-- Titulo, Descrição, Keywords e Autor-->

    <style type="text/css">
		.uk-navbar-nav > li:not(.uk-active) > a:focus{
			color: #fff;
		}
		.arredondado{
			border-radius: 5px 5px 5px 5px;
			border: solid 1px #999;
			height: 30px;
			display: block;
			width: 100%;
			margin-top: 5px;
			padding-left: 5px;
		}
		#content{
			text-align: center;
			width: 275px;
			margin: 0 auto;
		}
		.primary{
			background-color: #007FFF;
			color:#FFF;
			font-weight: bold;
		}
		.primary:hover{
			background-color: #0074E8;
		}
		h2{
			color: #555;
		}
    </style>

  </head>
  <body>
  	<!-- Início Conteúdo -->
  	<div id="content" class="center">
  		<h2>zLaravel 1.0</h2>
  		<form id="makes" method="POST" action="">
  				<input type="hidden" name="makes" value="makes" />
				<input class="arredondado" type="text" name="model" placeholder="Nome do Model" />
				<input class="arredondado" type="text" name="controller" placeholder="Nome do Controller" />
				<input class="arredondado" class="arredondado" class="arredondado" type="text" name="middleware" placeholder="Nome do Middleware" />
				<input class="arredondado" class="arredondado" type="text" name="request" placeholder="Nome do Request" />
				<input class="arredondado" type="text" name="seeder" placeholder="Nome do Seeder" />
				<input class="arredondado primary" type="submit" value="Make!"/>
  		</form>
  		<form id="serve" method="POST" action="">				
				<input type="hidden" name="serve" value="serve" />
				<input class="arredondado primary" type="submit" value="Rodar Serve!"/>
  		</form>
  		<form id="migrate" method="POST" action="">				
				<input type="hidden" name="migrate" value="migrate" />
				<input class="arredondado primary" type="submit" value="Rodar Migrate!"/>
  		</form>
  		<form id="optimize" method="POST" action="">				
				<input type="hidden" name="optimize" value="optimize" />
				<input class="arredondado primary" type="submit" value="Rodar Optimize!"/>
  		</form>
  		<form id="dump-autoload" method="POST" action="">				
				<input type="hidden" name="dump-autoload" value="dump-autoload" />
				<input class="arredondado primary" type="submit" value="Dump Auto Load!"/>
  		</form>
  		<form id="clear" method="POST" action="">				
				<input type="hidden" name="clear" value="clear" />
				<input class="arredondado primary" type="submit" value="Rodar Clear!"/>
  		</form>


  	</div>
  	<!-- Final Conteúdo -->
  </body>
</html>