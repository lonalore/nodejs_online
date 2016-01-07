<?php

/**
 * @file
 * Class to render an e107 menu for plugin.
 */

if(!defined('e107_INIT'))
{
	exit();
}

if(!e107::isInstalled('nodejs_online'))
{
	exit;
}

e107::lan('nodejs_online', false, true);


/**
 * Class nodejs_online_menu.
 */
class nodejs_online_menu
{

	/**
	 * Store plugin preferences.
	 *
	 * @var mixed|null
	 */
	private $plugPrefs = null;


	/**
	 * Constructor.
	 */
	function __construct()
	{
		if(USER)
		{
			$this->plugPrefs = e107::getPlugConfig('nodejs_online')->getPref();
			$this->renderMenu();
		}
	}


	/**
	 * Render menu contents.
	 */
	function renderMenu()
	{
		$template = e107::getTemplate('nodejs_online');
		$sc = e107::getScBatch('nodejs_online', true);
		$tp = e107::getParser();
		$listuserson = e107::getOnline()->userList();

		$users = array();
		foreach($listuserson as $uinfo => $row)
		{
			if(!isset($users[$row['user_id']]))
			{
				$users[$row['user_id']] = $row;
			}
		}

		$sc->setVars(array(
			'count' => count($users),
		));
		$text = $tp->parseTemplate($template['MENU']['HEADER'], true, $sc);

		foreach($users as $uid => $user)
		{
			$sc->setVars(array(
				'user' => $user,
			));
			$text .= $tp->parseTemplate($template['MENU']['ITEM'], true, $sc);
		}

		$text .= $tp->parseTemplate($template['MENU']['FOOTER'], true);

		e107::getRender()->tablerender(LAN_NODEJS_ONLINE_MENU_01, $text);
		unset($text);
	}

}


new nodejs_online_menu();
