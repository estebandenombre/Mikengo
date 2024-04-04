<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard de Cluster MySQL</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }

    header {
        width: 100%;
        height: 100vh;
        height: 4rem;
        background-color: #0066ff;
        margin: 0 auto;
        padding: 0;
        display: flex;
        align-items: center;

    }

    .cabecera {
        width: 90%;
        margin: 0 auto;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }


    h1 {
        margin: 0;
        color: #fff;
        font-size: 1rem;
    }

    .contenedor {
        width: 90%;
        height: 100%;
        display: grid;
        gap: 2rem;
        grid-template-columns: repeat(2, 1fr);
        margin: 2rem auto;
    }

    .widget {
        background-color: #fff;
        border: 1px solid #ddd;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        padding: 20px;
        width: 100%;
        box-sizing: border-box;
        border-radius: 5px;
        transition: transform 0.2s ease;

    }

    .estado {
        max-height: 15rem !important;
    }

    .online {
        color: green;
        font-weight: bold;
    }

    .contenedor_topología {
        height: 18rem;
        display: grid;
        gap: 2rem;
        grid-template-columns: repeat(3, 1fr);
        align-items: center;
        justify-items: center;
    }

    .circulo {
        width: 10rem;
        height: 10rem;
        border-radius: 50%;
        border: #0066ff solid 2px;
        text-align: center;

    }

    .principal {
        width: 16rem;
        height: 16rem;
    }

    .contenedor_nodo {
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
    }

    .bajo {
        width: 90%;
        margin: 2rem auto;

        background-color: rgba(0, 0, 0, 0.4);


    }

    .bajo p {
        color: #fff;
    }

    .contenedor_info {
        width: 100%;
        height: 100%;
        display: flex;
        flex-direction: row;
        justify-content: space-between;
    }

    p {
        margin-top: 0.5rem;
    }

    .ocultar {
        display: none;
    }

    img {
        width: 104px;
        height: 45px;
        padding: 10px;
    }

    .mbl {
        display: none;
    }

    @media screen and (max-width: 768px) {
        .mbl {
            display: flex;
        }

        .contenedor {
            grid-template-columns: repeat(1, 1fr);
        }

        .contenedor_topología {
            grid-template-columns: repeat(1, 1fr);
            height: 100%;
        }

        .ultimo {
            margin-bottom: 4rem !important;
        }

        .contenedor_info {
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        button {
            color: #000;
            border: none;
            padding: 10px 10px;
            cursor: pointer;
            font-size: 14px;
            border-radius: 5px;
            margin-top: 25px;
            margin-right: 10px;
            transition: background-color 0.3s ease;
        }


    }
</style>

<body>
    <header>
        <div class="cabecera">
            <h1>CLUSTER CAICV</h1>
            <div class="contenedor_imagen"><img src="imagenes/Logo Telefonica-CAICV.png" alt=""></div>
        </div>
    </header>
    <div class="contenedor">
        <section class="widget estado">
            <h2>Resumen</h2>
            <p>Estado: <span class="online animate__animated  animate__flash">ONLINE</span></p>
            <p>Nodo Principal: Castellón</p>
            <p>Todos los nodos conectados</p>
        </section>
        <section class="widget topo">
            <h2>Topología</h2>
            <div class="contenedor_topología">
                <div class="circulo animate__animated  animate__rotateIn">
                    <div class="contenedor_nodo">
                        <h3 class="nombre_nodo">Valencia</h3>
                        <p>Secundario</p>
                        <span class="online">ONLINE</span>
                    </div>

                </div>
                <section class="widget bajo mbl animate__animated  animate__fadeIn">
                    <div class="contenedor_info">
                        <p>Dirección: VALENCIA:3306</p>
                        <p>Modo: R/O</p>
                        <p>Estado: ONLINE</p>
                        <p>Version: 8.0.19</p>
                    </div>

                </section>
                <div class="circulo principal animate__animated  animate__rotateIn">
                    <div class="contenedor_nodo">
                        <h3 class="nombre_nodo">Castellón</h3>
                        <p>Primario</p>
                        <span class="online">ONLINE</span>
                    </div>
                </div>
                <section class="widget bajo mbl animate__animated  animate__fadeIn">
                    <div class="contenedor_info">
                        <p>Dirección: CASTELLON:3306</p>
                        <p>Modo: R/W</p>
                        <p>Estado: ONLINE</p>
                        <p>Version: 8.0.19</p>


                    </div>
                </section>
                <div class="circulo animate__animated  animate__rotateIn">
                    <div class="contenedor_nodo">
                        <h3 class="nombre_nodo">Alicante</h3>
                        <p>Secundario</p>
                        <span class="online">ONLINE</span>
                    </div>

                </div>
                <section class="widget bajo ultimo mbl animate__animated  animate__fadeIn">
                    <div class="contenedor_info">
                        <p>Dirección: ALICANTE:3306</p>
                        <p>Modo: R/O</p>
                        <p>Estado: ONLINE</p>
                        <p>Version: 8.0.19</p>


                    </div>
                </section>
            </div>




</body>

</html>