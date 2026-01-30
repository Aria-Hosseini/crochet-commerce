<!DOCTYPE html>
<html lang="fa" dir="rtl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="assets/styles/cart.css" />
    <title>سبد خرید</title>
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

    <main class="cart-container">
      <h1 class="cart-title">سبد خرید شما</h1>

      <div class="cart-content">
        <div class="cart-items-column">
          <div class="cart-items-header">
            <span>محصولات</span>
            <span class="items-count">3 کالا</span>
          </div>

          <div class="cart-items-list">
            <div class="cart-item">
              <div class="item-image">
                <img src="/src/img/placeholder.jpg" alt="" />
              </div>
              <div class="item-details">
                <h3 class="item-title">عروسک خرگوشی بافتنی</h3>
                <p class="item-description">عروسک</p>
                <div class="item-actions">
                  <div class="quantity-control">
                    <button class="quantity-btn minus">-</button>
                    <span class="quantity">1</span>
                    <button class="quantity-btn plus">+</button>
                  </div>
                  <button class="remove-item">
                    <i class="fas fa-trash"></i> حذف
                  </button>
                </div>
              </div>
              <div class="item-price">
                <span class="price">۲,۵۰۰,۰۰۰ تومان</span>
                <span class="original-price">۳,۲۰۰,۰۰۰ تومان</span>
              </div>
            </div>

            <div class="cart-item">
              <div class="item-image">
                <img src="src/img/placeholder.jpg" />
              </div>
              <div class="item-details">
                <h3 class="item-title">کیف بافت</h3>
                <p class="item-description">کیف</p>
                <div class="item-actions">
                  <div class="quantity-control">
                    <button class="quantity-btn minus">-</button>
                    <span class="quantity">2</span>
                    <button class="quantity-btn plus">+</button>
                  </div>
                  <button class="remove-item">
                    <i class="fas fa-trash"></i> حذف
                  </button>
                </div>
              </div>
              <div class="item-price">
                <span class="price">۱,۸۰۰,۰۰۰ تومان</span>
              </div>
            </div>

            <div class="cart-item">
              <div class="item-image">
                <img src="src/img/placeholder.jpg" alt="" />
              </div>
              <div class="item-details">
                <h3 class="item-title">گل سر بافت</h3>
                <p class="item-description">گل سر</p>
                <div class="item-actions">
                  <div class="quantity-control">
                    <button class="quantity-btn minus">-</button>
                    <span class="quantity">1</span>
                    <button class="quantity-btn plus">+</button>
                  </div>
                  <button class="remove-item">
                    <i class="fas fa-trash"></i> حذف
                  </button>
                </div>
              </div>
              <div class="item-price">
                <span class="price">۱۲,۵۰۰,۰۰۰ تومان</span>
              </div>
            </div>
          </div>

          <div class="continue-shopping">
            <a href="products.php"
              ><i class="fas fa-arrow-right"></i> ادامه خرید</a
            >
          </div>
        </div>

        <div class="cart-summary-column">
          <div class="summary-box">
            <h2 class="summary-title">خلاصه سفارش</h2>

            <div class="summary-details">
              <div class="summary-row">
                <span>قیمت کالاها (۳)</span>
                <span>۱۶,۸۰۰,۰۰۰ تومان</span>
              </div>
              <div class="summary-row">
                <span>تخفیف کالاها</span>
                <span class="discount">-۷۰۰,۰۰۰ تومان</span>
              </div>
              <div class="summary-row">
                <span>هزینه ارسال</span>
                <span>رایگان</span>
              </div>
            </div>

            <div class="summary-total">
              <span>مبلغ قابل پرداخت</span>
              <span class="total-price">۱۶,۱۰۰,۰۰۰ تومان</span>
            </div>

            <div class="coupon-section">
              <h3><i class="fas fa-tag"></i> کد تخفیف</h3>
              <div class="coupon-input">
                <input type="text" placeholder="کد تخفیف خود را وارد کنید" />
                <button class="apply-coupon">اعمال</button>
              </div>
              <div class="coupon-suggestions">
                <span class="coupon-badge">off30</span>
                <span class="coupon-badge">welcome</span>
                <span class="coupon-badge">spring1403</span>
              </div>
            </div>

            <button class="checkout-btn">پرداخت و ثبت سفارش</button>

            <div class="payment-methods">
              <span>پرداخت امن از طریق:</span>
              <div class="payment-icons">
                <i class="fab fa-cc-visa"></i>
                <i class="fab fa-cc-mastercard"></i>
                <i class="fab fa-cc-paypal"></i>
                <i class="fas fa-credit-card"></i>
              </div>
            </div>

            <div class="security-info">
              <p>
                <i class="fas fa-shield-alt"></i> اطلاعات شما نزد ما کاملاً
                محفوظ است
              </p>
              <p>
                <i class="fas fa-truck"></i> تحویل سریع در تهران: ۱-۲ روز کاری
              </p>
              <p>
                <i class="fas fa-undo"></i> امکان بازگشت کالا تا ۷ روز پس از
                تحویل
              </p>
            </div>
          </div>
        </div>
      </div>
    </main>

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

    <script src="assets/js/cart.js"></script>
  </body>
</html>
