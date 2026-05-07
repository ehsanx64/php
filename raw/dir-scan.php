<?php
/*
 * Recursively scan directories
 */
function dirScan($dir) {
    static $list = array();

    $list = glob($dir . DIRECTORY_SEPARATOR . '*');
    foreach ($list as $item) {
        if (is_dir($item)) {
            $list = array_merge($list, dirScan($item));
        }
    }

    return $list;
}

$target = getenv('HOME') ?? '/tmp';
if ($target != '/tmp') {
    $target = $target . "/Desktop";
}

if (isset($argv[1])) {
    if (is_dir($argv[1])) {
        $target = $argv[1];
    } else {
        echo $argv[1] . " does not exist or is not a directory, " 
            . "using the default path: " . $target . "\n";
    }
}

$res = dirScan($target);
$tpl = "There %s %d %s in %s\n";
if (count($res) > 1) {
    printf($tpl, 'are', count($res), "folders", $target);
} else {
    printf($tpl, 'is', count($res), "folder", $target);
}
