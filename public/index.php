<?php

require '../vendor/autoload.php';
include 'lib.php';

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \Slim\App as App;
use \Slim\Container as Container;

$configuration = [
		'settings' => [
				'displayErrorDetails' => true,
		]
];


$url = "http://localhost:8080/WebProject/public";
$container = new Container($configuration);
$app = new App($container);

$app->get('/', function (Request $request, Response $response) {

	global $url;
    return $response->withRedirect($url."/home.php");
});

$app->get('/hello/{name}', function (Request $request, Response $response){
	$name = $request->getAttribute('name');
    $response->getBody()->write("Hello, $name");

    return $response;
});

$app->post('/register', function (Request $request, Response $response) {
	
	global $url;
	$post = $request->getParsedBody();
	$username = $post['username'];
	$email = $post['email'];
	$password = $post['password'];
	
	regInfo($username,$email,$password);
	return $response->withRedirect($url."/login.php");
});

$app->post('/login', function (Request $request, Response $response) {

	global $url;
	$username = $_POST['username'];
	$password = $_POST['password'];
	$password = sha1($password);

	echo loginUser($username, $password);
	return $response->withRedirect($url."/home.php");

});

$app->run();