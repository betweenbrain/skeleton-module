<?php defined('_JEXEC') or die;

/**
 * File       mod_skeleton.php
 * Created    12/31/12 12:04 PM
 * Author     Matt Thomas
 * Website    http://betweenbrain.com
 * Email      matt@betweenbrain.com
 * Support    https://github.com/betweenbrain/
 * Copyright  Copyright (C) 2012 betweenbrain llc. All Rights Reserved.
 * License    GNU GPL v3 or later
 */

// Include the helper file
require_once(dirname(__FILE__) . DS . 'helper.php');
// Application object
$app = JFactory::getApplication();
// Global document object
$doc = JFactory::getDocument();
// Instantiate our class
$skeleton = new modSkeletonHelper($params);
// Call the foo function
$foo = $skeleton->foo();
// Render module output
require JModuleHelper::getLayoutPath('mod_skeleton');

/**
 * Load CSS files, first checking for template override of CSS.
 *
 * JPATH_SITE: Absolute path to the installed Joomla! site Checking absolute path helps security.
 *
 * JURI::base():  Base URI of the Joomla site. If TRUE, then only the path, trailing "/" omitted, to the Joomla site is returned;
 * otherwise the scheme, host and port are prepended to the path.
 */

if (file_exists(JPATH_SITE . '/templates/' . $app->getTemplate() . '/css/mod_skeleton/skeleton.css')) {
    $doc->addStyleSheet(JURI::base(TRUE) . '/templates/' . $app->getTemplate() . '/css/mod_skeleton/skeleton.css');
} elseif (file_exists(JPATH_SITE . '/modules/mod_skeleton/tmpl/css/skeleton.css')) {
    $doc->addStyleSheet(JURI::base(TRUE) . '/modules/mod_skeleton/tmpl/css/skeleton.css');
}