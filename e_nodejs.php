<?php

/**
 * @file
 * NodeJS implementations.
 */


/**
 * Class nodejs_online_nodejs.
 */
class nodejs_online_nodejs
{

	/**
	 * Node.js message handlers.
	 *
	 * @return array
	 *    The list of message callbacks.
	 */
	public function msgHandlers()
	{
		return array();
	}


	/**
	 * Node.js user channels.
	 *
	 * @return array
	 *    The list of user channels.
	 */
	public function userChannels()
	{
		return array(// 'nodejs_notify_',
		);
	}


	/**
	 * Node.js user presence list.
	 *
	 * @param $account
	 *
	 * @return array
	 *    List of users who can see presence notifications about me.
	 */
	public function userPresenceList($account)
	{
		return array();
	}

}
