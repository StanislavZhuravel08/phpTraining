<?php
/**
 * Created by PhpStorm.
 * User: stanislavz
 * Date: 27.06.18
 * Time: 9:00
 */

require_once 'php/boostrap.php';

use Stas\Http\Router;

$uri = $_SERVER['REQUEST_URI'];

$router = new Router();
$router->dispatch();
