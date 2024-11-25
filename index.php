<?php
// Início do arquivo PHP
session_start();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eita Mainha - Sobre Nós</title>
    <link rel="icon" href="icons/icon-logo.png" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/boxicons@2.1.1/css/boxicons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Parkinsans:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css?v=<?= time(); ?>">
</head>
<body>

<header class="header">
    <div class="container d-flex justify-content-between align-items-center">
        <button id="menu-button" class="menu-button"><i class="bx bx-menu"></i></button>
        <div class="logo text-center">
            <a href="index.php">
                <img src="images/logo.jpeg" alt="Logo Eita Mainha">
            </a>
        </div>
        <div class="icons d-flex align-items-center">
            <a href="login/login.php" class="icon" aria-label="Login">
                <img src="icons/usuário.png" alt="Ícone de usuário">
            </a>
            <a href="pages/cart.php" class="icon" aria-label="Carrinho">
                <img src="icons/carrinho-de-compras.png" alt="Ícone de carrinho">
            </a>
        </div>
    </div>
</header>

<!-- Novo Menu Lateral -->
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
            <a href="pages/bolos.php">
                <i class="bx bx-cake"></i>
                <span class="links_name">Bolos</span>
            </a>
        </li>
        <li>
            <a href="pages/doces.php">
                <i class="bx bx-cookie"></i>
                <span class="links_name">Doces</span>
            </a>
        </li>
        <li>
            <a href="pages/salgados.php">
                <i class="bx bx-dish"></i>
                <span class="links_name">Salgados</span>
            </a>
        </li>
        <li>
            <a href="pages/kit_festas.php">
                <i class="bx bx-party"></i>
                <span class="links_name">Kit Festas</span>
            </a>
        </li>
        <li>
            <a href="pages/bebidas.php">
                <i class="bx bx-drink"></i>
                <span class="links_name">Bebidas</span>
            </a>
        </li>
    </ul>
    <div class="social-footer">
        <div class="social-icons">
            <a href="https://facebook.com/EitaMainha" target="_blank"><img src="icons/facebook.png" alt="Facebook"></a>
            <a href="https://instagram.com/eitamainha_" target="_blank"><img src="icons/instagram.png" alt="Instagram"></a>
            <a href="https://wa.me/75992191260" target="_blank"><img src="icons/whatsapp.png" alt="WhatsApp"></a>
            <a href="https://www.ifood.com.br/delivery/eita-mainha" target="_blank"><img src="icons/ifood.png" alt="iFood"></a>
            <a href="mailto:contato@eitamainha.com" target="_blank"><img src="icons/e-mail.png" alt="E-mail"></a>
        </div>
    </div>
</div>


</div>



<main class="container my-4 d-flex justify-content-center align-items-center flex-column">
    <div class="row">
        <!-- Carrossel -->
        <div class="col-md-6 mb-4 d-flex justify-content-center">
            <div id="carouselExample" class="carousel slide" data-bs-ride="carousel" style="width: 100%;">
                <!-- Indicadores -->
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="3" aria-label="Slide 4"></button>
                    <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="4" aria-label="Slide 5"></button>
                    <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="5" aria-label="Slide 6"></button>
                    <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="6" aria-label="Slide 7"></button>
                    <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="7" aria-label="Slide 8"></button>
                </div>

                <!-- Slides -->
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="images/funcionario2.jpeg" class="d-block w-100" alt="Equipe">
                    </div>
                    <div class="carousel-item">
                        <img src="images/doces1.jpeg" class="d-block w-100" alt="Doces">
                    </div>
                    <div class="carousel-item">
                        <img src="images/doces2.jpeg" class="d-block w-100" alt="Doces">
                    </div>
                    <div class="carousel-item">
                        <img src="images/bolo1.jpeg" class="d-block w-100" alt="Bolos">
                    </div>
                    <div class="carousel-item">
                        <img src="images/bolo2.jpeg" class="d-block w-100" alt="Bolos">
                    </div>
                    <div class="carousel-item">
                        <img src="images/bolo4.jpeg" class="d-block w-100" alt="Bolos">
                    </div>
                    <div class="carousel-item">
                        <img src="images/bolo5.jpeg" class="d-block w-100" alt="Bolos">
                    </div>
                    <div class="carousel-item">
                        <img src="images/funcionario1.png" class="d-block w-100" alt="Equipe">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Anterior</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Próximo</span>
                </button>
            </div>
        </div>
        <!-- Sobre Nós -->
        <div class="col-md-6 d-flex flex-column justify-content-center">
            <h2 class="text-center">Sobre Nós</h2>
            <p class="text-justify">
                A Eita Mainha Confeitaria é sinônimo de qualidade e sabor, oferecendo produtos artesanais com um toque especial desde 2021.
                Nossa equipe é dedicada a entregar o melhor em cada criação, seja para o seu dia a dia ou para momentos especiais.
            </p>
            <p class="text-justify">
                Com receitas tradicionais e inovadoras, buscamos encantar nossos clientes a cada mordida. Seja bem-vindo à nossa confeitaria!
            </p>
        </div>
    </div>
</main>

<footer class="footer">
    <div>© <?= date("Y"); ?> Eita Mainha Confeitaria. Todos os direitos reservados.</div>
</footer>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const menuButton = document.getElementById("menu-button");
        const sidebar = document.getElementById("sidebar");
        const closeButton = document.getElementById("close-button");

        if (menuButton && sidebar) {
            menuButton.addEventListener("click", () => {
                sidebar.classList.add("active");
            });

            if (closeButton) {
                closeButton.addEventListener("click", () => {
                    sidebar.classList.remove("active");
                });
            }

            document.addEventListener("click", (event) => {
                if (!sidebar.contains(event.target) && !menuButton.contains(event.target)) {
                    sidebar.classList.remove("active");
                }
            });
        } else {
            console.error("Menu Button ou Sidebar não encontrado.");
        }
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
