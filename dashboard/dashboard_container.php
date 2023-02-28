<?php
/**
 * @ Author: Bill Minozzi
 * @ Copyright: 2022 www.BillMinozzi.com
 * Created: 2023 - Jan 16 23
 * 
 */
if (!defined('ABSPATH')) {
  die('We\'re sorry, but you can not directly access this file.');
}
?>
<div id="easy-update-urls-logo">
  <h3>Bigdump Restore </h3>
</div>
<?php
if (isset($_GET['tab']))
  $active_tab = sanitize_text_field($_GET['tab']);
else
  $active_tab = 'dashboard';
?>
<h2 class="nav-tab-wrapper">
  <a href="tools.php?page=bigdump_restore_admin_page&tab=dashboard" class="nav-tab">Dashboard</a>
</h2>
<?php
  require_once(esc_attr(BIGDUMP_RESTORE_PATH) . 'dashboard/dashboard.php');
