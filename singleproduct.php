<?php
require_once "functions/DB.php";
global $conn;

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
  die("محصول یافت نشد");
}

$id = (int) $_GET['id'];

$stmt = $conn->prepare("SELECT * FROM products WHERE id = :id");
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();

$product = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$product) {
  die("محصول یافت نشد");
}
?>


<!DOCTYPE html>
<html lang="fa" dir="rtl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="assets/styles/singleproduct.css" />
    <title>صفحه محصول</title>
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
          <a href="auth/login/login.php"
            ><button class="login-btn">ورود</button></a
          >
          <a href="auth/register/register.php"
            ><button class="register-btn">ثبت نام</button></a
          >
        </div>
        <a href="cart.php"><button class="cart-btn">سبد خرید</button></a>
      </div>
    </header>

    <div class="product-container">
      <div class="column image-column">
        <img
          src="src/img/<?php echo $product['image']?> "
          alt="<?php echo $product['title']?>"
          class="product-image"
        />
        <h2 class="product-name"><?php echo htmlspecialchars($product['title'])?></h2>
        <div class="product-price"><?php echo htmlspecialchars($product['price'])?></div>
        <div class="rating">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star-half-alt"></i>
          <span>(۴.۵ از ۵)</span>
        </div>
        <div class="stock-status in-stock">موجود در انبار</div>
      </div>

      <div class="column specs-column">
        <h2>مشخصات</h2>
        <?php echo htmlspecialchars($product['description'])?>
      </div>

      <div class="column actions-column">
        <h2>خرید محصول</h2>

        <div class="quantity-selector">
          <div class="quantity-label">تعداد:</div>
          <div class="quantity-controls">
            <button class="quantity-btn" id="decrease-btn">
              <i class="fas fa-minus">-</i>
            </button>
            <span class="quantity-value" id="quantity-value">۱</span>
            <button class="quantity-btn" id="increase-btn">
              <i class="fas fa-plus">+</i>
            </button>
          </div>
        </div>

        <button class="add-to-cart-btn" id="add-to-cart">
          افزودن به سبد خرید
        </button>

        <div
          style="
            margin-top: 25px;
            padding-top: 20px;
            border-top: 1px solid var(--secondary-color);
          "
        >
          <h3><i class="fas fa-truck"></i> امکان ارسال فوری</h3>
          <p style="margin-top: 10px; font-size: 0.95rem">
            این محصول در تهران و شهرهای بزرگ تا ۲ ساعت دیگر در دسترس شما خواهد
            بود.
          </p>
        </div>

        <div
          style="
            margin-top: 15px;
            padding-top: 15px;
            border-top: 1px solid var(--secondary-color);
          "
        >
          <h3><i class="fas fa-shield-alt"></i> گارانتی بازگشت</h3>
          <p style="margin-top: 10px; font-size: 0.95rem">
            در صورت عدم رضایت تا ۷ روز امکان بازگشت کالا وجود دارد.
          </p>
        </div>
      </div>
    </div>

    <div class="comments-section">
      <h2><i class="fas fa-comments"></i> نظر‌های کاربران</h2>

      <div class="comment-example">
        <div class="comment-header">
          <span class="comment-author">علی محمدی</span>
          <span class="comment-date">۱۴۰۲/۰۵/۱۵</span>
        </div>
        <p>
          لپ‌تپ بسیار عالی با باتری فوق‌العاده. طراحی زیبا و وزن مناسب. عملکرد
          بسیار روان و صفحه نمایش عالی.
        </p>
        <div class="rating">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
        </div>
      </div>

      <form action="" method="POST" class="comment-form" id="comment-form">
        <h3 style="margin-top: 20px; color: var(--primary-color)">
          ثبت نظر جدید
        </h3>

        <div class="form-group">
          <label for="name">نام و نام خانوادگی:</label>
          <input
            type="text"
            id="name"
            class="form-input"
            placeholder="نام خود را وارد کنید"
            required
          />
        </div>

        <div class="form-group">
          <label for="comment">نظر شما:</label>
          <textarea
            id="comment"
            class="form-textarea"
            placeholder="نظر خود را درباره این محصول بنویسید..."
            required
          ></textarea>
        </div>

        <div class="form-group">
          <label for="rating">امتیاز شما:</label>
          <div style="display: flex; gap: 10px; margin-top: 5px">
            <span
              style="color: #ccc; cursor: pointer"
              id="star-1"
              onmouseover="hoverStars(1)"
              onclick="setRating(1)"
              >★</span
            >
            <span
              style="color: #ccc; cursor: pointer"
              id="star-2"
              onmouseover="hoverStars(2)"
              onclick="setRating(2)"
              >★</span
            >
            <span
              style="color: #ccc; cursor: pointer"
              id="star-3"
              onmouseover="hoverStars(3)"
              onclick="setRating(3)"
              >★</span
            >
            <span
              style="color: #ccc; cursor: pointer"
              id="star-4"
              onmouseover="hoverStars(4)"
              onclick="setRating(4)"
              >★</span
            >
            <span
              style="color: #ccc; cursor: pointer"
              id="star-5"
              onmouseover="hoverStars(5)"
              onclick="setRating(5)"
              >★</span
            >
          </div>
          <input type="hidden" id="rating-value" value="0" />
        </div>

        <button type="submit" class="submit-btn">
          <i class="fas fa-paper-plane"></i>
          ارسال نظر
        </button>
      </form>
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

    <script src="assets/js/singleproduct.js"></script>
  </body>
</html>
