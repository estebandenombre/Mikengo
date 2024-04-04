const ocultar_sidebar = document.getElementById('ocultar_sidebar');
const sidebar = document.querySelector('.sidebar');
const content = document.querySelector('.content');
ocultar_sidebar.addEventListener('click', function () {
    sidebar.classList.toggle('minimizar');
    content.classList.toggle('maximizar');
    console.log("hola");

});
const mostrar_sidebar = document.getElementById('mostrar_sidebar');
mostrar_sidebar.addEventListener('click', function () {
    sidebar.classList.toggle('minimizar');
    content.classList.toggle('maximizar');
    console.log("hola");

});
