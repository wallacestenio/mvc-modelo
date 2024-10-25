<?php

namespace Core;

abstract class Controller {
    protected array $params;
    protected View $view;

    public function __construct(array $params) {
        $this->params = $params;
        $this->view = new View();
    }

    protected function render(string $view, array $data = []): void {
        $this->view->render($view, $data);
    }
}