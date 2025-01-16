<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wardrobe - Интернет-магазин одежды</title>
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="styles/checkout.css">
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
                    if (!isset($_SESSION['user_id'])) {
                        header('Location: login.php');
                        exit;
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
        <section class="checkout-page">
             <div class="container checkout-container">
                 <h2>Оформление заказа</h2>
                <div class="order-info">
                    <p>Всего к оплате: <span id="checkout-total-price">0</span> руб.</p>
                    <p>Количество товаров: <span id="checkout-total-qty">0</span></p>
                <a href="cart.php" style="font-family: 'Poiret One', serif; font-size:18px;" class="btn btn-secondary">Вернуться к корзине</a>
                </div>
                <div class="container form-container">
                    <form id="checkout-form">
                        <div class="form-group">
                            <label for="delivery-method">Способ доставки:</label>
                            <select id="delivery-method" required>
                                <option value="pickup" style="font-family: 'Poiret One', serif;">Самовывоз</option>
                                <option value="courier" style="font-family: 'Poiret One', serif;">Курьер</option>
                            </select>
                        </div>
                        <div class="form-group" id="address-group" style="display: none;">
                            <label for="address">Адрес доставки:</label>
                        <input type="text" id="address" style="font-family: 'Poiret One', serif; font-size:18px;" placeholder="Введите адрес доставки">
                        </div>
                        <div class="form-group">
                            <label for="payment-method">Способ оплаты:</label>
                                <select id="payment-method" required>
                                <option value="cash" style="font-family: 'Poiret One', serif;">При получении</option>
                                    <option value="card" style="font-family: 'Poiret One', serif;">Банковской картой</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="comment">Комментарий к заказу:</label>
                                <textarea id="comment" rows="4" style="font-family: 'Poiret One', serif; font-size:18px;" placeholder="Комментарий к заказу"></textarea>
                        </div>
                        <div class="form-actions">
                            <button type="reset" style="font-family: 'Poiret One', serif; font-size:18px;" class="btn btn-secondary">Сбросить</button>
                            <button type="submit" style="font-family: 'Poiret One', serif; font-size:18px;" class="btn btn-primary">Оформить заказ</button>
                        </div>
                    </form>
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

    <script src="scripts/checkout.js" type="module"></script>
</body>
</html>