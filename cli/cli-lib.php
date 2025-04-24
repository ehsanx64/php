<?php
/**
 * Display a string on the STDOUT (STandarD OUTput)
 *
 * @param string $text String to output to console
 * @param bool|true $nl If it is true method will append a newline to string
 */
function out($text = '', $nl = true) {
    fwrite(STDOUT, $text . ($nl ? "\n" : null));
}

/**
 * Read a string from the STDIN (STandarD INput) and return it
 *
 * @return string The user input string with newline character removed
 */
function in() {
    return rtrim(fread(STDIN, 8192), "\n");
}
