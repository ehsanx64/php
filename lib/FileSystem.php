<?php
namespace ehsanx64\phplib;

class FileSystem {
	/**
	 * Return array of directories in a given directory
	 *
	 * @param string $basePath The directory to return its subdirectories
	 * @return array Array of sub-directories paths
	 */
	public function getDirectories($basePath) {
		$dirs = array_filter(glob($basePath . DIRECTORY_SEPARATOR . '*'), 'is_dir');
		return $dirs;
	}

	/**
	 * Get the last component in a given path. For example if given path is:
	 * <code>/tmp/test/a</code>, Method will return <code>a</code>.</i>
	 * <br><b>Note:</b> This method does not care if the the last component of the path is a directory or file.
	 *
	 * @param string $path A URI
	 * @returns string Last component in the given path
	 */
	public function getLastPart($path) {
		$parts = explode(DIRECTORY_SEPARATOR, $path);
		return $parts[count($parts) - 1];
	}
}