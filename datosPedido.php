<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <link rel="stylesheet" href="build/css/app.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
</head>

<body>
    <div class="pedido-details">
        <h2>Order Confirmation</h2>
        <form class="formPedidoDetails" action="procesar_pedido.php" method="POST">
            <div class="form-group">
                <label for="nombre">Name:</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="telefono">Phone:</label>
                <input type="tel" id="telefono" name="telefono" required>
            </div>
            <div class="form-group">
                <label for="observacion">Observation:</label>
                <textarea id="observacion" name="observacion" rows="4"></textarea>
            </div>

            <!-- Campos para los datos del pedido -->
            <input type="hidden" id="pedido" name="pedido" value="[]">
            <input type="hidden" id="total-pedido" name="total-pedido" value=""> <!-- Campo oculto para el total del pedido -->

            <button type="submit" class="submit-button">Confirm Order</button>
        </form>
        <div id="resumen-pedido"> <!-- Agrega este div para mostrar el resumen del pedido -->
            <h3>Order Summary</h3>
            <ul>
                <!-- Los productos seleccionados se mostrarán aquí -->
            </ul>
            <p class="total_precio">Total: <span id="total-pedido-display"></span></p> <!-- Agrega el campo para mostrar el total -->
        </div>
    </div>

    <script>
        // Recupera el resumen del pedido de localStorage
        const resumenPedido = localStorage.getItem('resumenPedido');

        // Verifica si hay un resumen de pedido en localStorage
        if (resumenPedido) {
            const resumenPedidoArray = JSON.parse(resumenPedido);
            const resumenPedidoDiv = document.getElementById('resumen-pedido');

            // Crea una lista para mostrar los productos
            const listaProductos = document.createElement('ul');

            // Calcula el total del pedido
            let totalPedido = 0;

            // Itera sobre los productos y crea elementos de lista para cada uno
            resumenPedidoArray.forEach(producto => {
                const listItem = document.createElement('li');
                listItem.textContent = `${producto.nombre} - ${formatearPrecio(producto.precio)}€`;
                listaProductos.appendChild(listItem);

                // Suma el precio al total
                totalPedido += producto.precio;
            });

            // Agrega la lista de productos y el total al div de resumen de pedido
            resumenPedidoDiv.appendChild(listaProductos);

            // Muestra el total en el campo correspondiente
            const totalPedidoElement = document.getElementById('total-pedido-display');
            totalPedidoElement.textContent = `${formatearPrecio(totalPedido)}€`;

            // Agrega el resumen del pedido al campo oculto
            const pedidoInput = document.getElementById('pedido');
            pedidoInput.value = JSON.stringify(resumenPedidoArray);

            // Establece el valor del campo oculto para el total del pedido
            const totalPedidoInput = document.getElementById('total-pedido');
            totalPedidoInput.value = totalPedido;
        } else {
            // Si no hay un resumen de pedido, muestra un mensaje
            alert('No se encontró un resumen de pedido.');
        }

        // Limpia el resumen del pedido almacenado en localStorage después de mostrarlo
        localStorage.removeItem('resumenPedido');

        // Función para formatear el precio en formato "numero €"
        function formatearPrecio(precio) {
            return precio.toFixed(2).replace('.', ',');
        }
    </script>

    <script src="build/js/bundle.min.js"></script>
</body>

</html>