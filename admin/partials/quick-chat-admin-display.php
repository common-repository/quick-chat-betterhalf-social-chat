<?php
/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://peacefulqode.com/
 * @since      1.0.0
 *
 * @package    Quick_Chat
 * @subpackage Quick_Chat/admin/partials
 */

?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<div class="quick-chat-dashboard-tabs">

<ul class="tabs">
	<li class="tab-link current" data-tab="tab-0">registered</li>
	<li class="tab-link " data-tab="tab-1">style</li>

</ul>

<div id="tab-0" class="tab-content current">
	<?php require plugin_dir_path( __FILE__ ) . 'template/registered.php'; ?>
</div>

<div id="tab-1" class="tab-content">
<?php require plugin_dir_path( __FILE__ ) . 'template/style.php'; ?>
</div>


</div>
