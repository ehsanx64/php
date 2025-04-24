<?php
//use Root;

p(sprintf("Loaded module: %s", __FILE__));

$h = new second\Beta\Helper();
$h->help();

// Lets instantiate and use a class from another module
$ds = new first\Alpha\Tools();
$ds->test();