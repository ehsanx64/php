#!/usr/bin/env php
<?php
/*
 * Basic I\O using PHP-CLI
 */

// Include the library
require __DIR__ . DIRECTORY_SEPARATOR . "cli-lib.php";

// Ask user for their name and store it
$userInput = input("Please enter your name (default User): ");

// Check for user input and set a default it it's empty
$userName = empty($userInput) ? 'User' : $userInput;

// Output a greeting message to the user
output("Hello dear $userName!!!");
