<?php
namespace controllers;

use ehsanx64\phplib;
use ehsanx64\phplib\Date;
use ehsanx64\phplib\Module;
use ehsanx64\phplib\Translate;
use ehsanx64\phplib\Environment;
use ehsanx64\phplib\Token;
use ehsanx64\phplib\Shellface;

class PhplibController extends \Controller {

    public function __construct() {
    }

    public function index() {
        // Is 123 similar to a date?
        $r = Date::isDateString('123');
        d($r);

        // What about 2018-01-03?
        $r = Date::isDateString('2018-01-03');
        d($r);
    }

    public function testModule() {
        $m = new Module(__DIR__ . '/phplib_mods');
    }

    public function testTranslate() {
        echo $this->render('test-translate');
    }

    public function testTranslateContent() {
        ob_start();
        echo $this->renderContent('test-translate-content');
        return ob_get_clean();
    }

    public function testEnvironment() {
        $e = new Environment();

		// Following line causes exception
//		$e->is('hello');

		// Following must be false
		p('Is WordPress? ' . ($e->is('wordpress') ? 'Yes' : 'No'));
    }

    public function testToken() {
        $t = new Token();

        // Default token
        p('Default token: ' . $t->getRandomToken());

        // Default token mode with different length
        p('Default 32-char token: ' . $t->getRandomToken(32));

        // Long numerical token
        $t->setNumericPool();
        p('32-char numerical token: ' . $t->getRandomToken(32));

        // Long no-capital alphanumerical token
        $t->setNocapAlphanumericPool();
        p('64-char numerical token: ' . $t->getRandomToken(64));


    }

    public function testShellfacePython() {
        $sfp = new Shellface("python");
        $sfp->execute('print("Hello world!!!")');

        dd($sfp);
    }
}
