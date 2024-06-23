<?php
require_once 'AppController.php';
class DefaultController extends AppController{
    public function index() {
        $this->render('login', ['messages' => 'Hello World!']);
    }

    public function dashboard() {
        $this->render('dashboard');
    }
}