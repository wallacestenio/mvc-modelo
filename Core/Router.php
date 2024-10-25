<?php
namespace Core;

class Router {
    private array $routes = [];
    private array $params = [];

    public function add(string $route, array $params = []): void {
        // Trata a rota raiz de forma especial
        if ($route === '/') {
            $route = '^$';
        } else {
            // Converte as variáveis da rota
            $route = str_replace(['/', '{', '}'], ['\/', '(?P<', '>[^\/]+)'], $route);
            $route = '^' . $route . '$';
        }
        $this->routes[$route] = $params;
    }

    public function match(string $url): bool {
        // Debug das rotas (opcional - remover em produção)
        // error_log("Tentando combinar URL: " . $url);
        // error_log("Rotas disponíveis: " . print_r($this->routes, true));

        foreach ($this->routes as $route => $params) {
            if (preg_match('/' . $route . '/', $url, $matches)) {
                foreach ($matches as $key => $match) {
                    if (is_string($key)) {
                        $params[$key] = $match;
                    }
                }
                $this->params = $params;
                return true;
            }
        }
        return false;
    }

    public function dispatch(string $url): void {
        if ($this->match($url)) {
            $controller = $this->params['controller'];
            $controller = "App\\Controllers\\{$controller}Controller";

            if (class_exists($controller)) {
                $controller_object = new $controller($this->params);
                $action = $this->params['action'];

                if (method_exists($controller_object, $action)) {
                    $controller_object->$action();
                } else {
                    throw new \Exception("Method $action not found in controller $controller");
                }
            } else {
                throw new \Exception("Controller class $controller not found");
            }
        } else {
            throw new \Exception("No matching route for URL: $url");
        }
    }

    public function getParams(): array {
        return $this->params;
    }
}