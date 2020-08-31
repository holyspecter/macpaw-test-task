<?php

require __DIR__.'/vendor/autoload.php';

$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/hangars/{hangar}/airplanes', '\App\Controller\AirplaneController::listByHangar');
});

// Fetch method and URI from somewhere
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        echo 'URL does not exist';
        http_response_code(404);

        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        echo 'Method is not allowed';
        http_response_code(405);

        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        list($class, $method) = explode("::", $handler, 2);
        $controller = new $class(new App\Repository\HangarRepository()); // @todo: DI container would help here :)
        $response = call_user_func_array(array($controller, $method), $vars);
        
        header('Content-Type: application/json');
        echo json_encode($response);
        http_response_code(200);

        break;
}