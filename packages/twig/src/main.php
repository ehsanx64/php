<?php
define('APP_PATH', __DIR__ . '/..');

require APP_PATH . '/vendor/autoload.php';

$arrayTemplates = [
    'greet' => "Hello from {{ name }}!\n",
    'farewell' => "Goodbye from {{ name }}!\n",
];

$arrayLoader = new \Twig\Loader\ArrayLoader($arrayTemplates);
$arrayTwig = new \Twig\Environment($arrayLoader);
echo $arrayTwig->render('greet', ['name' => 'Twig Array Loader']);
echo $arrayTwig->render('farewell', ['name' => 'Twig Array Loader']);

$fileLoader = new \Twig\Loader\FilesystemLoader(APP_PATH . '/templates');
$fileTwig = new \Twig\Environment($fileLoader, [
    'cache' => APP_PATH . '/storage',
]);
echo $fileTwig->render('simple.twig', ['name' => 'Twig File Loader']);