const productsContainer = document.getElementById("productsContainer");
const categoryFilterItems = document
  .getElementById("categoryFilter")
  .querySelectorAll("li");

function displayProducts(filterCategory = "all") {
  productsContainer.innerHTML = "<p>در حال بارگذاری...</p>";

  fetch(`functions/get-products.php?category=${filterCategory}`)
    .then(res => res.json())
    .then(products => {
      productsContainer.innerHTML = "";

      if (products.length === 0) {
        productsContainer.innerHTML = "<p>محصولی یافت نشد</p>";
        return;
      }

      products.forEach(p => {
        const productLink = document.createElement("a");
        productLink.href = p.product_url;
        productLink.className = "product-link";
        
        const card = document.createElement("div");
        card.className = "product-card";
        card.innerHTML = `
          <img src="${p.image_url}" alt="${p.title}" />
          <div class="card-content">
            <span class="product-title">${p.title}</span>
            <button class="addtocart-btn">افزودن به سبد</button>
          </div>
        `;
        
        productLink.appendChild(card);
        productsContainer.appendChild(productLink);
      });
    })
    .catch(() => {
      productsContainer.innerHTML = "<p>خطا در دریافت محصولات</p>";
    });
}

const firstActiveCategory = document.querySelector("#categoryFilter li.active");
displayProducts(firstActiveCategory?.dataset.category || "all");

categoryFilterItems.forEach(li => {
  li.addEventListener("click", () => {
    categoryFilterItems.forEach(el => el.classList.remove("active"));
    li.classList.add("active");

    displayProducts(li.dataset.category);
  });
});