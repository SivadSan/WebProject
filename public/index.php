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
	//$password = sha1($password);
	
	$userRecord = regInfo($username,$email,$password);
	$response->getBody()->write(json_encode($userRecord));
});

$app->post('/login', function (Request $request, Response $response) {

	global $url;
	$userRecord;

	$username = $_POST['username'];
	$password = $_POST['password'];
	//$password = sha1($password);

	$userRecord = loginUser($username, $password);
    $response->getBody()->write(json_encode($userRecord));
	// if ($userRecord['status'] == 'error'){
	// 	return $response->getBody()->write(json_encode($userRecord));
	// }
	// else {
	// 	$response->getBody()->write(json_encode($userRecord));
	// 	return $response->withRedirect($url."/home.php");
	// }

});

$app->post('/profile', function (Request $request, Response $response) {
	
	global $url;
	$userRecord;

	$post = $request->getParsedBody();
	
	$first_name = $post['first_name'];
	$last_name = $post['last_name'];
	$sex = $post['sex'];
	$contact_number = $post['contact_number'];
	$contact_email = $post['contact_email'];
	$country_of_birth = $post['country_of_birth'];
	$year_of_graduation = $post['year_of_graduation'];
	$degree = $post['degree'];
	$class_of_degree = $post['class_of_degree'];
	$occupation = $post['occupation'];
	$company = $post['company']; 
	$country_employed = $post['country_employed'];
	$company_email = $post['company_email'];
	$interest = $post['interest']; 
	$social_media = $post['social_media']; 	 

	$userRecord = proInfo($first_name,$last_name,$sex,$contact_number,$contact_email,$country_of_birth,$year_of_graduation,$degree,$class_of_degree,$occupation,$company,$country_employed,$company_email,$interest,$social_media);
	$response->getBody()->write(json_encode($userRecord));

});

$app->run();