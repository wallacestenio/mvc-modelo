<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Meu Site' ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            line-height: 1.6;
        }
        header {
            background: #333;
            color: white;
            padding: 1rem;
        }
        nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        nav ul li {
            display: inline;
            margin-right: 1rem;
        }
        nav ul li a {
            color: white;
            text-decoration: none;
        }
        main {
            padding: 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }
        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 2rem;
        }
        .product-card {
            border: 1px solid #ddd;
            padding: 1rem;
            border-radius: 4px;
        }
        .btn {
            display: inline-block;
            padding: 0.5rem 1rem;
            background: #333;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }
        footer {
            background: #333;
            color: white;
            text-align: center;
            padding: 1rem;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="/index.php">Home</a></li>
                <li><a href="/index.php/produtos">Produtos</a></li>
                <li><a href="/index.php/contato">Contato</a></li>
            </ul>
        </nav>
    </header>
    
    <main>
        <?= $content ?>
    </main>
    
    <footer>
        <p>&copy; <?= date('Y') ?> Meu Site. Todos os direitos reservados.</p>
    </footer>
</body>
</html>