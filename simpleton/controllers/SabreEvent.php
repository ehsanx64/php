<?php
//require dirname(__DIR__) . '/utils.php';
use Sabre\Event\EventEmitter;

class SabreEventController extends Controller {

    public function __construct() {
    }

    public function index() {
        $eventEmitter = new EventEmitter();

        $eventEmitter->on('create', function() {
            echo "Something got created, apparently\n";
        });

        $eventEmitter->emit('create');
    }
}
