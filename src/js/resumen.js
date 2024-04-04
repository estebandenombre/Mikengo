document.addEventListener('DOMContentLoaded', function () {
    // Obtén elementos del DOM
    const carritoBtn = document.querySelector('.cart-icon');
    const carritoResumen = document.querySelector('.carrito-resumen');
    const carritoLista = document.getElementById('carrito-lista');
    const carritoTotal = document.getElementById('carrito-total');
    const cerrarCarritoBtn = document.getElementById('cerrar-carrito');
    const contadorCarrito = document.querySelector('.cart-count'); // Elemento del contador

    // Inicializa el carrito como un arreglo vacío
    const carrito = [];

    // Función para agregar un producto al carrito
    function agregarAlCarrito(nombre, precio) {
        carrito.push({ nombre, precio });
        actualizarResumenCarrito();
        //carritoResumen.style.display = 'block';
        contadorCarrito.classList.add('contador-animado');

        // Escucha el evento de finalización de la animación
        contadorCarrito.addEventListener('animationend', () => {
            // Elimina la clase de animación cuando termine la animación
            contadorCarrito.classList.remove('contador-animado');
        });
    }

    // Función para eliminar un producto del carrito
    function eliminarDelCarrito(index) {
        carrito.splice(index, 1);
        actualizarResumenCarrito();
    }

    // Función para actualizar el resumen del carrito
    function actualizarResumenCarrito() {
        carritoLista.innerHTML = ''; // Limpia la lista actual

        let total = 0;

        // Recorre los productos en el carrito y agrega a la lista
        carrito.forEach((producto, index) => {
            const listItem = document.createElement('li');
            listItem.innerHTML = `${producto.nombre} - ${producto.precio.toFixed(2)}€ 
                <button class="eliminar-producto" data-index="${index}">Remove</button>`;
            carritoLista.appendChild(listItem);

            // Suma el precio al total
            total += producto.precio;

            // Agrega un evento de clic al botón "Eliminar"
            const eliminarBtn = listItem.querySelector('.eliminar-producto');
            eliminarBtn.addEventListener('click', () => {
                eliminarDelCarrito(index);
            });
        });

        carritoTotal.textContent = `${total.toFixed(2)}€`;

        // Actualiza el contador del carrito
        contadorCarrito.textContent = carrito.length;
    }

    // Función para cerrar el resumen del carrito
    function cerrarCarrito() {
        carritoResumen.style.display = 'none';
    }

    // Evento para abrir el resumen del carrito al hacer clic en el botón del carrito
    carritoBtn.addEventListener('click', () => {
        if (carrito.length > 0) {
            actualizarResumenCarrito();
            carritoResumen.style.display = 'block';
        } else {
            // Mostrar un mensaje de que el carrito está vacío si no hay productos
            alert('El carrito está vacío.');
        }
    });

    // Evento para cerrar el resumen del carrito
    cerrarCarritoBtn.addEventListener('click', cerrarCarrito);

    // Obtén todos los botones "Añadir al Carrito"
    const botonesAgregar = document.querySelectorAll('.add-to-cart');

    // Agregar un evento de clic a cada botón "Añadir al Carrito"
    botonesAgregar.forEach(boton => {
        boton.addEventListener('click', () => {
            // Encuentra el elemento padre (div.menu-card) del botón
            const card = boton.closest('.menu-card');

            // Obtén el nombre y el precio del producto desde el elemento
            const nombre = card.querySelector('h3').textContent;
            const precioTexto = card.querySelector('.price').textContent;

            // Parsea el precio en formato de texto a un número
            const precio = parseFloat(precioTexto.replace('€', '').replace(',', '.'));

            // Agrega el producto al carrito
            agregarAlCarrito(nombre, precio);
        });
    });

    function procesarPago() {
        localStorage.setItem('resumenPedido', JSON.stringify(carrito));
        // Redirige a la página de "Pedido Realizado" al hacer clic en el botón de pagar
        window.location.href = 'datosPedido.php'; // Reemplaza con la ruta correcta de tu página
    }

    // Agregar un evento al botón de pagar
    const pagarButton = document.getElementById('pagar-carrito');
    if (pagarButton) {
        pagarButton.addEventListener('click', procesarPago);
    }
});
