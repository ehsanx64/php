<?php

use Dotenv\Dotenv;

class DotEnvController extends Controller {
    public function __construct() {}

    public function index() {
        // Load .env file from current working directory
        // $dotenv = new Dotenv(__DIR__);

        // Use custom file name (instead of .env) from current working directory
        $dotenv = new Dotenv(__DIR__, 'DotEnv.env.example');

        // Load the env file
        // $dotenv->load();

        // Handle (FileNotFound) exception if not env file found
        $dotenv->safeLoad();

        d($_ENV);
        p('Username is: ' . getenv('Username'));
    }
}
