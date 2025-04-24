<?php
use ehsanx64\phplib;
use ehsanx64\phplib\Date;
use ehsanx64\phplib\Module;
use ehsanx64\phplib\Translate;
use ehsanx64\phplib\Environment;
use ehsanx64\phplib\Token;
use ehsanx64\phplib\Shellface;

class PhplibController extends Controller {

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
        $t = new Translate(dirname(__FILE__) . '/lang');
        p('Text to translate: Hello"');
        p('Result: ' . $t->t('Hello'));

        p('Setting locale to fa...');
        $t->setLocale('fa');
        p('Translating a complicated string...');
        echo $t->trn('You have %s messages with %s unread', 2, 1);
//        echo sprintf($t->t('You have %s messages with %s unread'), 2, 1);
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
