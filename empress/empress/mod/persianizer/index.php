<?php
use \ehsanx64\phplib\Environment;

$e = new Environment();
if ($e->is('wordpress')) {
    if (get_locale() === 'fa_IR') {
        add_action('wp_enqueue_scripts', function () {
            wp_enqueue_style('persianizer', EMPRESS_ASSETS . "/persianizer/persianizer.css");
        }, 1000000);
    }
}