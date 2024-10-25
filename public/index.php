<?php
declare(strict_types=1);

error_reporting(E_ALL);
ini_set('display_errors', '1');

// Autoload
spl_autoload_register(function ($class) {
    $file = dirname(__DIR__) . '/' . str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
    if (file_exists($file)) {
        require $file;
    }
});

// Inicializa o router
$router = new Core\Router();

// Define as rotas
$router->add('', ['controller' => 'Home', 'action' => 'index']); // Rota para URL vazia
$router->add('/', ['controller' => 'Home', 'action' => 'index']); // Rota para barra
$router->add('produtos', ['controller' => 'Products', 'action' => 'index']);
$router->add('produtos/(\d+)', ['controller' => 'Products', 'action' => 'view']);
$router->add('contato', ['controller' => 'Contact', 'action' => 'index']);

// Processa a URL
$url = $_SERVER['REQUEST_URI'];
$url = parse_url($url, PHP_URL_PATH);
$url = str_replace('/index.php', '', $url);
$url = trim($url, '/');

// Debug
error_log("URL processada: '" . $url . "'");

try {
    $router->dispatch($url);
} catch (\Exception $e) {
    error_log($e->getMessage());
    http_response_code(404);
    include dirname(__DIR__) . '/App/Views/404.php';
}