<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eita Mainha - Sobre Nós</title>
    <link rel="icon" href="icons/icon-logo.png" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
    
</head>
<body>

    <header class="header">
        <div class="container d-flex justify-content-between align-items-center">
            <button id="menu-button" class="menu-button">☰ MENU</button>
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


    <div id="side-menu" class="side-menu">
    <button class="close-button">&times;</button>
    <div>
            <h3>Categorias</h3>
            <ul class="menu-links">
                <li><a href="pages/bolos.php">Bolos</a></li>
                <li><a href="pages/doces.php">Doces</a></li>
                <li><a href="pages/salgados.php">Salgados</a></li>
                <li><a href="pages/kit_festas.php">Kit Festas</a></li>
                <li><a href="pages/bebidas.php">Bebidas</a></li>
            </ul>
        </div>
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

<main class="container my-4">
    <div class="row">
        <!-- Carrossel -->
        <div class="col-md-6">
            <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                <!-- Indicadores -->
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="3" aria-label="Slide 4"></button>
                    <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="4" aria-label="Slide 5"></button>
                    <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="5" aria-label="Slide 6"></button>
                    <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="6" aria-label="Slide 7"></button>
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

                <!-- Controles -->
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
        <div>© 2024 Eita Mainha Confeitaria. Todos os direitos reservados.</div>
    </footer>


    <script>

            var myCarousel = document.querySelector('#carouselExample');
    var carousel = new bootstrap.Carousel(myCarousel, {
        interval: 2000, // Tempo entre os slides (em ms)
        wrap: true // Ativa o loop infinito
    });
        
        const menuButton = document.getElementById('menu-button');
        const sideMenu = document.getElementById('side-menu');
        const closeButton = document.querySelector('.close-button');

        menuButton.addEventListener('click', () => {
            sideMenu.classList.toggle('active');
        });

        closeButton.addEventListener('click', () => {
            sideMenu.classList.remove('active');
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
