<?php
namespace App\Controllers;

use Core\Controller;
use Core\Database;
use Core\Pagination;

class ProductsController extends Controller {
    public function index(): void {
        $db = Database::getInstance();
        
        // Obter número total de produtos
        $totalQuery = $db->query("SELECT COUNT(*) as total FROM products");
        $total = $totalQuery->fetch(\PDO::FETCH_ASSOC)['total'];

        // Obter página atual
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $page = max(1, $page); // Garante que a página seja pelo menos 1

        // Criar objeto de paginação
        $pagination = new Pagination($total, 8, $page);

        // Buscar produtos da página atual
        $offset = $pagination->getOffset();
        $limit = $pagination->getLimit();
        
        $stmt = $db->prepare("SELECT * FROM products LIMIT ? OFFSET ?");
        $stmt->bindValue(1, $limit, \PDO::PARAM_INT);
        $stmt->bindValue(2, $offset, \PDO::PARAM_INT);
        $stmt->execute();
        
        $products = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        
        $data = [
            'title' => 'Produtos',
            'products' => $products,
            'pagination' => $pagination
        ];
        
        $this->render('products/index', $data);
    }
}