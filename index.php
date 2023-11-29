<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cupcake";

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./assets/icon-cupcake.png" type="image/x-icon">
    <link rel="stylesheet" href="./app/scss/style.css">
    <title>Que Cake</title>

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />

  </head>
  <body>
    <!-- HEADER -->
    <header>
      <div class="header-inner container">
        <a href="#" class="logo"><span class="txt-main-second">Que</span> Cake</a>
        <div class="mobile-toggle">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);">
            <path d="M4 6h16v2H4zm4 5h12v2H8zm5 5h7v2h-7z"></path>
          </svg>
        </div>
        <ul class="nav">        
          <li><a href="login.php"><svg aria-hidden="true" focusable="false" role="presentation" class="icon icon-user" viewBox="0 0 64 64"><defs><style>.cls-1{fill:none;stroke:#000;stroke-miterlimit:10;stroke-width:2px}</style></defs><path class="cls-1" d="M35 39.84v-2.53c3.3-1.91 6-6.66 6-11.42 0-7.63 0-13.82-9-13.82s-9 6.19-9 13.82c0 4.76 2.7 9.51 6 11.42v2.53c-10.18.85-18 6-18 12.16h42c0-6.19-7.82-11.31-18-12.16z"></path></svg>Login</a></li>
          <li class="active"><a href="#">Home</a></li>
          <li><a href="#menu">Menu</a></li>
          <li><a href="#about">Sobre</a></li>
          <li><a href="#">Pedidos</a></li>
        </ul>
      </div>
    </header>
    <!-- END HEADER -->

    <!-- HERO SLIDER -->
    <div class="hero">
      <div class="container">
        <div class="swiper">
          <div class="swiper-wrapper">
            <!-- slide -->
            <div class="swiper-slide">
              <div class="hero__slide">
                <div class="hero__slide__txt">
                  Cheese
                </div>
                <div class="hero__slide__img">
                  <img src="./assets/cupcake (6).png" alt="">
                  <button class="btn btn-right" data-speed="-5">R$4.50</button>
                  <button class="btn btn-left" data-speed="-5">Add ao carrinho</button>
                </div>
              </div>
            </div>  
            <!-- end slide -->
             <!-- slide -->
             <div class="swiper-slide">
              <div class="hero__slide">
                <div class="hero__slide__txt">
                  Blueberry
                </div>
                <div class="hero__slide__img">
                  <img src="./assets/cupcake (1).png" alt="">
                  <button class="btn btn-right" data-speed="-5">R$7.25</button>
                  <button class="btn btn-left" data-speed="-5">Add ao carrinho</button>
                </div>
              </div>
            </div>
            <!-- end slide -->
            <!-- slide -->  
            <div class="swiper-slide">
              <div class="hero__slide">
                <div class="hero__slide__txt">
                  Chocolate
                </div>
                <div class="hero__slide__img">
                  <img src="./assets/cupcake (3).png" alt="">
                  <button class="btn btn-right" data-speed="-5">R$5.30</button>
                  <button class="btn btn-left" data-speed="-5">Add ao carrinho</button>
                </div>
              </div>
            </div>
            <!-- end slide -->
            <!-- slide -->
            <div class="swiper-slide">
              <div class="hero__slide">
                <div class="hero__slide__txt">
                  Morango
                </div>
                <div class="hero__slide__img">
                  <img src="./assets/cupcake (2).png" alt="">
                  <button class="btn btn-right" data-speed="-5">R$6.00</button>
                  <button class="btn btn-left" data-speed="-5">Add ao carrinho</button>
                </div>
              </div>
            </div>
            <!-- end slide -->
            <!-- slide -->
            <div class="swiper-slide">
              <div class="hero__slide">
                <div class="hero__slide__txt">
                  Caramelo
                </div>
                <div class="hero__slide__img">
                  <img src="./assets/cupcake (5).png" alt="">
                  <button class="btn btn-right" data-speed="-5">R$4.80</button>
                  <button class="btn btn-left" data-speed="-5">Add ao carrinho</button>
                </div>
              </div>
            </div>
            <!-- end slide -->
          </div>
          <div class="swiper-pagination"></div>
        </div>
      </div>
    </div>
    <!-- FIM HERO SLIDER -->

    <!-- MAIS VENDIDOS -->
<div class="section" id="menu">
   <div class="container">
      <div class="section__header">
         <span class="txt-main-second">Os Queridinhos!</span>
      </div>
      <div class="section__content">
         <div class="product-grid">
            <?php
            $sql = "SELECT * FROM itens";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
            ?>
                  <div class="product-card">
                     <div class="product-card__img">
                        <img src="<?php echo $row['imagem']; ?>" alt="">
                        <div class="btn-wraper">
                           <button class="btn btn-small">Add ao carrinho</button>
                        </div>
                     </div>
                     <div class="product-card__price">R$<?php echo $row['preco']; ?></div>
                     <div class="product-card__name"><?php echo $row['nome']; ?></div>
                  </div>
            <?php
                }
            } else {
                echo "Sem cupcakes cadastrados";
            }

            // Fecha a conexão
            $conn->close();
            ?>
         </div>
      </div>
   </div>
</div>
<!-- FIM MAIS VENDIDOS -->

    <!-- SOBRE -->
    <div class="section" id="about">
      <div class="container">
        <div class="about">
          <div class="about__img">
            <img src="./assets/cupcake (8).png" alt="">
          </div>
          <div class="about__info">
            <div class="section__header"><span class="txt-main-second">Bem Vindo</span></div>
            <h2 class="about__info__title"><span class="txt-main-second">Que</span> <span class="txt-main">Cake</span></h2>
            <p class="about__info__description">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum
            </p>
            <div class="about__info__btn">
              <button class="btn btn-left">Saiba Mais</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- FIM SOBRE -->

    <!-- FOOTER SECTION -->
    <div class="section section__footer" id="footer">
      <div class="container">
        <div class="footer">
          <div class="footer__img">
            <img src="./assets/cupcake (1).jpg" alt="">
          </div>
          <div class="footer__menus">
            <ul class="footer__menus__col">
              <h3 class="txt-main">Ajuda & Informações</h3>
              <li><a href="#about">Sobre</a></li>
              <li><a href="#">Politica de Privacidade</a></li>
              <li><a href="#">Termos & Condições</a></li>
              <li><a href="#">Retorno do Produto</a></li>
            </ul>
            <ul class="footer__menus__col">
              <h3 class="txt-main">Sobre Nós</h3>
              <li><a href="#">Contatos</a></li>              
              <li><a href="#">Acessórios</a></li>
              <li><a href="#">Termos de Uso</a></li>
            </ul>
            <ul class="footer__menus__col">
              <h3 class="txt-main">Produtos</h3>
              <li><a href="#">Cupcakes</a></li>
              <li><a href="#">Cookies</a></li>
            </ul>
            <div class="company"><span class="txt-main-second">Que <span class="txt-main">Cake </span>&copy;2023</span></div>
            <img src="./assets/cupcake (5).png" alt="">
          </div>
        </div>
      </div>
    </div>
    <!-- END FOOTER SECTION -->

    <div class="mobile-overlay"></div>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

    <!-- App JS -->
    <script src="./app/js/app.js"></script> 
  </body>
</html>