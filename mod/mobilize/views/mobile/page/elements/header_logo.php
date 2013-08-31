<?php
/**
 * Elgg header logo
 *     <img src="<?php echo $logo_url; ?>">

 */

$site = elgg_get_site_entity();
$site_name = $site->name;
$site_url = elgg_get_site_url();
$logo_url = $site_url . "mod/winetheme/views/default/css/winetheme/images/logo_short.png";

$showlogo = elgg_get_plugin_setting('showlogo', 'mobilize');

if ($showlogo == 'yes'){

?>

<a class="elgg-heading-site" href="<?php echo $site_url; ?>"><img src="<?php echo $logo_url; ?>" alt="<?php echo $site_name; ?>" /></a>

<?php } else { ?>



<?php

}