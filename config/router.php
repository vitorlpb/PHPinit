<?php

$routes = [
    'send-text' => [
        'type' => 'POST',
        'view_file_path' => 'view/send-text.php'
    ],
    'send-number' => [
        'type' => 'GET',
        'view_file_path' => 'view/send-number.php'
    ],
];

$requested_route = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

function isRouteValid(string $route): bool
{
    global $routes;
    return isset($routes[$route]);
}

if (!isRouteValid($requested_route)) {
    http_response_code(404);
    echo "Rota não encontrada.";
    exit;
}

$routeInfo = $routes[$requested_route];

if ($_SERVER['REQUEST_METHOD'] !== $routeInfo['type']) {
    http_response_code(405);
    echo "Método não permitido.";
    exit;
}

$viewFile = realpath(__DIR__ . '/../' . $routeInfo['view_file_path']);

if (!$viewFile || !file_exists($viewFile)) {
    http_response_code(500);
    echo "Arquivo de view não encontrado.";
    exit;
}

require_once $viewFile;
exit;
