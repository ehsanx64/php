<?php
class SiteController extends Controller {

    public function __construct() {
    }

    public function index() {
        echo $this->render('index', ['title' => 'Hello there']);
    }

    public function login() {
        echo $this->render('login', ['title' => 'Login']);
    }
}