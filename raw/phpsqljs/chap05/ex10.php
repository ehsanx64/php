<?php	// Declaring a class and examining an object
$object = new User;
print_r($object);

class User {
	public $name, $password;

	function save_user() {
		echo "Save User code goes here";
	}
}
?>
