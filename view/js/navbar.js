let page_todos = document.getElementById("nav_todos");
let page_favoritos = document.getElementById("nav_favoritos");
let page_cadastro = document.getElementById("nav_cadastro");

let URL =  window.location.pathname;


if (URL === "/") {
    page_todos.classList.add("disabled", "active");
}
if (URL === "/favoritos") {
    page_favoritos.classList.add("disabled", "active");
}
if (URL === "/novo") {
    page_cadastro.classList.add("disabled", "active");
}
