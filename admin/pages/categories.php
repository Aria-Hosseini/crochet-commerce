<?php
  require_once __DIR__ . "/../functions/category.php";
  $categories = getCategory();
?>

<h2>دسته‌بندی‌ها</h2>

<button class="add-btn" onclick="openForm()">➕ افزودن دسته‌بندی</button>

<table class="panel-table">
  <thead>
    <tr>
      <th>#</th>
      <th>نام دسته‌بندی</th>
      <th>عملیات</th>
    </tr>
  </thead>
  <tbody id="tablebody">
    <?php
     global $categories;
     foreach($categories as $rows ) { ?>
    <tr>
      <td><?= $rows->id ?></td>
      <td><?= $rows->title ?></td>
      <td>
        <button class="edit-btn">ویرایش</button>
        <button class="delete-btn">حذف</button>
      </td>
    </tr>
    <?php }; ?>

  </tbody>
</table>

<div class="modal" id="PanelModal">
  <div class="modal-content">
    <h3>افزودن دسته‌بندی</h3>
    <input type="text" id="Name" placeholder="نام دسته‌بندی" />
    <div class="modal-actions">
      <button class="save-btn" onclick="addCategory()">ثبت</button>
      <button class="cancel-btn" onclick="closeForm()">انصراف</button>
    </div>
  </div>
</div>
