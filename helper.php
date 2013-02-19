<?php defined('_JEXEC') or die;

/**
 * File       helper.php
 * Created    12/31/12 12:25 PM
 * Author     Matt Thomas
 * Website    http://betweenbrain.com
 * Email      matt@betweenbrain.com
 * Support    https://github.com/betweenbrain/
 * Copyright  Copyright (C) 2012 betweenbrain llc. All Rights Reserved.
 * License    GNU GPL v3 or later
 */

class modSkeletonHelper {

	/**
	 * Module parameters
	 *
	 * @var    boolean
	 * @since  0.0
	 */
	protected $params;

	/**
	 * Constructor
	 *
	 * @param   JRegistry  $params  The module parameters
	 *
	 * @since  0.0
	 */
	public function __construct($params) {
		// Store the module params
		$this->params = $params;
	}

	/**
	 * Function foo
	 *
	 * @return bool
	 * @since  0.0
	 */
	function foo() {
		$result = htmlspecialchars($this->params->get('sometext'));

		return $this->bar($result);
	}

	/**
	 * Protected function to do something. Protected as it is only used within this class.
	 *
	 * @param $result
	 * @return array
	 * @since  0.0
	 */
	protected function bar($result) {

		// Remove double spaces, tabs, new lines.
		$result = preg_replace(array('/\s{2,}+/', '/\t/', '/\n/'), '', $result);

		// Make vowels uppercase
		$result = str_replace(array('a', 'e', 'i', 'o', 'u'), array('A', 'E', 'I', 'O', 'U'), $result);

		return $result;
	}

	/**
	 * Function to fetch cached data
	 *
	 * @internal param string $name
	 * @return bool|mixed
	 * @since    0.0
	 */
	function fetchCache() {
		$cache = JPATH_CACHE . '/mod_skeleton/bones.json';
		// If cache is enabled, and there is a cache file, use it.
		if ($this->params->get('cache') && $this->validateCache($cache)) {
			$json = file_get_contents($cache);
			// When json_decode is TRUE, returned objects will be converted into associative arrays. http://php.net/manual/en/function.json-decode.php
			$data = json_decode($json, TRUE);

			return $data;
		}

		return FALSE;
	}

	/**
	 * Function to compile cache file
	 *
	 * @since  1.0
	 */
	protected function compileCache($json, $cache) {
		if (json_decode($json)) {
			file_put_contents($cache, $json);
			if (file_exists($cache)) {
				return TRUE;
			}
		}
	}

	/**
	 * Function to validate cache file
	 *
	 * @since  1.0
	 */
	function validateCache($cache) {
		if ($this->params->get('cache')) {
			if (file_exists($cache)) {
				$cacheTime = ($this->params->get('cachetime', 15)) * 60;
				$cacheAge  = filemtime($cache);
				if ((time() - $cacheAge) >= $cacheTime) {
					unlink($cache);

					return FALSE;
				}

				return TRUE;
			}
		} elseif (!$this->params->get('cache') && file_exists($cache)) {
			unlink($cache);
		}
	}
}