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
    <?php else: ?>
        <p>Nenhum produto encontrado.</p>
    <?php endif; ?>
</div>