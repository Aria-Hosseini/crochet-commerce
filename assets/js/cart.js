      document.querySelectorAll(".quantity-btn").forEach((button) => {
        button.addEventListener("click", function () {
          const isPlus = this.classList.contains("plus");
          const quantityElement = this.parentElement.querySelector(".quantity");
          let quantity = parseInt(quantityElement.textContent);

          if (isPlus) {
            quantity++;
          } else if (quantity > 1) {
            quantity--;
          }

          quantityElement.textContent = quantity;
          updateCartCount();
        });
      });

      document.querySelectorAll(".remove-item").forEach((button) => {
        button.addEventListener("click", function () {
          const cartItem = this.closest(".cart-item");
          cartItem.style.animation = "fadeOut 0.3s ease-out";
          setTimeout(() => {
            cartItem.remove();
            updateCartCount();
          }, 300);
        });
      });

      document
        .querySelector(".apply-coupon")
        .addEventListener("click", function () {
          const couponInput = document.querySelector(".coupon-input input");
          if (couponInput.value.trim() !== "") {
            alert("کد تخفیف با موفقیت اعمال شد!");
            couponInput.value = "";
          } else {
            alert("لطفا کد تخفیف را وارد کنید");
          }
        });

      function updateCartCount() {
        const items = document.querySelectorAll(".cart-item");
        document.querySelector(".cart-count").textContent = items.length;
        document.querySelector(".items-count").textContent =
          items.length + " کالا";
      }

      document
        .querySelector(".checkout-btn")
        .addEventListener("click", function () {
          this.innerHTML =
            '<i class="fas fa-spinner fa-spin"></i> در حال انتقال به درگاه پرداخت...';
          this.classList.add("processing");

          setTimeout(() => {
            alert("پرداخت با موفقیت انجام شد! سفارش شما ثبت شده است.");
            this.innerHTML = "پرداخت و ثبت سفارش";
            this.classList.remove("processing");
          }, 2000);
        });