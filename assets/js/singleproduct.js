      let quantity = 1;
      const quantityValue = document.getElementById("quantity-value");
      const decreaseBtn = document.getElementById("decrease-btn");
      const increaseBtn = document.getElementById("increase-btn");

      decreaseBtn.addEventListener("click", () => {
        if (quantity > 1) {
          quantity--;
          quantityValue.textContent = quantity;
        }
      });

      increaseBtn.addEventListener("click", () => {
        quantity++;
        quantityValue.textContent = quantity;
      });

      const addToCartBtn = document.getElementById("add-to-cart");
      addToCartBtn.addEventListener("click", () => {
        alert(`✅ ${quantity} عدد لپ‌تپ مک‌بوک پرو به سبد خرید شما اضافه شد.`);
      });

      let selectedRating = 0;

      function hoverStars(num) {
        const stars = document.querySelectorAll('[id^="star-"]');
        stars.forEach((star, index) => {
          if (index < num) {
            star.style.color = "#ffc107";
          } else {
            star.style.color = "#ccc";
          }
        });
      }

      function setRating(num) {
        selectedRating = num;
        document.getElementById("rating-value").value = num;

        const stars = document.querySelectorAll('[id^="star-"]');
        stars.forEach((star, index) => {
          if (index < num) {
            star.style.color = "#ffc107";
          } else {
            star.style.color = "#ccc";
          }
        });
      }

      const commentForm = document.getElementById("comment-form");
      commentForm.addEventListener("submit", (e) => {
        e.preventDefault();

        const name = document.getElementById("name").value;
        const comment = document.getElementById("comment").value;
        const rating = document.getElementById("rating-value").value;

        if (rating === "0") {
          alert("لطفاً به محصول امتیاز دهید.");
          return;
        }

        alert(
          `✅ نظر شما با موفقیت ثبت شد.\nنام: ${name}\nامتیاز: ${rating} ستاره`
        );

        commentForm.reset();
        selectedRating = 0;
        document.getElementById("rating-value").value = 0;
        const stars = document.querySelectorAll('[id^="star-"]');
        stars.forEach((star) => {
          star.style.color = "#ccc";
        });
      });

      const starContainer =
        document.querySelector('[id^="star-"]').parentElement;
      starContainer.addEventListener("mouseleave", () => {
        const stars = document.querySelectorAll('[id^="star-"]');
        stars.forEach((star, index) => {
          if (index < selectedRating) {
            star.style.color = "#ffc107";
          } else {
            star.style.color = "#ccc";
          }
        });
      });