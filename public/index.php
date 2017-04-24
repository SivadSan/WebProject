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
// $url = "https://student-alumni-app.herokuapp.com";
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
	$userRecord;

	$post = $request->getParsedBody();
	$username = $post['username'];
	$email = $post['email'];
	$password = $post['password'];
	$password = sha1($password);
	
	$userRecord = regInfo($username,$email,$password);

	if ($userRecord['status'] == 'error'){
		return $response->withStatus(201);
	}
	else {
		return $response->withStatus(200);
	}
});

$app->post('/login', function (Request $request, Response $response) {

	global $url;
	$userRecord;

	$username = $_POST['username'];
	$password = $_POST['password'];
	$password = sha1($password);

	$userRecord = loginUser($username, $password);
    return empty($userRecord) ? $response->withStatus(403) : $response->withStatus(200);

});

$app->run();