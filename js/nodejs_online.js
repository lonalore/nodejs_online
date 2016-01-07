var e107 = e107 || {'settings': {}, 'behaviors': {}};

(function ($)
{

	e107.Nodejs.callbacks.nodejsOnlineMenu = {
		callback: function (message)
		{
			switch(message.type)
			{
				case "nodejsOnlineMenuBadge":
					if(parseInt(message.markup) > 0)
					{
						$('#nodejs-online-menu-dropdown a.dropdown-toggle span.badge').html(message.markup).show();
					}
					else
					{
						$('#nodejs-online-menu-dropdown a.dropdown-toggle span.badge').html('').hide();
					}
					break;

				case "nodejsOnlineMenuList":
					if(message.markup)
					{
						$('#nodejs-online-menu-dropdown .dropdown-menu').html(message.markup);
					}
					break;
			}
		}
	};

}(jQuery));
