<?php
/**
 * Created by PhpStorm.
 * User: stanislavz
 * Date: 27.06.18
 * Time: 9:00
 */

include 'php/models/dbConnection.php';
include 'php/models/Request.php';
include 'php/controllers/Router.php';
include 'php/controllers/Dispatcher.php';


$router = new Router();
$request = new Request($_SERVER);

$request->getPath();

$dispatcher = new Dispatcher($router);

$dispatcher->led($request);
$router->showRoutes();

//$dbConnection = new dbConnection();

