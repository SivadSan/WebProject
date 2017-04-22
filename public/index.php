<?php

require '../vendor/autoload.php';
include 'dbconnect.php';

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \Slim\App as App;
use \Slim\Container as Container;
use Slim\Views\PhpRenderer as PhpRenderer;

$configuration = [
		'settings' => [
				'displayErrorDetails' => true,
				'addContentLengthHeader' => false,
		]
];

$container = new Container($configuration);
$app = new App($container);

$app->get('/', function (Request $request, Response $response) {
    return $response->withRedirect("http://localhost:8080/WebProject/public/registration.php");
});

$app->post('/registrationAction', function (Request $request, Response $response) {
	$post = $request->getParsedBody();
	$username = $post['username'];
	$email = $post['email'];
	$password = $post['password'];
	
	add($username,$email,$password);
	return $response->withRedirect("http://localhost:8080/WebProject/public/login.php");
});

$app->run();