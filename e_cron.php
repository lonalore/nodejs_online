<?php

/**
 * @file
 * Class to implement e107 cron handler.
 */

if(!defined('e107_INIT'))
{
	exit;
}


/**
 * Class nodejs_online_cron.
 */
class nodejs_online_cron
{

	function config()
	{
		$cron = array();

		$cron[] = array(
			'name'        => 'Node.js - Update online menu..',
			'function'    => 'nodejs_update_online_menu',
			'category'    => 'user',
			'description' => 'Send messages to clients for updating online menu.',
		);

		return $cron;
	}

	/**
	 * Send messages to clients for updating online menu.
	 */
	public function nodejs_update_online_menu()
	{
		e107_require_once(e_PLUGIN . 'nodejs/nodejs.main.php');
		e107_require_once(e_PLUGIN . 'nodejs_online/includes/nodejs_online.php');

		$template = e107::getTemplate('nodejs_online');
		$sc = e107::getScBatch('nodejs_online', true);
		$tp = e107::getParser();

		$users = nodejs_online_get_online_users();

		$message = (object) array(
			'broadcast' => true,
			'callback'  => 'nodejsOnlineMenu',
			'type'      => 'nodejsOnlineMenuBadge',
			'markup'    => count($users),
		);
		nodejs_enqueue_message($message);

		$list = '<li role="presentation" class="nav-header dropdown-header">' . LAN_NODEJS_ONLINE_MENU_01 . '</li>';
		foreach($users as $uinfo => $row)
		{
			$sc->setVars(array(
				'user' => $row,
			));
			$list .= $tp->parseTemplate($template['MENU']['ITEM'], true, $sc);
		}

		$message = (object) array(
			'broadcast' => true,
			'callback'  => 'nodejsOnlineMenu',
			'type'      => 'nodejsOnlineMenuList',
			'markup'    => $list,
		);
		nodejs_enqueue_message($message);
	}

}
