<?php defined('_JEXEC') or die;

/**
 * File       mod_skeleton.php
 * Created    8/17/15 1:57 PM
 * Author     Matt Thomas
 * Website    http://betweenbrain.com
 * Email      matt@betweenbrain.com
 * Support    https://github.com/betweenbrain/
 * Copyright  Copyright (C) 2012-2015 betweenbrain llc. All Rights Reserved.
 * License    GNU GPL v3 or later
 */

// Include the helper file
require_once __DIR__ . '/helper.php';
// Instantiate our class
$skeleton = new modSkeletonHelper($params);
// Call the foo function
$foo = $skeleton->foo();
// Render module output
require JModuleHelper::getLayoutPath('mod_skeleton');
