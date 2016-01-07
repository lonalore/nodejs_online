<?php

/**
 * @file
 * Class installation to define shortcodes.
 */

if(!defined('e107_INIT'))
{
	exit;
}


/**
 * Class nodejs_online_shortcodes.
 */
class nodejs_online_shortcodes extends e_shortcode
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
		parent::__construct();
		$this->plugPrefs = e107::getPlugConfig('nodejs_online')->getPref();
	}


	/**
	 * Render username as a link.
	 *
	 * @return string
	 */
	function sc_online_user()
	{
		$tp = e107::getParser();
		$tp->thumbWidth = 20;
		$tp->thumbHeight = 20;
		$avatar = $tp->toAvatar($this->var['user']);

		$uparams = array(
			'id'   => $this->var['user']['user_id'],
			'name' => $this->var['user']['user_name'],
		);

		$markup = '<a href="' . e107::getUrl()->create('user/profile/view', $uparams) . '">';
		$markup .= $avatar . ' ' . $uparams['name'];
		$markup .= '</a>';

		return $markup;
	}


	/**
	 * Return with the number of online users.
	 *
	 * @return mixed
	 */
	function sc_online_user_count()
	{
		return $this->var['count'];
	}


	/**
	 * Title for menu.
	 *
	 * @return string
	 */
	function sc_online_user_header()
	{
		return LAN_NODEJS_ONLINE_MENU_01;
	}

}
