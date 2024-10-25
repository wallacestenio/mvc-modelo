<div class="product-details">
    <?php if ($product): ?>
        <h1><?= htmlspecialchars($product['name']) ?></h1>
        <div class="product-info">
            <p class="description"><?= htmlspecialchars($product['description']) ?></p>
            <p class="price">R$ <?= number_format($product['price'], 2, ',', '.') ?></p>
        </div>
        <a href="/index.php/produtos" class="btn">Voltar para Produtos</a>
    <?php else: ?>
        <p>Produto não encontrado.</p>
        <a href="/index.php/produtos" class="btn">Voltar para Produtos</a>
    <?php endif; ?>
</div>