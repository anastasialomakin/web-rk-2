<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wardrobe - Интернет-магазин одежды</title>
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="styles/index.css">
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
                    <li><a href="shop.php">Магазин</a></li>
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
         <section class="hero">
            <div class="hero-content">
                <h1>Обновите свой гардероб!</h1>
                <a href="shop.php" class="btn btn-primary">Перейти к покупкам</a>
            </div>
        </section>

        <section class="new-arrivals">
             <h2>Новинки в этом месяце</h2>
              <div class="slider-container">
                <div class="slider-wrapper">
                    <?php
                        $json_data = file_get_contents('data.json');
                        $products = json_decode($json_data, true);
                        foreach ($products as $product) {
                           if ($product['isNew']) {
                                echo '<div class="slide">';
                                echo '<div class="product-card">';
                                echo '<img src="' . $product['image'] . '" alt="' . $product['name'] . '">';
                                echo '<h3 class="product-card-title">' . $product['name'] . '</h3>';
                                echo '<p class="product-card-price">' . $product['price'] . ' руб.</p>';
                                echo '<a href="product.php?id=' . $product['id'] . '" class="btn btn-primary">Подробнее</a>';
                                echo '</div>';
                                echo '</div>';
                            }
                        }
                    ?>
                </div>
                <button class="slider-prev"><</button>
                <button class="slider-next">></button>
             </div>
        </section>

        <section class="subscribe-section">
            <div class="container">
                <div class="subscribe-content">
                    <div class="subscribe-text">
                        <h2>Подпишитесь на рассылку, чтобы получить скидку в 10%!</h2>
                        <p>Будьте в курсе наших последних новинок и специальных предложений.</p>
                    </div>
                    <div class="subscribe-form">
                        <form>
                            <input type="email" placeholder="Ваш email" style="font-family: 'Poiret One', serif; font-size:18px;" required>
                            <label class="checkbox-container">
                                <input type="checkbox" required>
                                <span class="checkmark"></span>
                                Принимаю пользовательское соглашение и политику конфиденциальности
                            </label>
                            <button type="submit" class="btn btn-primary" style="font-family: 'Poiret One', serif; font-size:18px;">Подписаться</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
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
                        echo '<a href="login.php">Войти / Зарегистрироваться</a>';
                    }
                    ?>
            </div>
        </div>
    </footer>
    <script src="scripts/script.js" type="module"></script>
</body>
</html>