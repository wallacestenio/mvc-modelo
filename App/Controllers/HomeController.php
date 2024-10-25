<?php

namespace App\Controllers;

use Core\Controller;

class HomeController extends Controller {
    public function index(): void {
        $data = [
            'title' => 'Página Inicial',
            'content' => 'Bem-vindo ao nosso site!'
        ];
        $this->render('home/index', $data);
    }
}