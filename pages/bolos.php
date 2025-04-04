<?php
include '../config/db.php';
session_start();

$totalItensCarrinho = 0;
if (isset($_SESSION['carrinho'])) {
    foreach ($_SESSION['carrinho'] as $item) {
        $totalItensCarrinho += $item['quantidade'];
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Êta Mainha - Bolos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="../icons/icon-logo.png" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/boxicons@2.1.1/css/boxicons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Parkinsans:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css?v=<?= time(); ?>">
    <style>
        .badge {
            font-size: 0.8rem;
            padding: 0.25em 0.4em;
            border-radius: 50%;
            display: inline-block;
            min-width: 20px;
            text-align: center;
            color: white;
            background-color: red;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
<header class="header">
    <div class="container d-flex justify-content-between align-items-center">
        <button id="menu-toggle" class="menu-button">☰ MENU</button>
        <div class="logo text-center">
            <a href="../index.php">
                <img src="../images/logo.jpeg" alt="Logo Eita Mainha">
            </a>
        </div>
        <div class="icons d-flex align-items-center">
            <a href="../login/login.php" class="icon" aria-label="Login"><img src="../icons/usuário.png" alt="Ícone de usuário"></a>
            <a href="#" id="search-icon" class="icon" aria-label="Busca"><img src="../icons/pesquisar.png" alt="Ícone de busca"></a>
            <a href="cart.php" class="icon position-relative" aria-label="Carrinho">
                <img src="../icons/carrinho-de-compras.png" alt="Ícone de carrinho">
                <?php if ($totalItensCarrinho > 0): ?>
                    <span class="badge bg-danger position-absolute top-0 start-100 translate-middle">
                        <?= $totalItensCarrinho ?>
                    </span>
                <?php endif; ?>
            </a>
        </div>
    </div>
</header>

<div class="sidebar" id="sidebar">
    <div class="logo_content">
        <div class="logo">
            <i class="bx bx-cake"></i>
            <span class="logo_name">Êta Mainha</span>
        </div>
        <i class="bx bx-x close-button" id="close-button"></i>
    </div>
    <ul class="nav_list">
        <li>
            <a href="bolos.php">
                <i class="bx bx-cake"></i>
                <span class="links_name">Bolos</span>
            </a>
        </li>
        <li>
            <a href="doces.php">
                <i class="bx bx-cookie"></i>
                <span class="links_name">Doces</span>
            </a>
        </li>
        <li>
            <a href="salgados.php">
                <i class="bx bx-dish"></i>
                <span class="links_name">Salgados</span>
            </a>
        </li>
        <li>
            <a href="kit_festas.php">
                <i class="bx bx-party"></i>
                <span class="links_name">Kit Festas</span>
            </a>
        </li>
        <li>
            <a href="bebidas.php">
                <i class="bx bx-drink"></i>
                <span class="links_name">Bebidas</span>
            </a>
        </li>
    </ul>
    <div class="social-footer">
        <div class="social-icons">
            <a href="https://facebook.com/EitaMainha" target="_blank"><img src="../icons/facebook.png" alt="Facebook"></a>
            <a href="https://instagram.com/eitamainha_" target="_blank"><img src="../icons/instagram.png" alt="Instagram"></a>
            <a href="https://wa.me/75992191260" target="_blank"><img src="../icons/whatsapp.png" alt="WhatsApp"></a>
            <a href="https://www.ifood.com.br/delivery/eita-mainha" target="_blank"><img src="../icons/ifood.png" alt="iFood"></a>
            <a href="mailto:contato@eitamainha.com" target="_blank"><img src="../icons/e-mail.png" alt="E-mail"></a>
        </div>
    </div>
</div>

<div id="search-bar" class="search-bar">
    <div class="container my-4">
        <form class="d-flex justify-content-center" method="GET" action="bolos.php">
            <input type="text" name="search" class="form-control w-50" placeholder="Pesquise..." value="<?= htmlspecialchars($_GET['search'] ?? '') ?>">
            <button class="btn btn-dark ms-2" type="submit">Pesquisar</button>
        </form>
    </div>
</div>

<section class="catalog container my-4">
    <h1 class="page-title">Bolos</h1>
    <div class="row">
        <?php
        $search = $_GET['search'] ?? '';
        $query = "
            SELECT * 
            FROM produtos 
            WHERE categoria_id = (SELECT id FROM categorias WHERE nome = 'Bolos')
            AND nome LIKE ?";
        $stmt = $conn->prepare($query);
        $search_param = '%' . $search . '%';
        $stmt->bind_param("s", $search_param);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="col-md-4 mb-4">';
                echo '<div class="card">';
                echo '<img src="' . htmlspecialchars($row['imagem_url']) . '" class="card-img-top" alt="' . htmlspecialchars($row['nome']) . '">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . htmlspecialchars($row['nome']) . '</h5>';
                echo '<p class="card-text">R$ ' . number_format($row['preco'], 2, ',', '.') . '</p>';
                echo '<p class="card-text text-muted">' . htmlspecialchars($row['descricao']) . '</p>';
                echo '<form method="POST" action="cart.php">';
                echo '<input type="hidden" name="acao" value="adicionar">';
                echo '<input type="hidden" name="produto_id" value="' . $row['id'] . '">';
                echo '<input type="hidden" name="nome" value="' . htmlspecialchars($row['nome']) . '">';
                echo '<input type="hidden" name="preco" value="' . htmlspecialchars($row['preco']) . '">';
                echo '<input type="hidden" name="imagem_url" value="' . htmlspecialchars($row['imagem_url']) . '">';
                echo '<button type="submit" class="btn btn-dark">Adicionar ao Carrinho</button>';
                echo '</form>';
            
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo '<p class="text-center">Nenhum item disponível no momento.</p>';
        }
        ?>
    </div>
</section>

<footer class="footer">
    <div>© 2024 Eita Mainha Confeitaria. Todos os direitos reservados.</div>
</footer>

<script>
    const menuToggle = document.getElementById('menu-toggle');
    const sidebar = document.getElementById('sidebar');
    const closeButton = document.getElementById('close-button');
    const searchIcon = document.getElementById('search-icon');
    const searchBar = document.getElementById('search-bar');

    menuToggle.addEventListener('click', () => {
        sidebar.classList.toggle('active');
    });

    closeButton.addEventListener('click', () => {
        sidebar.classList.remove('active');
    });

    searchIcon.addEventListener('click', (e) => {
        e.preventDefault();
        searchBar.classList.toggle('active');
    });

    document.addEventListener('click', (event) => {
        if (!sidebar.contains(event.target) && !menuToggle.contains(event.target)) {
            sidebar.classList.remove('active');
        }
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
