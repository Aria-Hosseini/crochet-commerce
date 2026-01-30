const content = document.getElementById("content");
const menuItems = document.querySelectorAll(".menu-item");

function loadPage(page, push = true) {
  fetch(`loader.php?page=${page}`)
    .then(res => res.text())
    .then(html => {
      content.innerHTML = html;

      menuItems.forEach(item =>
        item.classList.toggle(
          "active",
          item.dataset.page === page
        )
      );

      if (push) {
        history.pushState({ page }, "", `#${page}`);
      }
    })
    .catch(() => {
      content.innerHTML = "<h2>صفحه پیدا نشد ❌</h2>";
    });
}

menuItems.forEach(item => {
  item.addEventListener("click", () => {
    loadPage(item.dataset.page);
  });
});

window.addEventListener("popstate", e => {
  if (e.state?.page) {
    loadPage(e.state.page, false);
  }
});

const initialPage = location.hash.replace("#", "") || "dashboard";
loadPage(initialPage, false);



const themeToggle = document.getElementById("themeToggle");
const html = document.documentElement;

const savedTheme = localStorage.getItem("theme");
if (savedTheme) {
  html.setAttribute("data-theme", savedTheme);
  themeToggle.textContent = savedTheme === "dark" ? "🌙" : "☀️";
}

themeToggle.addEventListener("click", () => {
  const currentTheme = html.getAttribute("data-theme") || "dark";
  const newTheme = currentTheme === "dark" ? "light" : "dark";

  html.setAttribute("data-theme", newTheme);
  localStorage.setItem("theme", newTheme);

  themeToggle.textContent = newTheme === "dark" ? "🌙" : "☀️";
});
