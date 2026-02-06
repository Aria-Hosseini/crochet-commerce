<?php
    require_once __DIR__ . "/../functions/Product.php";
    $products = getProducts();
?>

<h2>محصولات</h2>

<button class="add-btn" onclick="openForm()">➕ افزودن محصول</button>

<table class="panel-table">
  <thead>
    <tr>
      <th>#</th>
      <th>نام محصول</th>
      <th>قیمت</th>
      <th>عملیات</th>
    </tr>
  </thead>
  <tbody id="tablebody">

  <?php 
    global $products;
    foreach($products as $rows) : ?>
    <tr>
      <td><?= $rows->id ?></td>
      <td><?= $rows->title ?></td>
      <td><?= $rows->price ?></td>
      <td>
        <a href="../singleproduct.php?id=<?= $rows->id ?>"><button class="view-btn">مشاهده</button></a>
        <button class="edit-btn">ویرایش</button>
        <button class="delete-btn">حذف</button>
      </td>
    </tr>
    <?php endforeach; ?>

  </tbody>
</table>

<div class="modal" id="PanelModal">
  <div class="modal-content">
    <h3>افزودن محصول</h3>
    <input type="text" id="Name" placeholder="نام محصول" />
    <div class="modal-actions">
      <button class="save-btn" onclick="addCategory()">ثبت</button>
      <button class="cancel-btn" onclick="closeForm()">انصراف</button>
    </div>
  </div>
</div>
