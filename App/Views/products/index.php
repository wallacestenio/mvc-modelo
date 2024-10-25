<div class="products">
    <h1><?= $title ?></h1>
    
    <?php if (!empty($products)): ?>
        <div class="products-grid">
            <?php foreach ($products as $product): ?>
                <div class="product-card">
                    <h2><?= htmlspecialchars($product['name']) ?></h2>
                    <p><?= htmlspecialchars($product['description']) ?></p>
                    <p class="price">R$ <?= number_format($product['price'], 2, ',', '.') ?></p>
                    <a href="/index.php/produtos/<?= $product['id'] ?>" class="btn">Ver Detalhes</a>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Paginação -->
        <div class="pagination">
            <?php if ($pagination->hasPreviousPage()): ?>
                <a href="/index.php/produtos?page=<?= $pagination->getPreviousPage() ?>" class="btn-page">&laquo; Anterior</a>
            <?php endif; ?>

            <?php foreach ($pagination->getPageNumbers() as $pageNum): ?>
                <?php if ($pageNum === '...'): ?>
                    <span class="ellipsis">...</span>
                <?php else: ?>
                    <a href="/index.php/produtos?page=<?= $pageNum ?>" 
                       class="btn-page <?= $pageNum === $pagination->getCurrentPage() ? 'active' : '' ?>">
                        <?= $pageNum ?>
                    </a>
                <?php endif; ?>
            <?php endforeach; ?>

            <?php if ($pagination->hasNextPage()): ?>
                <a href="/index.php/produtos?page=<?= $pagination->getNextPage() ?>" class="btn-page">Próxima &raquo;</a>
            <?php endif; ?>
        </div>
    <?php else: ?>
        <p>Nenhum produto encontrado.</p>
    <?php endif; ?>
</div>

<!-- Adicione estes estilos ao seu layout principal (App/Views/layouts/main.php) dentro da tag <style> -->
<style>
    /* ... (estilos anteriores) ... */

    .products-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 2rem;
        margin-bottom: 2rem;
    }

    .product-card {
        border: 1px solid #ddd;
        padding: 1rem;
        border-radius: 4px;
        background: white;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        transition: transform 0.2s;
    }

    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 8px rgba(0,0,0,0.2);
    }

    .pagination {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 0.5rem;
        margin: 2rem 0;
        flex-wrap: wrap;
    }

    .btn-page {
        display: inline-block;
        padding: 0.5rem 1rem;
        background: #f5f5f5;
        color: #333;
        text-decoration: none;
        border-radius: 4px;
        transition: background-color 0.2s;
    }

    .btn-page:hover {
        background: #e0e0e0;
    }

    .btn-page.active {
        background: #333;
        color: white;
    }

    .ellipsis {
        padding: 0.5rem;
        color: #666;
    }

    @media (max-width: 768px) {
        .products-grid {
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        }
        
        .pagination {
            padding: 0 1rem;
        }
    }
</style>