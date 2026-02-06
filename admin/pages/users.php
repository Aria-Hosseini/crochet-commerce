<?php
    require_once __DIR__ . "/../functions/User.php";
    $users = getUsers();
?>

<h2>مشتریان</h2>

<table class="panel-table">
  <thead>
    <tr>
      <th>#</th>
      <th>نام و نام خانوادگی</th>
      <th>ایمیل</th>
      <th>تاریخ و ساعت عضویت</th>
      <th>عملیات</th>
    </tr>
  </thead>
  <tbody id="tablebody">

  <?php 
    global $users;
    foreach($users as $rows) : ?>
    <tr>
      <td><?= $rows->id ?></td>
      <td><?= $rows->name ?></td>
      <td><?= $rows->email ?></td>
      <td><?= $rows->created_at ?></td>
      <td>
        <button class="edit-btn">ویرایش</button>
        <a href="/shop/admin/functions/actions.php?delete_user=<?= $rows->id ?>"><button class="delete-btn">حذف</button></a>
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
