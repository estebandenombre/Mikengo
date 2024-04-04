<!DOCTYPE html>
<html>
<head>
    <title>Calculadora de Hora Mundial</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px;
        }

        h1 {
            margin: 0;
        }

        main {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
        }

        label {
            font-weight: bold;
        }

        select, button {
            padding: 10px;
            margin-top: 10px;
            width: 100%;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        /* Estilo para el botón "Mostrar Horario en Mapa" */
        button:nth-child(2) {
            background-color: #007BFF;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:nth-child(2):hover {
            background-color: #0056b3;
        }

        /* Estilo para la tabla de horas en otras ciudades */
        #horasCiudadesTable {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        #horasCiudadesTable th, #horasCiudadesTable td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }

        #horasCiudadesTable th {
            background-color: #f2f2f2;
        }

        /* Estilo para el mapa */
        #map {
            display: none;
            width: 100%;
            height: 400px;
            margin-top: 20px;
            border-radius: 5px;
        }

        @media (max-width: 768px) {
            /* Estilos para pantallas más pequeñas */
            main {
                padding: 10px;
            }
            
            select, button {
                padding: 8px;
                margin-top: 8px;
            }
            
            /* Ajustar el tamaño del mapa para pantallas pequeñas */
            #map {
                height: 300px;
            }
        }
    </style>
