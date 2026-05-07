<?php
// The following code does not work (and I don't know why)
if (isset($_ENV['USER'])) {
    print_r($_ENV['USER']);
}

// $USER
echo "Username (getenv()): " . getenv('USER') . "\n";
echo "Username (\$_SERVER): ${_SERVER['USER']}\n";
echo "\n";

// $HOME
echo "Home (getenv()): " . getenv('HOME') . "\n";
echo "Home (\$_SERVER): ${_SERVER['HOME']}\n";
