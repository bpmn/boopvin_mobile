<?php
/**
* Elgg file delete
* 
* @package ElggFile
*/

$guid = (int) get_input('guid');

$file = new FilePluginFile($guid);
if (!$file->guid) {
	register_error(elgg_echo("file:deletefailed"));
	forward('file/all');
}

if (!$file->canEdit()) {
	register_error(elgg_echo("file:deletefailed"));
	forward($file->getURL());
}

$container = $file->getContainerEntity();

if (!$file->delete()) {
	register_error(elgg_echo("file:deletefailed"));
} else {
	system_message(elgg_echo("file:deleted"));
}

if (elgg_instanceof($container, 'group','wine')) {
	forward("file/wine/{$container->guid}?list_type=gallery");
        
} else {
	forward();
}
