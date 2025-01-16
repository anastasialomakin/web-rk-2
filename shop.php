<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wardrobe - Интернет-магазин одежды</title>
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="styles/shop.css">
    <script src="scripts/shop.js" type="module"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poiret+One&display=swap" rel="stylesheet">
</head>
<body class="poiret-one-regular">

    <header class="header">
        <div class="container header-container">
            <a href="index.php" class="logo"><img src="img/content/logo.png">Wardrobe</a>
            <nav class="header-nav">
                <ul class="nav-list">
                    <li><a href="about.php">О нас</a></li>
                    <li><a href="#shop" id="active">Магазин</a></li>
                    <li><a href="#contacts">Контакты</a></li>
                </ul>
            </nav>
            <div class="auth-buttons">
                <?php
                    session_start();
                    if (isset($_SESSION['user_id'])) {
                        echo '<a href="account.php"><img src="img/account-icon.png" alt="Аккаунт" class="account-icon"></a>';
                    } else {
                        echo '<a href="login.php" class="btn btn-primary">Войти</a>';
                    }
                 ?>
            </div>
            <button class="burger-menu">
                <span class="burger-line"></span>
                <span class="burger-line"></span>
                <span class="burger-line"></span>
            </button>
        </div>
        <div class="mobile-menu">
            <nav class="mobile-nav">
                <ul class="nav-list">
                    <li><a href="about.php">О нас</a></li>
                    <li><a href="shop.php">Магазин</a></li>
                    <li><a href="contacts.php">Контакты</a></li>
                </ul>
                 <?php
                    if (isset($_SESSION['user_id'])) {
                        echo '<a href="account.php">Аккаунт</a>';
                    } else {
                        echo '<a href="login.php" class="btn btn-primary">Войти</a>';
                    }
                ?>
            </nav>
        </div>
    </header>

    <main class="main">
    <section class="shop-page">
      <div class="container shop-container">
            <div class="shop-navigation">
                <nav>
                    <ul>
                       <li><a href="#outerwear">Верхняя одежда</a></li>
                       <li><a href="#pants">Штаны и брюки</a></li>
                       <li><a href="#tshirts">Футболки и рубашки</a></li>
                       <li><a href="#hats">Головные уборы</a></li>
                    </ul>
                 </nav>
            </div>
           <div class="shop-content">
                <section data-category="outerwear" id="outerwear">
                    <h2>Верхняя одежда</h2>
                    <div class="clothes-container" id="outerwear-container"></div>
                </section>

                <section data-category="pants" id="pants">
                    <h2>Штаны и брюки</h2>
                    <div class="clothes-container" id="pants-container"></div>
                </section>

                <section data-category="tshirts" id="tshirts">
                    <h2>Футболки и рубашки</h2>
                    <div class="clothes-container" id="tshirts-container"></div>
                </section>

                <section data-category="hats" id="hats">
                    <h2>Головные уборы</h2>
                    <div class="clothes-container" id="hats-container"></div>
                </section>
           </div>
       </div>
    </section>

    <div class="cart-panel" id="cart-panel">
            <div class="cart-panel-content" id="cart-panel-content">
                <h3 style="display: flex;"><img src="img/cart.png">Товары в корзине</h3>
                <div class="cart-total">
                    <p>Общая стоимость: <span id="cart-total-price">0</span> руб.</p>
                    <p>Кол-во товаров: <span id="cart-total-qty">0</span></p>
                </div>
                <div class="cart-actions">
                    <button class="btn btn-secondary clear-cart-btn" style="font-family: 'Poiret One', serif; font-size:18px;">Сбросить заказ</button>
                    <a href="cart.php" class="btn btn-primary" style="font-size:18px;">Корзина</a>
                    <button class="btn btn-primary checkout-btn" style="font-family: 'Poiret One', serif; font-size:18px;">Перейти к оформлению</button>
                </div>
            </div>
        </div>
    </main>

    <footer class="footer">
        <div class="container footer-container">
            <div class="footer-col" id="contacts">
                <h3>Контакты</h3>
                <p>Телефон: <a href="tel:+78005353535">+7 (000) 000-00-00</a></p>
                <p>Email: <a href="email:info@wardrobe.com">info@wardrobe.com</a></p>
                <p>Адрес: ул. Пушкина, д. 11</p>
            </div>
            <div class="footer-col">
                <h3>О компании</h3>
                <a href="about.php">О нас</a>
            </div>
            <div class="footer-col">
                <h3>Покупателю</h3>
                <?php
                  if (isset($_SESSION['user_id'])) {
                        echo '<a href="cart.php">Корзина</a>';
                        echo '<a href="orders.php">Мои заказы</a>';
                        echo '<a href="account.php">Аккаунт</a>';
                    } else {
                        echo '<a href="login.php"">Войти / Зарегистрироваться</a>';
                    }
                    ?>
            </div>
        </div>
    </footer>
</body>
</html>

