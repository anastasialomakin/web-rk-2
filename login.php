<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wardrobe - Интернет-магазин одежды</title>
    <link rel="stylesheet" href="styles/main.css">
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
        <section class="auth-page">
          <div class="container auth-container">
              <h2>Вход в аккаунт</h2>
            <form method="post" action="php/auth.php">
                <input type="hidden" name="action" value="login">
                <input type="text" name="login" placeholder="Логин или email" style="font-family: 'Poiret One', serif; font-size:18px;" required>
                <input type="password" name="password" placeholder="Пароль" style="font-family: 'Poiret One', serif; font-size:18px;" required>
                  <?php
                    if (isset($_GET['error'])) {
                    echo '<p class="error-message">Неверный логин или пароль</p>';
                }
                ?>
                <button type="submit" style="font-family: 'Poiret One', serif; font-size:18px;" class="btn btn-primary">Войти</button>
                  <a href="register.php" class="btn btn-secondary" style="font-size:18px;">Создать аккаунт</a>
            </form>
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

    <script src="js/script.js"></script>
</body>
</html>