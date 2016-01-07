<?php

/**
 * @file
 * Class installations to handle configuration forms on Admin UI.
 */

require_once('../../class2.php');

if(!getperms('P'))
{
	header('location:' . e_BASE . 'index.php');
	exit;
}

// [PLUGINS]/nodejs_online/languages/[LANGUAGE]/[LANGUAGE]_admin.php
e107::lan('nodejs_online', true, true);


/**
 * Class nodejs_online_admin.
 */
class nodejs_online_admin extends e_admin_dispatcher
{

	protected $modes = array(
		'main' => array(
			'controller' => 'nodejs_online_admin_ui',
			'path'       => null,
		),
	);

	protected $adminMenu = array(
		'main/prefs' => array(
			'caption' => LAN_NODEJS_ONLINE_ADMIN_01,
			'perm'    => 'P',
		),
	);

	protected $menuTitle = LAN_PLUGIN_NODEJS_ONLINE_NAME;

}


/**
 * Class nodejs_online_admin.
 */
class nodejs_online_admin_ui extends e_admin_ui
{

}


new nodejs_online_admin();

require_once(e_ADMIN . "auth.php");
e107::getAdminUI()->runPage();
require_once(e_ADMIN . "footer.php");
exit;
