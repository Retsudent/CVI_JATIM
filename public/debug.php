<?php
echo "PHP is working!<br>";
echo "Current time: " . date('Y-m-d H:i:s') . "<br>";
echo "Server: " . $_SERVER['HTTP_HOST'] . "<br>";
echo "Request URI: " . $_SERVER['REQUEST_URI'] . "<br>";

// Test include
define('FCPATH', __DIR__ . DIRECTORY_SEPARATOR);
define('ROOTPATH', realpath(FCPATH . '../') . DIRECTORY_SEPARATOR);
define('APPPATH', ROOTPATH . 'app' . DIRECTORY_SEPARATOR);

echo "APPPATH: " . APPPATH . "<br>";
echo "Layout file exists: " . (file_exists(APPPATH . 'Views/layouts/main.php') ? 'YES' : 'NO') . "<br>";
echo "Home file exists: " . (file_exists(APPPATH . 'Views/home/index.php') ? 'YES' : 'NO') . "<br>";

// Test helper
require_once APPPATH . 'Helpers/custom_helper.php';
require_once APPPATH . 'Helpers/template_helper.php';

echo "base_url(): " . base_url() . "<br>";

// Test view function
$content = view('home/index');
echo "View content length: " . strlen($content) . " characters<br>";
echo "First 200 chars: " . substr($content, 0, 200) . "...<br>";
?>
