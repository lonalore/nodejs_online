<?php

/**
 * @file
 * Templates for plugins displays.
 */

$NODEJS_ONLINE_TEMPLATE['MENU']['HEADER'] = '
<ul class="nav navbar-nav navbar-right nodejs-online-menu-dropdown" id="nodejs-online-menu-dropdown">
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="NodeJSOnlineMenuDropdown">
            <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
            <span class="badge">{ONLINE_USER_COUNT}</span>
            <b class="caret"></b>
        </a>
        <ul class="dropdown-menu scrollable-menu" role="menu" aria-labelledby="NodeJSOnlineMenuDropdown">
            <li role="presentation" class="nav-header dropdown-header">{ONLINE_USER_HEADER}</li>
';

$NODEJS_ONLINE_TEMPLATE['MENU']['ITEM'] = '
            <li role="presentation">
                {ONLINE_USER}
            </li>
';

$NODEJS_ONLINE_TEMPLATE['MENU']['FOOTER'] = '
        </ul>
    </li>
</ul>
';
