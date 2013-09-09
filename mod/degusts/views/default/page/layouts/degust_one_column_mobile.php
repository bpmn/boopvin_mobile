<?php
/**
 * Elgg one-column layout pour fiche de dégustation mobile
 *
 * @package Elgg
 * @subpackage Core
 *
 * @uses $vars['content'] Content string
 * @uses $vars['class']   Additional class to apply to layout
 */
//$class = 'elgg-layout degust-layout-one-sidebar clearfix';
//MOBILE
if (isset($vars['class'])) {
    $class = "$class {$vars['class']}";
}

// navigation defaults to breadcrumbs
$nav = elgg_extract('nav', $vars, elgg_view('navigation/breadcrumbs'));
?>
<div class="<?php echo $class; ?>">
    <div class="degust-main">

       
<?php echo $vars['tab1']; ?>


    </div>   
</div>
