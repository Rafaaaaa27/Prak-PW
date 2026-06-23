<?php
// ===================================================
// Front Controller - Entry Point / Pintu masuk aplikasi
// Semua request diarahkan ke sini via .htaccess
// ===================================================

session_start();

define('BASE_PATH',   __DIR__);
define('APP_PATH',    BASE_PATH . '/app');
define('CLASSES_PATH', BASE_PATH . '/classes');
// define('ASSETS_URL',  '/assets'); // Hapus jika tidak dipakai


// Base URL — sesuaikan jika project ada di subfolder
// Contoh: '/php-mvc-project/'
// Base URL — deteksi otomatis subfolder
$baseUrl = str_replace("index.php", "", $_SERVER['SCRIPT_NAME']);
define('BASE_URL', $baseUrl);


// Autoload: Controllers + Classes
spl_autoload_register(function ($class) {
    $paths = [
        APP_PATH    . '/controllers/' . $class . '.php',
        CLASSES_PATH . '/' . $class . '.php',
    ];
    foreach ($paths as $path) {
        if (file_exists($path)) {
            require_once $path;
            return;
        }
    }
});

// Router sederhana: index.php?url=controller/method/params
$url = isset($_GET['url'])
    ? explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL))
    : [];

$controllerName = !empty($url[0]) ? ucfirst(strtolower($url[0])) . 'Controller' : 'DashboardController';
$method         = !empty($url[1]) ? $url[1] : 'index';
$params         = array_slice($url, 2);

$controllerFile = APP_PATH . '/controllers/' . $controllerName . '.php';

if (file_exists($controllerFile)) {
    require_once $controllerFile;
    $controller = new $controllerName();

    if (method_exists($controller, $method)) {
        call_user_func_array([$controller, $method], $params);
    } else {
        require_once APP_PATH . '/controllers/DashboardController.php';
        (new DashboardController())->notFound();
    }
} else {
    require_once APP_PATH . '/controllers/DashboardController.php';
    (new DashboardController())->notFound();
}
