<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Centro Ecoturistico La Cumbre Ixtepeji</title>

    <link rel="icon" href="{{ asset('img/logoixtepeji.jpg') }}" type="image/png">
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    
    <!-- Bootstrap 5.3.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        body {
            margin: 0;
        }

        .fondo-container {
            background-image: url("{{ asset('img/fondo3.jpg') }}");
            background-position: center center;
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
            opacity: 0.6;
            /* Agrega opacidad solo al fondo */
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -0;
            /* Coloca el fondo detrás del contenido */
        }
    </style>
</head>

<body>

    <div class="fondo-container"></div>
    <br>
    <section class="textos-header align-content-center" style="text-align: center;">
        <br>


        <img src="{{ asset('img/logoixtepeji.jpg') }}" alt="Descripción de la imagen"
            style="width: 150px; height: 150px; border-radius: 50%; margin-right: 20px;">
        <h1 style="color: rgb(15, 100, 12);">Centro Ecoturístico <p>La Cumbre Ixtepeji</p>
        </h1>
        <br><br><br>
        <br>

    </section>
    <br>

    <div style="margin-left: 8%;">
        <h3>Gracias por visitar nuestro sitio</h3>
        <br>
        <h4>Aqui podras nuestras diversas actividades </h4>
        <h3><b>Ven y disfruta con tus amigos!!!</b></h3>

    </div>
    <br>

    <!--Carrusel de las actividades-->
    <div class="card"
        style="max-width: 30%; margin-left: 8%; margin-right: 2%; padding: 10px;background-color: rgb(196, 255, 232);">
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('img/caba.png') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('img/ciclismo.jpg') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('img/puente.jpg') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('img/senderismo.jpg') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('img/tiro.jpg') }}" class="d-block w-100" alt="...">
                </div>
            </div>
        </div>
    </div>

    <br><br><br>

</body>

</html>
