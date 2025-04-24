<?php	// Changing property and method scope
class Example {
	var $name = "Michael";	// Save as public but deprecated
	public $age = 23;	// Public property
	protected $usercount;	// Protected property

	private function admin() {	// Private method
		// Admin code goes here
	}
}
?>
