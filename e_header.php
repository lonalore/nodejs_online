<?php

/**
 * @file
 * Class instantiation to prepare JavaScript configurations and include css/js
 * files to page header.
 */

if(!defined('e107_INIT'))
{
	exit;
}


/**
 * Class nodejs_online_e_header.
 */
class nodejs_online_e_header
{

	/**
	 * Store plugin preferences.
	 *
	 * @var mixed|null
	 */
	private $plugPrefs = array();


	/**
	 * Constructor.
	 */
	function __construct()
	{
		if(USERID > 0)
		{
			$this->plugPrefs = e107::getPlugConfig('nodejs_online')->getPref();
			$this->include_components();
		}
	}


	/**
	 * Include necessary CSS and JS files
	 */
	function include_components()
	{
		e107::css('nodejs_online', 'css/nodejs_online.css');
		e107::js('footer', '{e_PLUGIN}nodejs_online/js/nodejs_online.js', 'jquery', 5);
	}
}


// Class instantiation.
new nodejs_online_e_header;
