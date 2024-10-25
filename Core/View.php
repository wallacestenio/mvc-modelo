<?php

namespace Core;

class View {
    public function render(string $view, array $data = []): void {
        extract($data);
        
        $viewFile = dirname(__DIR__) . "/App/Views/$view.php";
        $layoutFile = dirname(__DIR__) . "/App/Views/layouts/main.php";
        
        if (file_exists($viewFile)) {
            ob_start();
            require $viewFile;
            $content = ob_get_clean();
            
            if (file_exists($layoutFile)) {
                require $layoutFile;
            } else {
                echo $content;
            }
        } else {
            throw new \Exception("View file $viewFile not found");
        }
    }
}