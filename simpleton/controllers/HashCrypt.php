<?php
class HashCryptController extends Controller {
    public function __construct() {
    }

    public function index() {
        p(__CLASS__ . '::' . __METHOD__);
    }

    public function md5() {
        $string = 'Hello there';

        p("The string: " . $string);
        p("The hashed string: " . md5($string));
    }
}
