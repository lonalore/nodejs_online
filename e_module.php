<?php

/**
 * @file
 * This file is loaded every time the core of e107 is included. ie. Wherever
 * you see require_once("class2.php") in a script. It allows a developer to
 * modify or define constants, parameters etc. which should be loaded prior to
 * the header or anything that is sent to the browser as output. It may also be
 * included in Ajax calls.
 */

e107::lan('nodejs_online', false, true);

// Register events.
$event = e107::getEvent();
$event->register('login', 'nodejs_online_event_callback');
$event->register('logout', 'nodejs_online_event_callback');

$event->register('nodejs-user-set-online', 'nodejs_online_event_callback');
$event->register('nodejs-user-set-offline', 'nodejs_online_event_callback');

/**
 * Event callback to update online menus.
 */
function nodejs_online_event_callback()
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
