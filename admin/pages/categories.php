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
        <a href="/shop/admin/functions/actions.php?delete_category=<?= $rows->id ?>"><button class="delete-btn">حذف</button></a>
      </td>
    </tr>
    <?php }; ?>

  </tbody>
</table>

<div class="modal" id="PanelModal">
  <div class="modal-content">
      <button class="close-btn" onclick="closeForm()">×</button>
    <h3>افزودن دسته‌بندی</h3>
    <form action="/shop/admin/functions/actions.php?new-category" method="POST">
      <div class="form-group">
        <label>نام دسته بندی</label>
        <input type="text" name="title" placeholder="یک اسم برای دسته بندی انتخاب کنید" required>
      </div>    
    <div class="modal-actions">
      <button class="save-btn" onclick="addCategory()" type="submit">ثبت</button>
      <button class="cancel-btn" onclick="closeForm()">انصراف</button>
    </div>
    </form>
  </div>
</div>
