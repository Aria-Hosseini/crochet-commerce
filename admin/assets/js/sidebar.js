const sidebar = document.getElementById("sidebar");
const toggleBtn = document.getElementById("menuToggle");

toggleBtn.addEventListener("click", (e) => {
  e.stopPropagation(); 
  sidebar.classList.toggle("open");
});

sidebar.addEventListener("click", (e) => {
  e.stopPropagation();
});

document.addEventListener("click", () => {
  if (sidebar.classList.contains("open")) {
    sidebar.classList.remove("open");
  }
});
