<?php

require_once "functions/DB.php";
global $conn;

?>

<!DOCTYPE html>
<html lang="fa" dir="rtl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="assets/styles/main.css" />
    <title>خانه</title>
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
      <div class="search-box">
        <form action="search.php" method="GET" id="searchForm" style="display: flex; gap: 5px; flex: 1;">
          <input 
            placeholder="نام محصول را جستجو کنید..." 
            type="text" 
            class="searchbar" 
            id="searchbar" 
            name="q" 
            dir="rtl" 
            autocomplete="off"
            style="flex: 1; padding:12px; border-radius:12px;outline: none; border:none; font-family: Vazir; font-weight:400 ;"
          >
        </form>
      <div class="live-search-results" id="liveSearchResults"></div>
    </div>

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
    <section class="slider-sec">
      <div class="container-slider">
        <div class="slider">
          <div class="slider__slides">
            <div class="slider__slide active">
              <img
                src="https://images.kojaro.com/2020/7/60db5236-ec19-4a9d-ac7a-adb508d43608.jpg"
                alt="damavand"
              />
            </div>
            <div class="slider__slide">
              <img
                src="https://images.kojaro.com/2018/4/0645f8a6-1d2d-455c-9820-72add8edf3de-840x560.jpg"
                alt="taraghe"
              />
            </div>
            <div class="slider__slide">
              <img
                src="https://www.eligasht.com/Blog/wp-content/uploads/2017/05/historical-takhte-jamshyd.jpg"
                alt="taxht-jamshid"
              />
            </div>
            <div class="slider__slide">
              <img
                src="https://shahrvandonline.ir/wp-content/uploads/2021/10/%D8%A2%D8%B1%D8%A7%D9%85%DA%AF%D8%A7%D9%87-%DA%A9%D9%88%D8%B1%D9%88%D8%B4-%DA%A9%D8%A8%DB%8C%D8%B1-7-750x430.jpg"
                alt="korosh"
              />
            </div>
          </div>
          <div id="nav-button--prev" class="slider__nav-button"></div>
          <div id="nav-button--next" class="slider__nav-button"></div>
          <div class="slider__nav">
            <div class="slider__navlink active"></div>
            <div class="slider__navlink"></div>
            <div class="slider__navlink"></div>
            <div class="slider__navlink"></div>
          </div>
        </div>
      </div>
    </section>

    <h3>دسته بندی ها</h3>
    <div class="category">
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
    </div>

    <h3>جدید ترین محصولات</h3>
    <div class="last-products">
      <?php
          $stmt = $conn->prepare("SELECT * FROM products");
          $stmt->execute();
          $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($products as $rows):
      ?>
      <a href="singleproduct.php?id=<?php echo $rows['id']?>">
      <div class="product-card">
        <img src="src/img/<?php echo $rows['image'] ?>" alt="عکس محصول" />
        <div class="card-content">
          <span class="product-title"><?php echo $rows['title']?></span>
          <button class="addtocart-btn">افزودن به سبد</button>
        </div>
      </div>
      </a>
      <?php endforeach; ?>
      
    </div>

    <div class="website-info">
      <p>
        فروشگاه ما تخصصی در فروش بافتنی‌های تزیینی دست‌ساز شامل کیف‌های بافتنی،
        عروسک‌های دست‌بافت و اکسسوری‌های خاص است. تمام محصولات با دقت بالا و
        استفاده از نخ‌های باکیفیت و مرغوب تهیه می‌شوند تا هم ماندگاری بالا داشته
        باشند و هم ظاهری چشم‌نواز. طراحی‌ها کاملاً خاص و مناسب هدیه دادن برای
        مناسبت‌های مختلف هستند. ما تلاش می‌کنیم ترکیبی از هنر دست، خلاقیت و
        سلیقه مدرن را به شما ارائه دهیم. امکان سفارش محصولات به صورت سفارشی و در
        رنگ‌بندی دلخواه نیز فراهم است. ارسال سریع و بسته‌بندی ایمن از اولویت‌های
        اصلی فروشگاه ماست. رضایت مشتری و کیفیت نهایی محصولات برای ما اهمیت
        بالایی دارد. اگر به دنبال هدیه‌ای خاص، متفاوت و دست‌ساز هستید، اینجا
        انتخاب درست شماست. با خرید از فروشگاه ما، از هنرمندان ایرانی حمایت
        می‌کنید. تجربه خریدی متفاوت و دلنشین را با ما تجربه کنید.
      </p>
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

    <script src="./assets/js/home.js"></script>
    <script src="assets/js/search.js"></script>
  </body>
</html>
