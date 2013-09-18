<?php
/**
 * Delete blog entity
 *
 * @package Blog
 */

$degust_guid = get_input('guid');
$degust = get_entity($degust_guid);
$page_owner_guid=get_input('page_owner_guid');
$page_owner_entity = get_entity($page_owner_guid);


$options = array(
                 'type' => 'object',
                 'subtype' => 'degust',
                 'limit' => 10,
                 'full_view' => false,
                 'pagination' => true,
         );
//MOBILE
if (elgg_instanceof($page_owner_entity,'user')){
   $options['owner_guid'] =$page_owner_guid;
   $url=$page_owner_entity->getURL();
}else{
   $options['container_guid'] =$degust->getContainerGUID(); 
   $url=$degust->getContainerEntity()->getURL();
}

if (elgg_instanceof($degust, 'object', 'degust') && ($degust->canEdit())) {
	
	if ($degust->delete()) {
		system_message(elgg_echo('degust:message:deleted'));
		//if (elgg_instanceof($container, 'group')) {
		//	forward("wine/$container->guid");
                //}
                
                
                //MOBILE
                
                $list_degust=elgg_list_entities($options);
                $result=array("list_degust"=>$list_degust,"url"=>$url);
                echo json_encode($result);
                exit;
                
                //forward(REFERER);
	} else {
		register_error(elgg_echo('degust:error:cannot_delete'));
	}
} else {
	register_error(elgg_echo('degust:error:degust_not_found'));
}


