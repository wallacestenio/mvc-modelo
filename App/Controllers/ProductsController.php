<?php

namespace App\Controllers;

use Core\Controller;
use Core\Database;

class ProductsController extends Controller {
    public function index(): void {
        $db = Database::getInstance();
        $stmt = $db->query("SELECT * FROM products");
        $products = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        
        $data = [
            'title' => 'Produtos',
            'products' => $products
        ];
        $this->render('products/index', $data);
    }

    public function view(): void {
        $url_parts = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
        $id = end($url_parts);
        
        if ($id && is_numeric($id)) {
            $db = Database::getInstance();
            $stmt = $db->prepare("SELECT * FROM products WHERE id = ?");
            $stmt->execute([$id]);
            $product = $stmt->fetch(\PDO::FETCH_ASSOC);
            
            $data = [
                'title' => $product ? $product['name'] : 'Produto não encontrado',
                'product' => $product
            ];
            $this->render('products/view', $data);
        }
    }
}
