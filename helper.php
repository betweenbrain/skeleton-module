<?php defined('_JEXEC') or die;

/**
 * File       helper.php
 * Created    8/17/15 1:57 PM
 * Author     Matt Thomas
 * Website    http://betweenbrain.com
 * Email      matt@betweenbrain.com
 * Support    https://github.com/betweenbrain/
 * Copyright  Copyright (C) 2012-2015 betweenbrain llc. All Rights Reserved.
 * License    GNU GPL v3 or later
 */
class modSkeletonHelper
{

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
	 * @param   JRegistry $params The module parameters
	 *
	 * @since  0.0
	 */
	public function __construct($params)
	{
		// Module params
		$this->params = $params;
	}

	/**
	 * Function foo
	 *
	 * @return bool
	 * @since  0.0
	 */
	function foo()
	{

		return;
	}
}

