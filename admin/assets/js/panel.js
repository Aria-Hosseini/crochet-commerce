function openForm() {
  document.getElementById("categoryModal").style.display = "flex";
}

function closeForm() {
  document.getElementById("categoryModal").style.display = "none";
}

function addCategory() {
  const body = document.getElementById("categoryBody");
  const name = document.getElementById("categoryName").value.trim();
  if (!name) return alert("نام دسته‌بندی رو وارد کن");

  body.insertAdjacentHTML(
    "beforeend",
    `<tr>
      <td>${body.children.length + 1}</td>
      <td>${name}</td>
      <td>
        <button class="edit-btn">ویرایش</button>
        <button class="delete-btn" onclick="this.closest('tr').remove()">حذف</button>
      </td>
    </tr>`
  );

  closeForm();
}
