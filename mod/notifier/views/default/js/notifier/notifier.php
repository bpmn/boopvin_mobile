// <script>
elgg.provide('elgg.notifier');

/**
 * Repositions the notifier popup
 *
 * @param {String} hook    'getOptions'
 * @param {String} type    'ui.popup'
 * @param {Object} params  An array of info about the target and source.
 * @param {Object} options Options to pass to
 *
 * @return {Object}
 */
elgg.ui.notifierPopupHandler = function(hook, type, params, options) {
	if (params.target.hasClass('elgg-notifier-popup')) {
		options.my = 'left top';
		options.at = 'left bottom';
		return options;
	}
	return null;
};

/**
 * Dismiss all unread notifications and then remove related UI elements.
 * 
 * @param {Object} e
 * @return void
 */
elgg.notifier.dismissAll = function(e) {
	elgg.action($(this).attr('href'), {
		success: function() {
			// Remove markings from notification list
			$('.elgg-notifier-unread').each(function() {
				$(this).removeClass('elgg-notifier-unread');
			});
			// Remove notification count from topbar icon
			$('#notifier-new').remove();
			// Remove "Dismiss all" button
			$('#notifier-dismiss-all').remove();
		}
	});

	e.preventDefault();
};

elgg.notifier.init = function() {
	$('#notifier-dismiss-all').live('click', elgg.notifier.dismissAll);
};

elgg.register_hook_handler('getOptions', 'ui.popup', elgg.ui.notifierPopupHandler);
elgg.register_hook_handler('init', 'system', elgg.notifier.init);