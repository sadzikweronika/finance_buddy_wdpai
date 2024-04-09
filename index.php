<?php
require_once 'src/controllers/AppControler.php';
require_once 'src/models/Project.php';

$controller = new AppController();

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);
$action = explode("/", $path)[0];
switch($action){
    case "dashboard":
        $projectA = new Project("A", "Sample desc", "https://picsum.photos/300/200");
        $projects = [$projectA];
        $controller->render($action, ["items" => $projects]);
        break;
    case "projects":
        $controller->render($action);
        break;
    default:
        $controller->render($action);
    }