<?php
/**
 * Download a web url to the given filename in current working directory 
 */
function download($url, $filename) {
	$data = file_get_contents($url);
	file_put_contents(__DIR__ . "/$filename", $data);
}

/**
 * Download the latest version of WordPress
 */
function latestWordpress() {
	download("https://wordpress.org/latest.tar.gz", "wordpress-latest.tar.gz");
}

// Call functions
latestWordpress();
