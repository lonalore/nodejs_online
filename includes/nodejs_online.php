<?php

/**
 * @file
 * Common functions.
 */


/**
 * Get online users.
 */
function nodejs_online_get_online_users()
{
	$db = e107::getDb();

	$query = 'SELECT u.* FROM #online AS o ';
	$query .= 'LEFT JOIN #user AS u ON SUBSTRING_INDEX(o.online_user_id,".",1) = u.user_id ';
	$query .= 'WHERE online_user_id != 0 ';
	$query .= 'ORDER BY u.user_name ASC ';
	$db->gen($query);

	$users = array();
	while($row = $db->fetch())
	{
		if(!isset($users[$row['user_id']]))
		{
			$users[$row['user_id']] = $row;
		}
	}

	return $users;
}
