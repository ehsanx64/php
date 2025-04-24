<?php
class SimpleClass {
	function __construct() {
	}

	public function sayHey() {
		echo "Hey!!!\n";
	}

}

$app = new SimpleClass;
$app->sayHey();
