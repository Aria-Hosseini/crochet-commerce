<?php
require_once "functions/DB.php";
global $conn;
?>

<!DOCTYPE html>
<html lang="fa" dir="rtl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="assets/styles/products.css" />
    <title>لیست محصولات</title>
  </head>
  <body>
    <header>
      <div dir="rtl" class="div1h">
        <span>logo</span>
        <ul class="ul-header">
          <a href="index.php"><li>خانه</li></a>
          <a href="products.php"><li>محصولات</li></a>
          <li>درباره ما</li>
          <li>تماس با ما</li>
        </ul>
      </div>
      <div class="div2h">
        <div>
          <a href="auth/login/login.php">
            <button class="login-btn">ورود</button>
          </a>
          <a href="auth/register/register.php">
            <button class="register-btn">ثبت نام</button>
          </a>
        </div>
        <a href="cart.php">
          <button class="cart-btn">سبد خرید</button>
        </a>
      </div>
    </header>

    <div class="products-page">
      <div class="filter-sidebar">
        <h3>دسته بندی‌ها</h3>
        <ul id="categoryFilter">
          <li data-category="all" class="active"> همه محصولات</li>
          <?php
            $stmt = $conn->prepare("SELECT * FROM category");
            $stmt->execute();
            $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $isFirst = true;
            foreach ($categories as $row):
          ?>
        <li 
            data-category="<?php echo $row['id']; ?>"
            class="<?php echo $isFirst ? 'active' : ''; ?>"
          >
          <?php echo $row['title']; ?>
        </li>
          <?php
          $isFirst = false;
          endforeach;
          ?>

        </ul>
      </div>

      <div class="products-container" id="productsContainer">
        <!-- محصولات با JS و Ajax اضافه می‌شوند -->
      </div>
    </div>

    <footer class="main-footer">
      <div class="footer-col">
        <span class="footer-title">لینک‌های کاربردی</span>
        <ul>
          <li>خانه</li>
          <li>محصولات</li>
          <li>درباره ما</li>
          <li>تماس با ما</li>
          <li>پیگیری سفارشات</li>
        </ul>
      </div>

      <div class="footer-col">
        <span class="footer-title">شبکه‌های اجتماعی</span>
        <div class="socials">
          <span>Instagram</span>
          <span>Telegram</span>
          <span>WhatsApp</span>
        </div>
      </div>

      <div class="footer-col enamad">
        <span class="footer-title">نماد اعتماد</span>
        <div class="enamad-box">e-namad</div>
      </div>
    </footer>

    <script src="assets/js/products.js"></script>
  </body>
</html>
