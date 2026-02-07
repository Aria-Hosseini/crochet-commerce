<?php
    require_once __DIR__ . "/../functions/Product.php";
    require_once __DIR__ . "/../functions/category.php";

    $category = getCategory();
    $products = getProducts();
?>

<h2>محصولات</h2>

<button class="add-btn" onclick="openForm()">➕ محصول جدید</button>

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
        <a href="/shop/admin/functions/actions.php?delete_product=<?= $rows->id ?>"><button class="delete-btn">حذف</button></a>
      </td>
    </tr>
    <?php endforeach; ?>

  </tbody>
</table>

<div class="modal" id="PanelModal">
  <div class="modal-content" onclick="event.stopPropagation()">

    <button class="close-btn" onclick="closeForm()">×</button>

    <h3>➕ افزودن محصول جدید</h3>

    <form id="productForm" action="/shop/admin/functions/actions.php?new-product" enctype="multipart/form-data" method="POST" >
      <div class="form-group">
        <label>نام محصول</label>
        <input type="text" name="title" placeholder="نام محصول" required>
      </div>

      <div class="form-group">
        <label>توضیحات محصول</label>
        <textarea name="description" placeholder="توضیحات محصول"></textarea>
      </div>

      <div class="form-group">
        <label>قیمت محصول (تومان)</label>
        <input type="number" name="price" placeholder="مثلاً 250000" required>
      </div>

      <div class="form-group">
        <label>تعداد موجودی</label>
        <input type="number" name="stock" placeholder="مثلاً 10" required>
      </div>

      <div class="form-group">
        <label>دسته‌بندی محصول</label>
        <select name="category" required>
          <option value="">انتخاب دسته‌بندی</option>
          <?php
            global $category;
            foreach($category as $cat){
          ?>
          <option value="<?= $cat->id ?>"><?= $cat->title ?></option>
          <?php } ?>
        </select>
      </div>

      <div class="form-group">
        <label>عکس محصول</label>
        <input type="file" name="image" accept="image/*">
      </div>

      <div class="modal-actions">
        <button type="submit" class="save-btn">ثبت محصول</button>
        <button type="button" class="cancel-btn" onclick="closeForm()">انصراف</button>
      </div>
    </form>

  </div>
</div>