</head>
<body>
    <header>
        <h1>Calculadora de Hora Mundial</h1>
    </header>

    <main>
        <form id="horaForm">
            <label for="fechaHora">Fecha y Hora en España:</label>
            <input type="datetime-local" id="fechaHora" required>
            <button type="button" onclick="calcularHora()">Calcular</button>
            <!-- Botón para mostrar el mapa -->
            <button type="button" onclick="mostrarMapa()">Mostrar Horario en Mapa</button>
        </form>

        <h2>Horas en otras ciudades:</h2>
        <table id="horasCiudadesTable">
            <thead>
                <tr>
                    <th>Zona</th>
                    <th>Hora</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody id="horasCiudades">
                <!-- Las horas y fechas se mostrarán aquí, ordenadas de mayor a menor hora -->
            </tbody>
        </table>

        <!-- Contenedor del mapa -->
        <div id="map"></div>
    </main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/luxon/2.0.1/luxon.min.js"></script>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script>
        const map = L.map('map').setView([0, 0], 2);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
        }).addTo(map);

        const markersLayer = L.layerGroup().addTo(map);

        // Función para mostrar el mapa cuando se hace clic en el botón
        function mostrarMapa() {
            const mapContainer = document.getElementById("map");
            mapContainer.style.display = "block";
        }

        function formatTime(hour, minute) {
            return `${hour.toString().padStart(2, '0')}:${minute.toString().padStart(2, '0')}h`;
        }

        function calcularHora() {
            const fechaHora = document.getElementById("fechaHora").value;
            const fecha = new Date(fechaHora);
            const fechaHoraEsp = luxon.DateTime.fromJSDate(fecha, { zone: "Europe/Madrid" });

            const ciudades = [
                { nombre: "Seattle", zona: "America/Los_Angeles", coordenadas: [47.6062, -122.3321] },
                { nombre: "Los Angeles", zona: "America/Los_Angeles", coordenadas: [34.0522, -118.2437] },
                { nombre: "México", zona: "America/Mexico_City", coordenadas: [19.4326, -99.1332] },
                { nombre: "Bogotá", zona: "America/Bogota", coordenadas: [4.6097, -74.0817] },
                { nombre: "Houston", zona: "America/Chicago", coordenadas: [29.7604, -95.3698] },
                { nombre: "Nueva York", zona: "America/New_York", coordenadas: [40.7128, -74.0060] },
                { nombre: "Montreal", zona: "America/Toronto", coordenadas: [45.5017, -73.5673] },
                { nombre: "Sao Paulo", zona: "America/Sao_Paulo", coordenadas: [-23.5505, -46.6333] },
                { nombre: "Montevideo", zona: "America/Montevideo", coordenadas: [-34.9011, -56.1915] },
                { nombre: "Buenos Aires", zona: "America/Argentina/Buenos_Aires", coordenadas: [-34.6118, -58.4173] },
                { nombre: "Accra", zona: "Africa/Accra", coordenadas: [5.5600, -0.2050] },
                { nombre: "London", zona: "Europe/London", coordenadas: [51.5074, -0.1278] },
                { nombre: "Lisbon", zona: "Europe/Lisbon", coordenadas: [38.7223, -9.1393] },
                { nombre: "Morocco", zona: "Africa/Casablanca", coordenadas: [33.5731, -7.5898] },
                { nombre: "París", zona: "Europe/Paris", coordenadas: [48.8566, 2.3522] },
                { nombre: "Maputo", zona: "Africa/Maputo", coordenadas: [-25.9655, 32.5832] },
                { nombre: "Moscow", zona: "Europe/Moscow", coordenadas: [55.7558, 37.6176] },
                { nombre: "Instanbul", zona: "Europe/Istanbul", coordenadas: [41.0082, 28.9784] },
                { nombre: "Amman", zona: "Asia/Amman", coordenadas: [31.9522, 35.9104] },
                { nombre: "Cairo", zona: "Africa/Cairo", coordenadas: [30.0444, 31.2357] },
                { nombre: "Kabul", zona: "Asia/Kabul", coordenadas: [34.5553, 69.2075] },
                { nombre: "Mumbai", zona: "Asia/Kolkata", coordenadas: [19.0760, 72.8777] },
                { nombre: "Hanoi", zona: "Asia/Ho_Chi_Minh", coordenadas: [21.0285, 105.8542] },
                { nombre: "Yakarta", zona: "Asia/Jakarta", coordenadas: [-6.2088, 106.8456] },
                { nombre: "Singapur", zona: "Asia/Singapore", coordenadas: [1.3521, 103.8198] },
                { nombre: "Seoul", zona: "Asia/Seoul", coordenadas: [37.5665, 126.9780] },
                { nombre: "Japan", zona: "Asia/Tokyo", coordenadas: [35.682839, 139.759455] },
                { nombre: "Sídney", zona: "Australia/Sydney", coordenadas: [-33.8688, 151.2093] }
            ];

            // Ordenar las ciudades de mayor hora a menor
            ciudades.sort((ciudad1, ciudad2) => {
                const horaCiudad1 = fechaHoraEsp.setZone(ciudad1.zona).toMillis();
                const horaCiudad2 = fechaHoraEsp.setZone(ciudad2.zona).toMillis();
                return horaCiudad1 - horaCiudad2;
            });

            const tablaHoras = document.getElementById("horasCiudades");
            tablaHoras.innerHTML = "";

            markersLayer.clearLayers();

            ciudades.forEach(ciudad => {
                const horaCiudad = fechaHoraEsp.setZone(ciudad.zona);
                const row = tablaHoras.insertRow();
                const cellCiudad = row.insertCell(0);
                const cellHora = row.insertCell(1);
                const cellFecha = row.insertCell(2);

                // Formatear la hora en formato de 24 horas (sin am/pm)
                const [hour, minute] = horaCiudad.toFormat('HH:mm').split(':');
                const fechaCiudad = horaCiudad.toFormat('dd/MM/yyyy');

                cellCiudad.textContent = ciudad.nombre;
                cellHora.textContent = formatTime(parseInt(hour), parseInt(minute));
                cellFecha.textContent = fechaCiudad;

                L.marker(ciudad.coordenadas).addTo(markersLayer)
                    .bindPopup(`${ciudad.nombre}: ${formatTime(parseInt(hour), parseInt(minute))}`)
                    .openPopup();
            });
        }
    </script>
</body>
</html>
