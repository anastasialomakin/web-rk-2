<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wardrobe - Интернет-магазин одежды</title>
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="styles/about.css">
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
                    <li><a href="#about" id="active">О нас</a></li>
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
      <section class="about-hero">
          <div class="container about-hero-container">
            <div class="about-hero-text">
              <h1>О компании Wardrobe</h1>
              <p>Мы - ваш надежный партнер в мире моды. Мы предлагаем стильную и качественную одежду для всех.</p>
              </div>
            <div class="about-hero-img">
              <img src="img/about-img.png" alt="О компании">
            </div>
           </div>
        </section>
        <section class="about-features">
          <div class="container about-features-container">
            <h2>Почему выбирают Wardrobe</h2>
              <div class="feature">
                 <img src="img/quality.png" alt="Качество">
                  <h3>Высокое качество</h3>
                  <p>Мы тщательно отбираем материалы и следим за качеством каждого изделия.</p>
              </div>
              <div class="feature">
                  <img src="img/style.png" alt="Стиль">
                  <h3>Современный стиль</h3>
                  <p>Наши коллекции соответствуют последним модным тенденциям.</p>
              </div>
              <div class="feature">
                  <img src="img/range.png" alt="Ассортимент">
                  <h3>Широкий ассортимент</h3>
                 <p>В нашем магазине вы найдете одежду на любой вкус и случай.</p>
              </div>
              <div class="feature">
                  <img src="img/service.png" alt="Сервис">
                  <h3>Отличный сервис</h3>
                 <p>Мы всегда рады помочь вам с выбором и ответить на любые вопросы.</p>
              </div>
           </div>
         </section>
        <section class="about-cta">
          <div class="container about-cta-container">
            <h2>Готовы обновить свой гардероб?</h2>
            <a href="shop.php" class="btn btn-primary">Перейти в магазин</a>
          </div>
        </section>
        <section class="contact-section">
            <div class="container contact-container">
                <div class="contact-text">
                    <h2>Ваше мнение очень важно для нас!</h2>
                    <p>Если у вас возникли вопросы, нужна помощь в выборе или вы хотите оставить отзыв о нашем магазине, мы с удовольствием выслушаем вас. Заполните форму, и мы свяжемся с вами в кратчайшие сроки.</p>
                </div>
                 <div class="contact-form">
                     <form>
                        <input type="text" placeholder="Ваше имя" style="font-family: 'Poiret One', serif; font-size:18px;" required>
                        <input type="email" placeholder="Ваш email"  style="font-family: 'Poiret One', serif; font-size:18px;" required>
                        <textarea placeholder="Ваше сообщение" rows="5"  style="font-family: 'Poiret One', serif; font-size:18px;" required></textarea>
                        <button type="submit" class="btn btn-primary"  style="font-family: 'Poiret One', serif; font-size:18px;">Отправить</button>
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

    <script src="js/script.js"></script>
</body>
</html>