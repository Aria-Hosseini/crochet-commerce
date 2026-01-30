<?php
require_once "../functions/DB.php";
require_once "functions/category.php";

global $conn;
$categories = getCategory();
global $categories;

?>

<!DOCTYPE html>
<html lang="fa" dir="rtl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Panel</title>

    <link rel="stylesheet" href="assets/css/reset.css" />
    <link rel="stylesheet" href="assets/css/panel.css">k
    <link rel="stylesheet" href="assets/css/variables.css" />
    <link rel="stylesheet" href="assets/css/layout.css" />
    <link rel="stylesheet" href="assets/css/responsive.css" />
  </head>
  <body>
    <aside class="sidebar" id="sidebar">
      <div class="sidebar-header">
        <span class="logo">Admin Panel</span>
        <button class="theme-toggle" id="themeToggle">🌙</button>
      </div>

      <ul class="menu">
        <li class="menu-item active" data-page="dashboard">داشبورد</li>
        <li class="menu-item" data-page="users">مشتریان</li>
        <li class="menu-item" data-page="products">محصولات</li>
        <li class="menu-item" data-page="categories">دسته بندی ها</li>
        <li class="menu-item" data-page="reports">گزارش‌ها</li>
        <li class="menu-item" data-page="settings">تنظیمات</li>
      </ul>
    </aside>

    <main class="main">
      <header class="topbar">
        <button class="menu-toggle" id="menuToggle">☰</button>
        <span>پنل ادمین</span>
      </header>

      <section class="content" id="content"></section>
      <footer class="footer">
        <span class="heart">❤</span>developed by
        <strong>Aria Hosseini</strong> with
      </footer>
    </main>

    <script src="assets/js/sidebar.js"></script>
    <script src="assets/js/app.js"></script>
    <script src="assets/js/panel.js"></script>
  </body>
</html>
