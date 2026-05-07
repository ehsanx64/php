<?php
/*
 * Ideas about eval()
 *
 * I was playing with php's REPL (`php -a`); Some (absurd) ideas came to my mind
 * so here they are.
 */

function separator() {
    echo str_repeat('-=-=', 20) . "\n";
}

/*
 * Print a section with a heading title (if given)
 */
function section($title = "", $prependNewline = true) {
    if ($prependNewline) {
        echo "\n";
    }

    if ($title == "") {
        echo str_repeat('-', 80) . "\n";
    } else {
        $rightPadding = str_repeat('-', 70 - strlen($title));
        printf("---[ %s ]---%s\n", $title, $rightPadding);
    }
}

/*
 * This functions prints the input program, evaluate it and dump its result
 */
function executeIt($program) {
    separator();
    echo "* Program:\n$program\n\n* Result:\n";
    eval("var_dump(" . $program . ");");
}

section("executeIt()", false);
executeIt("2+2");
executeIt("\$arr = [1, 3]");
executeIt("true || false");
executeIt("true && false");

section("var_export()");
// var_export is a useful dumping function (2nd param --true prints the result
// as string)
$res = var_export(true && false && true, true);
echo "true && false => $res\n";
echo "var_export retval type: " . gettype($res) . "\n";

section("eval() & heredoc");
// Combination of eval() and heredoc string (adds mess to scariness of eval)
eval(<<<_EOC
    // Some comment
    echo "The result: " . 25 * 2 . "\n";
_EOC);

$myArray = [1, 2, 3];
section("var_dump");
var_dump($myArray);

section("print_r()");
print_r($myArray);

