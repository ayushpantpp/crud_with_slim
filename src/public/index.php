<?php
//set_ini('error_reporting',1);
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';
require '../classes/UserClass.php';

require 'db_config.php';

$app = new \Slim\App;
$app->get('/hello/{name}', function (Request $request, Response $response, array $args) {
    $name = $args['name'];
    $response->getBody()->write("Hello, $name");

    return $response;
});
$obj_in = new UserClass();
$app->get('/all', $obj_in->get_employee());
$obj_new = new UserClass();


$app->get('/employee/{id}', $obj_new->get_employee_id($args['id']));
$app->run();






