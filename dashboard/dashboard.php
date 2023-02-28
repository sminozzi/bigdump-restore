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
echo '<div class="wrap-bugdump_restore">' . "\n";
echo '<h2 class="title">Bigdump Restore</h2>';
echo '<div class="bugdump_restore-description">';
echo esc_attr__('This Plugin can help you to restore very large database backups, building a shell (wrapping) for the highly reputed free php script "bigdump".' , "bugdump_restore");
echo '<br>';
echo esc_attr__('Then, you can do the whole restore job in friendly GUI, without make php code changes or linux commands.', "bugdump_restore");
echo '<br>';

echo '<br><strong>';
echo esc_attr__("By security, after finish the restore job, deactivate this plugin and delete the sql files from the folder below.", "bugdump-restore");
echo '</strong><br>';
echo '<br>';
echo esc_attr__("To Start to Restore Database job, go to this url:", "bugdump-restore");
echo '<br>';
echo '<b>(';
echo esc_attr__('By security, this page will be active only while this plugin is activated', 'bigdump-restore');
echo ')</b>';
echo '<br>';
echo esc_url(get_site_url()).'/bigdump-restore/bigdump-restore.php';
echo '<br>';
echo '<a href="'.esc_url(get_site_url()).'/bigdump-restore/bigdump-restore.php">Go</a>';

echo '<br>';
echo '</div>';
echo '</div>';
