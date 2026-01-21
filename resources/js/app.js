import "./bootstrap";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();
document.addEventListener("DOMContentLoaded", () => {
    const sidebar = document.querySelector("aside");
    const toggleBtn = document.querySelector('[aria-controls="sidebar"]');
    toggleBtn.addEventListener("click", () => {
        sidebar.classList.toggle("-translate-x-full");
    });
});
