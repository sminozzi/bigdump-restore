<?php
/*
Plugin Name: bigdump-restore
Description: Restore very large database backups safetly and friendly.
Version: 1.00
Text Domain: bigdump-restore
Author: Bill Minozzi
Author URI: http://billminozzi.com
License:     GPL2
# This program is free software; you can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation; either version 2 of the License, or
# (at your option) any later version.
#
# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
# GNU General Public License for more details.
#
# You should have received a copy of the GNU General Public License
# along with this program; if not, write to the Free Software
# Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
// Make sure the file is not directly accessible.
if (!defined('ABSPATH')) {
    die('We\'re sorry, but you can not directly access this file.');
}
$bigdump_restore_plugin_data = get_file_data(__FILE__, array('Version' => 'Version'), false);
$bigdump_restore_plugin_version = $bigdump_restore_plugin_data['Version'];
define('BIGDUMP_RESTORE_VERSION', $bigdump_restore_plugin_version);
define('BIGDUMP_RESTORE', plugin_dir_url(__file__));
define('BIGDUMP_RESTORE_PATH', plugin_dir_path(__file__));
define('BIGDUMP_RESTORE_IMAGES', plugin_dir_url(__file__) . 'assets/images');
define('BIGDUMP_RESTORE_URL', plugin_dir_url(__file__));
// function exist...
add_action('init', "bigdump_restore_init", 1000);
function bigdump_restore_init()
{
    if (is_admin())   
        add_management_page(
            'Bigdump Restore',
            'Bigdump Restore',
            'manage_options',
            'bigdump_restore_admin_page', // slug
            'bigdump_restore_admin_page'
        );
}
function bigdump_restore_admin_page()
{
    require_once BIGDUMP_RESTORE_PATH . "/dashboard/dashboard_container.php";
}
function bigdump_restore_settings_link($links)
{
  $settings_link = '<a href="admin.php?page=bigdump_restore_admin_page">Settings</a>';
  array_unshift($links, $settings_link);
  return $links;
}
$plugin = plugin_basename(__FILE__);
add_filter("plugin_action_links_$plugin", 'bigdump_restore_settings_link');
/**
 * Activate the plugin.
 */
function bugdump_restore_activate() { 
    $dir = ABSPATH .'/bigdump-restore/';
    try{
        if(!is_dir($dir))
           mkdir($dir);
     }
     catch(Exception $e) {
         error_log($e->getMessage());
         // wp_die($e->getMessage());
     }
    if(!is_dir($dir)){
        add_action( 'admin_notices', 'bigdump_restore_admin_error' );
    }
    try{
        fopen($dir.'index.php', 'w');
    }
     catch(Exception $e) {
         error_log($e->getMessage());
         // wp_die($e->getMessage());
    }
    $source = BIGDUMP_RESTORE_PATH .'tools/tools.txt';
    $target = ABSPATH .'/bigdump-restore/bigdump-restore.php';
    try{
        copy($source,$target);
     }
     catch(Exception $e) {
         error_log($e->getMessage());
         // wp_die($e->getMessage());
     }
     $source = BIGDUMP_RESTORE_PATH .'tools/header.txt';
     $target = ABSPATH .'/bigdump-restore/header.inc';
     try{
         copy($source,$target);
      }
      catch(Exception $e) {
          error_log($e->getMessage());
          // wp_die($e->getMessage());
      }
    $filepath = BIGDUMP_RESTORE_PATH .'bkp/bigdump.inc';
    if(file_exists($filepath)){
        $filepath_target = ABSPATH .'/bigdump-restore/bigdump.php';
        try{
            copy($filepath,$filepath_target);
         }
         catch(Exception $e) {
             error_log($e->getMessage());
             // wp_die($e->getMessage());
         }
    }
    $filepath = BIGDUMP_RESTORE_PATH .'assets/images/logo.png';
    $filepath_target = ABSPATH .'/bigdump-restore/logo.png';
    try{
        copy($filepath,$filepath_target);
     }
     catch(Exception $e) {
         error_log($e->getMessage());
         // wp_die($e->getMessage());
     }
}
register_activation_hook( __FILE__, 'bugdump_restore_activate' );
//bugdump_restore_activate();
/**
 * Deactivation hook.
 */
function bugdump_restore_deactivate() {
    $filepath = ABSPATH .'/bigdump-restore/bigdump.php';
    if(file_exists($filepath)){
        $filepath_target = BIGDUMP_RESTORE_PATH .'bkp/bigdump.inc';
        try{
            copy($filepath,$filepath_target);
            unlink($filepath);
         }
         catch(Exception $e) {
             error_log($e->getMessage());
             // wp_die($e->getMessage());
         }
    }
    $filepath = ABSPATH .'/bigdump-restore/bigdump-restore.php';
    if(file_exists($filepath)){
        try{
            unlink($filepath);
         }
         catch(Exception $e) {
             error_log($e->getMessage());
             // wp_die($e->getMessage());
         }
    }
}
register_deactivation_hook( __FILE__, 'bugdump_restore_deactivate' );
function bigdump_restore_admin_notice() {
    ?>
    <div class="notice notice-warning is-dismissible">
      <p>By security, deactivate "bigdump-restore" plugin after finish restore database job.</p>
    </div>
    <?php
}
add_action( 'admin_notices', 'bigdump_restore_admin_notice' );
function bigdump_restore_admin_error($txt) {
    ?>
    <div class="notice notice-warning is-dismissible">
      <p>Unable to Create Folder "bigdump-restore"</p>
    </div>
    <?php
}
