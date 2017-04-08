<?php 
chdir(dirname(__DIR__));

define("SYS_PATH", "lib/");
define("APP_PATH", "app/");

require SYS_PATH."Autoloader.php";

$url = isset($_GET['url']) ?$_GET['url']:"home";
$url= explode("/", $url);

if (isset($url[0])) {
	$controllerName = $url[0];
}
if (isset($url[1])) {
	$method = $url[1];
}

if (file_exists(APP_PATH."controllers/".$controllerName.".php")) {
	require APP_PATH."controllers/".$controllerName.".php";
	$controller = new $controllerName();
	if (isset($method)) {
		if (method_exists($controllerName, $method)) {
			$controller->$method();
		}else{
			echo "Error no existe el metodo";
		}
	}

}else{
	echo "Error la url no existe";
}








?>