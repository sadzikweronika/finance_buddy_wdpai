<?php
require_once 'src/controllers/AppController.php';
require_once 'src/models/Project.php';
require 'Routing.php';


$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Routing::get('index', 'DefaultController');
Routing::get('dashboard', 'DefaultController');
Routing::post('login', 'SecurityController');
Routing::post('addProject', 'ProjectController');
Routing::run($path);