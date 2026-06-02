<div dir="rtl">

# 🧶 Crochet Commerce

یک فروشگاه اینترنتی کوچک و ساده برای فروش محصولات بافتنی دست‌ساز، ساخته‌شده با PHP خالص و MySQL.

---

## ✨ امکانات

- 🏠 صفحه اصلی با اسلایدر تصویری و نمایش جدیدترین محصولات
- 🛍️ صفحه لیست محصولات با قابلیت فیلتر
- 📄 صفحه تک‌محصول با جزئیات کامل
- 🛒 سبد خرید (cart)
- 🔐 سیستم احراز هویت (ورود و ثبت‌نام)
- 🔍 جستجوی زنده (live search) در هدر
- 🗂️ پنل مدیریت (admin)

---

## 📁 ساختار پروژه

```
crochet-commerce/
├── index.php              # صفحه اصلی
├── products.php           # لیست محصولات
├── singleproduct.php      # صفحه تک‌محصول
├── cart.php               # سبد خرید
│
├── admin/                 # پنل مدیریت
├── auth/                  # احراز هویت
│   ├── login/
│   └── register/
│
├── functions/
│   └── DB.php             # اتصال به پایگاه داده (PDO)
│
├── layout/                # هدر و فوتر مشترک
├── assets/
│   ├── styles/            # فایل‌های CSS
│   └── js/                # فایل‌های JavaScript
└── src/img/               # تصاویر محصولات
```

---

## ⚙️ نصب و راه‌اندازی

### پیش‌نیازها

- PHP نسخه 7.4 یا بالاتر
- MySQL / MariaDB
- وب‌سرور Apache یا Nginx (یا XAMPP / WAMP / Laragon)

### مراحل

**۱. کلون کردن مخزن**

```bash
git clone https://github.com/Aria-Hosseini/crochet-commerce.git
cd crochet-commerce
```

**۲. ساخت دیتابیس**

در phpMyAdmin یا MySQL یک دیتابیس جدید بسازید:

```sql
CREATE DATABASE crochet_commerce CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

سپس جدول محصولات را بسازید:

```sql
USE crochet_commerce;

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    price DECIMAL(10,2) NOT NULL,
    image VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(150) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

**۳. تنظیم اتصال به دیتابیس**

فایل `functions/DB.php` را ویرایش کنید:

```php
$host = 'localhost';
$dbname = 'crochet_commerce';
$username = 'root';       // نام کاربری MySQL شما
$password = '';           // رمز MySQL شما

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
```

**۴. قرار دادن پروژه در وب‌سرور**

پوشه پروژه را در مسیر زیر قرار دهید:

```
XAMPP  →  C:/xampp/htdocs/crochet-commerce
WAMP   →  C:/wamp64/www/crochet-commerce
Linux  →  /var/www/html/crochet-commerce
```

**۵. اجرا**

مرورگر را باز کرده و آدرس زیر را وارد کنید:

```
http://localhost/crochet-commerce/
```

---

## 🗄️ تکنولوژی‌ها

| بخش | تکنولوژی |
|-----|----------|
| بک‌اند | PHP (بدون فریم‌ورک) |
| دیتابیس | MySQL با PDO |
| فرانت‌اند | HTML، CSS، JavaScript خالص |
| فونت | Vazir |
| جهت | RTL (راست به چپ) |

---

## 📌 نکات مهم

- تصاویر محصولات باید در پوشه `src/img/` قرار گیرند
- نام فایل تصویر باید دقیقاً با مقدار فیلد `image` در دیتابیس یکسان باشد
- برای محیط پروداکشن حتماً رمزهای عبور را با `password_hash()` ذخیره کنید
- فایل `DB.php` را هرگز در گیت کامیت نکنید (به `.gitignore` اضافه کنید)

---

## 🤝 مشارکت

Pull Request و Issue خوشایند است! برای تغییرات بزرگ ابتدا یک Issue باز کنید.

---

## 👤 سازنده

[Aria Hosseini](https://github.com/Aria-Hosseini)

</div>
