<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    <!--Diseño o estilos-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        body {
            background-color: #9efccd94;
            border-radius: 50%;
        }
    </style>

</head>

<body>

    <header style="  background-image: linear-gradient(to bottom right, green, #9bf8a0);

    ">
        <section class="textos-header align-content-center" style="text-align: center;">
            <br>


            <img src="{{ asset('img/logoixtepeji.jpg') }}" alt="Descripción de la imagen"
                style="width: 150px; height: 150px; border-radius: 50%; margin-right: 20px;">
            <h1 style="color: white;">Centro Ecoturístico <p>La Cumbre Ixtepeji</p>
            </h1>
        </section>
        <div class="wave" style="height: 150px; overflow: hidden;">
            <svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;">
                <defs>
                    <linearGradient id="gradiente" x1="0%" y1="0%" x2="100%" y2="0%">
                        <stop offset="0%" style="stop-color:#8bffc594" />
                        <stop offset="100%" style="stop-color:#defde8d8" />
                    </linearGradient>
                </defs>
                <path d="M-1.97,78.47 C149.99,150.00 345.65,38.98 499.72,82.41 L500.00,150.00 L0.00,150.00 Z"
                    style="stroke: none; fill: url(#gradiente);"></path>
            </svg>
        </div>
    </header>




    <h1 style="margin-left: 3%;  color: rgb(0, 0, 0); text-shadow: 2px 2px 4px #31bd77;"><b>Cabañas</b></h1>
    <br><br>

    <div class="card-group">
        <!--Primer card-->
        <div class="card shadow p-4 mb-5 bg-white rounded" style="max-width: 28%; margin-left: 3%;">
            <div id="carouselExampleCaptions" class="carousel slide mx-auto" style="">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3"
                        aria-label="Slide 4"></button>

                </div>

                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('img/caba.png') }}" class="d-block w-100" alt="..."
                            style="opacity: 1;">
                        <div class="carousel-caption d-none d-md-block">
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('img/cabaña1.jpg') }}" class="d-block w-100" alt="..."
                            style="opacity: 1;">
                        <div class="carousel-caption d-none d-md-block">

                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('img/cabaña11.jpg') }}" class="d-block w-100" alt="..."
                            style="opacity: 1;">
                        <div class="carousel-caption d-none d-md-block">
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('img/cabaña111.jpg') }}" class="d-block w-100" alt="..."
                            style="opacity: 1;">
                        <div class="carousel-caption d-none d-md-block">

                        </div>
                    </div>


                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <div class="card-body">
                <p class="card-text"><b>Nombre:</b> Cabaña 1 <br>
                    <b>Capacidad de personas <br>en la cabaña :</b> 5 <br>
                    <b>Descripción:</b>
                    La cabaña cuenta con: <br>
                    <li>1 sala pequeña</li>
                    <li>1 Baño completo con agua caliente</li>
                    <li>2 recamaras
                        <ul>
                            <ul>
                                <li>1 Cama matrimonial</li>
                                <li>2 literas</li>
                            </ul>
                        </ul>
                    </li>
                    <li>Baño completo con agua caliente</li>
                    <li>Chiminea</li>


                    <!--a pequeña sala, un baño con regadera y
                    agua caliente, cuenta ademas con dos recamaras una con una cama matrimonial
                    y otra con dos literas.-->
                </p>
            </div>
        </div>
        <!--Fin del primer carrusel-->

        <!--2da CARD-->

        <div class="card shadow p-4 mb-5 bg-white rounded" style="max-width: 28%; margin-left: 3%;">
            <div id="carouselExampleCaptions1" class="carousel slide mx-auto " style="">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions1" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions1" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions1" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions1" data-bs-slide-to="3"
                        aria-label="Slide 4"></button>

                </div>

                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('img/cabaña2.jpg') }}" class="d-block w-100" alt="..."
                            style="opacity: 1;">
                        <div class="carousel-caption d-none d-md-block">
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('img/cabaña22.jpg') }}" class="d-block w-100" alt="..."
                            style="opacity: 1;">
                        <div class="carousel-caption d-none d-md-block">

                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('img/cabaña222.jpg') }}" class="d-block w-100" alt="..."
                            style="opacity: 1;">
                        <div class="carousel-caption d-none d-md-block">
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('img/cabaña2222.jpg') }}" class="d-block w-100"
                            alt="..." style="opacity: 1;">
                        <div class="carousel-caption d-none d-md-block">

                        </div>
                    </div>


                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions1"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions1"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <br><br>
            <div class="card-body">
                <p class="card-text"><b>Nombre:</b> Cabaña 2 <br>
                    <b>Capacidad de personas <br>en la cabaña :</b> 6 <br>
                    <b>Descripción:</b> La cabaña cuenta con: <br>
                    <li>1 recamara
                        <ul>
                            <ul>
                                <li>1 cama matrimonial</li>
                                <li>2 camas individuales</li>
                                <li>1 litera</li>
                            </ul>
                        </ul>
                    </li>
                    <li>Baño completo con agua caliente</li>
                    <li>Chiminea</li>

                </p>
            </div>
        </div>
        <!--Fin del segundo carrusel-->

        <!--Tercer card-->
        <div class="card shadow p-4 mb-5 bg-white rounded" style="max-width: 28%; margin-left: 3%;">
            <div id="carouselExampleCaptions3" class="carousel slide mx-auto" style="">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions3" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions3" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions3" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions3" data-bs-slide-to="3"
                        aria-label="Slide 4"></button>

                </div>

                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('img/cabaña3.jpeg') }}" class="d-block w-100" alt="..."
                            style="opacity: 1;">
                        <div class="carousel-caption d-none d-md-block">
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('img/cabaña33.jpg') }}" class="d-block w-100" alt="..."
                            style="opacity: 1;">
                        <div class="carousel-caption d-none d-md-block">

                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('img/cabaña333.jpg') }}" class="d-block w-100" alt="..."
                            style="opacity: 1;">
                        <div class="carousel-caption d-none d-md-block">
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('img/cabaña3333.jpg') }}" class="d-block w-100"
                            alt="..." style="opacity:1;">
                        <div class="carousel-caption d-none d-md-block">

                        </div>
                    </div>


                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions3"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions3"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <div class="card-body">
                <p class="card-text"><b>Nombre:</b> Cabaña 3 <br>
                    <b>Capacidad de personas <br> en la cabaña :</b> 6 <br>
                    <b>Descripción:</b> La cabaña cuenta con <br>
                    <li>1 recamara
                        <ul>
                            <ul>
                                <li>1 cama matrimonial</li>
                                <li>2 camas individuales</li>
                                <li>1 litera</li>
                            </ul>
                        </ul>
                    </li>
                    <li>Baño completo con agua caliente</li>
                    <li>Chiminea</li>

                </p>
            </div>
        </div>
        <!--Fin del tercer carrusel-->

    </div>
    <!--CARD GROUP-->

    <br>
    <!--Segundo card grouop-->
    <div class="card-group">
        <!--Cuarto card-->
        <div class="card shadow p-4 mb-5 bg-white rounded" style="max-width: 28%; margin-left: 3%;">
            <div id="carouselExampleCaptions4" class="carousel slide mx-auto" style="">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions4" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions4" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions4" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions4" data-bs-slide-to="3"
                        aria-label="Slide 4"></button>

                </div>

                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('img/cabaña4.jpg') }}" class="d-block w-100" alt="..."
                            style="opacity: 1;">
                        <div class="carousel-caption d-none d-md-block">
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('img/cabaña44.jpg') }}" class="d-block w-100" alt="..."
                            style="opacity: 1;">
                        <div class="carousel-caption d-none d-md-block">

                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('img/cabaña444.jpg') }}" class="d-block w-100" alt="..."
                            style="opacity: 1;">
                        <div class="carousel-caption d-none d-md-block">
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('img/cabaña4444.jpg') }}" class="d-block w-100"
                            alt="..." style="opacity: 1;">
                        <div class="carousel-caption d-none d-md-block">

                        </div>
                    </div>


                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions4"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions4"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <div class="card-body">
                <p class="card-text"><b>Nombre:</b> Cabaña 4 <br>
                    <b>Capacidad de personas <br>en la cabaña :</b> 6 <br>
                    <b>Descripción:</b> La cabaña cuenta con: <br>
                    <li>1 recamara
                        <ul>
                            <ul>
                                <li>1 cama matrimonial</li>
                                <li>2 camas individuales</li>
                                <li>1 litera</li>
                            </ul>
                        </ul>
                    </li>
                    <li>Baño completo con agua caliente</li>
                    <li>Chiminea</li>

                </p>
            </div>
        </div>
        <!--Fin del cuarto carrusel-->

        <!--Quinto card-->
        <div class="card shadow p-4 mb-5 bg-white rounded" style="max-width: 28%; margin-left: 3%;">
            <div id="carouselExampleCaptions5" class="carousel slide mx-auto" style="margin-top: 10px;">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions5" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions5" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions5" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions5" data-bs-slide-to="3"
                        aria-label="Slide 4"></button>

                </div>

                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('img/cabaña5.jpg') }}" class="d-block w-100" alt="..."
                            style="opacity: 1;">
                        <div class="carousel-caption d-none d-md-block">
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('img/cabaña55.jpg') }}" class="d-block w-100" alt="..."
                            style="opacity: 1;">
                        <div class="carousel-caption d-none d-md-block">

                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('img/cabaña555.jpg') }}" class="d-block w-100" alt="..."
                            style="opacity: 1;">
                        <div class="carousel-caption d-none d-md-block">
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('img/cabaña5555.jpg') }}" class="d-block w-100"
                            alt="..." style="opacity: 1;">
                        <div class="carousel-caption d-none d-md-block">

                        </div>
                    </div>


                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions5"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions5"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <div class="card-body">
                <p class="card-text"><b>Nombre:</b> Cabaña 5 <br>
                    <b>Capacidad de personas <br> en la cabaña :</b> 6 <br>
                    <b>Descripción:</b> La cabaña cuenta con: <br>
                    <li>1 recamara
                        <ul>
                            <ul>
                                <li>1 cama matrimonial</li>
                                <li>2 camas individuales</li>
                                <li>2 literas</li>
                            </ul>
                        </ul>
                    </li>
                    <li>Baño completo con agua caliente</li>
                    <li>Chiminea</li>

                </p>
            </div>
        </div>
        <!--Fin del quinto carrusel-->

        <!--Sexto card-->
        <div class="card shadow p-4 mb-5 bg-white rounded" style="max-width: 28%; margin-left: 3%;">
            <div id="carouselExampleCaptions6" class="carousel slide mx-auto" style="margin-top: 10px;">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions6" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions6" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions6" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions6" data-bs-slide-to="3"
                        aria-label="Slide 4"></button>

                </div>

                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('img/cabaña6.jpg') }}" class="d-block w-100" alt="..."
                            style="opacity: 1;">
                        <div class="carousel-caption d-none d-md-block">
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('img/cabaña66.jpg') }}" class="d-block w-100" alt="..."
                            style="opacity: 1;">
                        <div class="carousel-caption d-none d-md-block">

                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('img/cabaña666.jpg') }}" class="d-block w-100" alt="..."
                            style="opacity: 1;">
                        <div class="carousel-caption d-none d-md-block">
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('img/cabaña6666.jpg') }}" class="d-block w-100" alt="..."
                            style="opacity: 1;">
                        <div class="carousel-caption d-none d-md-block">

                        </div>
                    </div>


                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions6"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions6"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <div class="card-body">
                <p class="card-text"><b>Nombre:</b> Cabaña 6 <br>
                    <b>Capacidad de personas <br>en la cabaña :</b> 7 <br>
                    <b>Descripción:</b> La cabaña cuenta con:<br>
                    <li>1 recamara
                        <ul>
                            <ul>
                                <li>1 cama matrimonial</li>
                                <li>1 camas individuale</li>
                                <li>2 litera</li>
                            </ul>
                        </ul>
                    </li>
                    <li>Baño completo con agua caliente</li>
                    <li>Chiminea</li>

                </p>
            </div>
        </div>
        <!--Fin del sexto carrusel-->

    </div>
    <!--Fin del segundo group -->
    <br>
    <!--Tercer carg group-->
    <div class="card-group">
        <!--Septimo card-->
        <div class="card shadow p-4 mb-5 bg-white rounded" style="max-width: 28%; margin-left: 3%;">
            <div id="carouselExampleCaptions7" class="carousel slide mx-auto" style="margin-top: 10px;">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions7" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions7" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions7" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions7" data-bs-slide-to="3"
                        aria-label="Slide 4"></button>

                </div>

                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('img/cabaña7.jpg') }}" class="d-block w-100" alt="..."
                            style="opacity: 1;">
                        <div class="carousel-caption d-none d-md-block">
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('img/cabaña77.jpg') }}" class="d-block w-100" alt="..."
                            style="opacity: 1;">
                        <div class="carousel-caption d-none d-md-block">

                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('img/cabaña777.jpg') }}" class="d-block w-100" alt="..."
                            style="opacity: 1;">
                        <div class="carousel-caption d-none d-md-block">
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('img/cabaña7777.jpg') }}" class="d-block w-100" alt="..."
                            style="opacity: 1;">
                        <div class="carousel-caption d-none d-md-block">

                        </div>
                    </div>


                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions7"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions7"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <div class="card-body">
                <p class="card-text"><b>Nombre:</b> Cabaña 7 <br>
                    <b>Capacidad de personas <br>en la cabaña :</b> 7 <br>
                    <b>Descripción:</b> La cabaña cuenta con: <br>
                    <li>1 recamara
                        <ul>
                            <ul>
                                <li>1 cama matrimonial</li>
                                <li>1 camas individuales</li>
                                <li>2 literas</li>
                            </ul>
                        </ul>
                    </li>
                    <li>Baño completo con agua caliente</li>
                    <li>Chiminea</li>

                </p>
            </div>
        </div>
        <!--Fin del septimo carrusel-->

        <!--Octavo card-->
        <div class="card shadow p-4 mb-5 bg-white rounded" style="max-width: 28%; margin-left: 3%;">
            <div id="carouselExampleCaptions8" class="carousel slide mx-auto" style="">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions8" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions8" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions8" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions8" data-bs-slide-to="3"
                        aria-label="Slide 4"></button>

                </div>

                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('img/cabaña8.jpg') }}"class="d-block w-100" alt="..."
                            style="opacity: 1;">
                        <div class="carousel-caption d-none d-md-block">
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('img/cabaña88.jpg') }}"class="d-block w-100" alt="..."
                            style="opacity: 1;">
                        <div class="carousel-caption d-none d-md-block">

                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('img/cabaña888.jpg') }}" class="d-block w-100" alt="..."
                            style="opacity: 1;">
                        <div class="carousel-caption d-none d-md-block">
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('img/cabaña8888.jpg') }}" class="d-block w-100" alt="..."
                            style="opacity: 1;">
                        <div class="carousel-caption d-none d-md-block">

                        </div>
                    </div>


                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions8"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions8"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <div class="card-body">
                <p class="card-text"><b>Nombre:</b> Cabaña 8 <br>
                    <b>Capacidad de personas <br>en la cabaña :</b> 6 <br>
                    <b>Descripción:</b> La cabaña cuenta con: <br>
                    <li>1 recamara
                        <ul>
                            <ul>
                                <li>1 cama matrimonial</li>
                                <li>2 camas individuales</li>
                                <li>1 litera</li>
                            </ul>
                        </ul>
                    </li>
                    <li>Baño completo con agua caliente</li>
                    <li>Chiminea</li>


                </p>
            </div>
        </div>
        <!--Fin del octavo carrusel-->

        <!--Noveno card-->
        <div class="card shadow p-4 mb-5 bg-white rounded" style="max-width: 28%; margin-left: 3%;">
            <div id="carouselExampleCaptions9" class="carousel slide mx-auto" style="">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions9" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions9" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions9" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions9" data-bs-slide-to="3"
                        aria-label="Slide 4"></button>

                </div>

                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('img/cabaña9.jpg') }}"class="d-block w-100" alt="..."
                            style="opacity: 1;">
                        <div class="carousel-caption d-none d-md-block">
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('img/cabaña99.jpg') }}"class="d-block w-100" alt="..."
                            style="opacity: 1;">
                        <div class="carousel-caption d-none d-md-block">

                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('img/cabaña999.jpg') }}" class="d-block w-100" alt="..."
                            style="opacity: 1;">
                        <div class="carousel-caption d-none d-md-block">
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('img/cabaña9999.jpg') }}" class="d-block w-100" alt="..."
                            style="opacity: 1;">
                        <div class="carousel-caption d-none d-md-block">

                        </div>
                    </div>


                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions9"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions9"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <div class="card-body">
                <p class="card-text"><b>Nombre:</b> Cabaña 9 <br>
                    <b>Capacidad de personas <br>en la cabaña :&nbsp;&nbsp;&nbsp;</b> 6 <br>
                    <b>Descripción:</b> La cabaña cuenta con:<br>
                    <li>1 recamara
                        <ul>
                            <ul>
                                <li>1 cama matrimonial</li>
                                <li>2 camas individuales</li>
                                <li>1 litera</li>
                            </ul>
                        </ul>
                    </li>
                    <li>Baño completo con agua caliente</li>
                    <li>Chiminea</li>



                </p>
            </div>
        </div>
        <!--Fin del noveno carrusel-->

    </div>
    <!--Fin del tercer card group-->
    <br>

    <!--Cuarto card group-->
    <div class="card-group">
        <!--Decimo card-->
        <div class="card shadow p-4 mb-5 bg-white rounded" style="max-width: 28%; margin-left: 3%;">
            <div id="carouselExampleCaptions10" class="carousel slide mx-auto" style="">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions10" data-bs-slide-to="0"
                        class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions10" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions10" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions10" data-bs-slide-to="3"
                        aria-label="Slide 4"></button>

                </div>

                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('img/cabañadies.jpg') }}" class="d-block w-100"
                            alt="..." style="opacity: 1;">
                        <div class="carousel-caption d-none d-md-block">
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('img/cabañadiess.jpg') }}" class="d-block w-100"
                            alt="..." style="opacity: 1;">
                        <div class="carousel-caption d-none d-md-block">

                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('img/cabañadiesss.jpg') }}" class="d-block w-100"
                            alt="..." style="opacity: 1;">
                        <div class="carousel-caption d-none d-md-block">
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('img/cabañadiessss.jpg') }}" class="d-block w-100"
                            alt="..." style="opacity: 1;">
                        <div class="carousel-caption d-none d-md-block">

                        </div>
                    </div>


                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions10"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions10"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <div class="card-body">
                <p class="card-text"><b>Nombre:</b> Cabaña 10 <br>
                    <b>Capacidad de personas <br>en la cabaña :</b> 2 <br>
                    <b>Descripción:</b> Es una cabaña de pareja que cuenta con: <br>
                    <li>1 corredor pequeño</li>
                    <li>1 recamara</li>
                <ul>
                    <ul>
                        <li>1 cama matrimonial</li>
                    </ul>
                </ul>
                </li>
                <li>Baño completo con agua caliente</li>
                <li>Chiminea</li>


                </p>
            </div>
        </div>
        <!--Fin del decimo carrusel-->

        <!--Onceavo card-->
        <div class="card shadow p-4 mb-5 bg-white rounded" style="max-width: 28%; margin-left: 3%;">
            <div id="carouselExampleCaptions11" class="carousel slide mx-auto" style="">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions10" data-bs-slide-to="0"
                        class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions11" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions11" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions11" data-bs-slide-to="3"
                        aria-label="Slide 4"></button>

                </div>

                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('img/cabañaonce.jpg') }}" class="d-block w-100"
                            alt="..." style="opacity: 1;">
                        <div class="carousel-caption d-none d-md-block">
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('img/cabañaoncee.jpg') }}" class="d-block w-100"
                            alt="..." style="opacity: 1;">
                        <div class="carousel-caption d-none d-md-block">

                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('img/cabañaonceee.jpg') }}" class="d-block w-100"
                            alt="..." style="opacity: 1;">
                        <div class="carousel-caption d-none d-md-block">
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('img/cabañaonceeee.jpg') }}" class="d-block w-100"
                            alt="..." style="opacity: 1;">
                        <div class="carousel-caption d-none d-md-block">

                        </div>
                    </div>


                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions11"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions11"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <div class="card-body">
                <p class="card-text"><b>Nombre:</b> Cabaña 11<br>
                    <b>Capacidad de personas <br>en la cabaña :</b> 2 <br>
                    <b>Descripción:</b>Es una cabaña de pareja que cuenta con: <br>
                    <li>1 corredor pequeño</li>
                    <li>1 recamara</li>
                <ul>
                    <ul>
                        <li>1 cama matrimonial</li>
                    </ul>
                </ul>
                </li>
                <li>Baño completo con agua caliente</li>
                <li>Chiminea</li>

                </p>
            </div>
        </div>
        <!--Fin del onceavo carrusel-->

        <!--Doceavo card-->
        <div class="card shadow p-4 mb-5 bg-white rounded" style="max-width: 28%; margin-left: 3%;">
            <div id="carouselExampleCaptions12" class="carousel slide mx-auto" style="">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions12" data-bs-slide-to="0"
                        class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions12" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions12" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions12" data-bs-slide-to="3"
                        aria-label="Slide 4"></button>

                </div>

                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('img/cabañadoce.jpg') }}" class="d-block w-100"
                            alt="..." style="opacity: 1;">
                        <div class="carousel-caption d-none d-md-block">
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('img/cabañadocee.jpg') }}" class="d-block w-100"
                            alt="..." style="opacity: 1;">
                        <div class="carousel-caption d-none d-md-block">

                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('img/cabañadoceee.jpg') }}" class="d-block w-100"
                            alt="..." style="opacity: 1;">
                        <div class="carousel-caption d-none d-md-block">
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('img/cabañadoceeee.jpg') }}"class="d-block w-100"
                            alt="..." style="opacity: 1;">
                        <div class="carousel-caption d-none d-md-block">

                        </div>
                    </div>


                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions12"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions12"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <div class="card-body">
                <p class="card-text"><b>Nombre:</b> Cabaña 12<br>
                    <b>Capacidad de personas <br>en la cabaña :</b> 4 <br>
                    <b>Descripción:</b>Es una cabaña de pareja que cuenta con: <br>
                    <li>1 corredor pequeño</li>
                <ul>
                    <ul>
                        <li>Mesa y sillas</li>
                    </ul>
                </ul>
                <li>1 recamara</li>
                <ul>
                    <ul>
                        <li>1 cama matrimonial</li>
                        <li>1 litera</li>
                    </ul>
                </ul>
                </li>
                <li>Baño completo con agua caliente</li>
                <li>Chiminea</li>
                </p>
            </div>
        </div>
        <!--Fin del doceavo carrusel-->
    </div>
    <!--Fin del cuarto group card-->

    <!--Quinto card group-->
    <div class="card-group">
        <!--Treceavo card-->
        <div class="card shadow p-4 mb-5 bg-white rounded" style="max-width: 28%; margin-left: 3%;">
            <div id="carouselExampleCaptions13" class="carousel slide mx-auto" style="">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions13" data-bs-slide-to="0"
                        class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions13" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions13" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions13" data-bs-slide-to="3"
                        aria-label="Slide 4"></button>

                </div>

                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('img/cabañatrece.jpg') }}" class="d-block w-100"
                            alt="..." style="opacity: 1;">
                        <div class="carousel-caption d-none d-md-block">
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('img/cabañatrecee.jpg') }}" class="d-block w-100"
                            alt="..." style="opacity: 1;">
                        <div class="carousel-caption d-none d-md-block">

                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('img/cabañatreceee.jpg') }}" class="d-block w-100"
                            alt="..." style="opacity: 1;">
                        <div class="carousel-caption d-none d-md-block">
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('img/cabañatreceeee.jpg') }}" class="d-block w-100"
                            alt="..." style="opacity: 1;">
                        <div class="carousel-caption d-none d-md-block">

                        </div>
                    </div>


                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions13"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions13"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <div class="card-body">
                <p class="card-text"><b>Nombre:</b> Cabaña 13<br>
                    <b>Capacidad de personas <br>en la cabaña :</b> 4 <br>
                    <b>Descripción:</b>Es una cabaña de pareja que cuenta con: <br>
                    <li>1 corredor pequeño</li>
                <ul>
                    <ul>
                        <li>Mesa y sillas</li>
                    </ul>
                </ul>
                <li>1 recamara</li>
                <ul>
                    <ul>
                        <li>1 cama matrimonial</li>
                        <li>1 litera</li>
                    </ul>
                </ul>
                </li>
                <li>Baño completo con agua caliente</li>
                <li>Chiminea</li>

                </p>
            </div>
        </div>
        <!--Fin del treceavo carrusel-->

        <!--Catorceavo card-->
        <div class="card shadow p-4 mb-5 bg-white rounded" style="max-width: 28%; margin-left: 3%;">
            <div id="carouselExampleCaptions14" class="carousel slide mx-auto" style="">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions14" data-bs-slide-to="0"
                        class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions14" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions14" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions14" data-bs-slide-to="3"
                        aria-label="Slide 4"></button>

                </div>

                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('img/cabañacatorce.jpg') }}" class="d-block w-100"
                            alt="..." style="opacity: 1;">
                        <div class="carousel-caption d-none d-md-block">
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('img/cabañacatorcee.jpg') }}"class="d-block w-100"
                            alt="..." style="opacity: 1;">
                        <div class="carousel-caption d-none d-md-block">

                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('img/cabañacatorceee.jpg') }}" class="d-block w-100"
                            alt="..." style="opacity: 1;">
                        <div class="carousel-caption d-none d-md-block">
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('img/cabañacatorceeee.jpg') }}"class="d-block w-100"
                            alt="..." style="opacity: 1;">
                        <div class="carousel-caption d-none d-md-block">

                        </div>
                    </div>


                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions14"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions14"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <div class="card-body">
                <p class="card-text"><b>Nombre:</b> Cabaña 14<br>
                    <b>Capacidad de personas <br>en la cabaña :</b> 7 <br>
                    <b>Descripción:</b>Es una cabaña de pareja que cuenta con: <br>
                    <li>1 corredor pequeño</li>
                <ul>
                    <ul>
                        <li>Mesa y sillas</li>
                    </ul>
                </ul>
                <li>1 recamara</li>
                <ul>
                    <ul>
                        <li>1 cama matrimonial</li>
                        <li>1 cama individual</li>
                        <li>2 literas</li>
                    </ul>
                </ul>
                </li>
                <li>Baño completo con agua caliente</li>
                <li>Chiminea</li>

                </p>
            </div>
        </div>
        <!--Fin del catorceavo-->

        <!--Quinceavo card-->
        <div class="card shadow p-4 mb-5 bg-white rounded" style="max-width: 28%; margin-left: 3%;">
            <div id="carouselExampleCaptions15" class="carousel slide mx-auto" style="">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions15" data-bs-slide-to="0"
                        class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions15" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions15" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions15" data-bs-slide-to="3"
                        aria-label="Slide 4"></button>

                </div>

                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('img/cabañaquince.jpg') }}" class="d-block w-100"
                            alt="..." style="opacity: 1;">
                        <div class="carousel-caption d-none d-md-block">
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('img/cabañaquicee.jpg') }}" class="d-block w-100"
                            alt="..." style="opacity: 1;">
                        <div class="carousel-caption d-none d-md-block">

                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('img/cabañaquinceee.jpg') }}"class="d-block w-100"
                            alt="..." style="opacity: 1;">
                        <div class="carousel-caption d-none d-md-block">
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('img/cabañaquinceeee.jpg') }}" class="d-block w-100"
                            alt="..." style="opacity: 1;">
                        <div class="carousel-caption d-none d-md-block">

                        </div>
                    </div>


                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions15"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions15"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <div class="card-body">
                <p class="card-text"><b>Nombre:</b> Cabaña 15<br>
                    <b>Capacidad de personas <br>en la cabaña :</b> 7 <br>
                    <b>Descripción:</b>Es una cabaña de pareja que cuenta con: <br>
                    <li>1 corredor pequeño</li>
                <ul>
                    <ul>
                        <li>Mesa y sillas</li>
                    </ul>
                </ul>
                <li>1 recamara</li>
                <ul>
                    <ul>
                        <li>1 cama matrimonial</li>
                        <li>1 cama individual</li>
                        <li>2 literas</li>
                    </ul>
                </ul>
                </li>
                <li>Baño completo con agua caliente</li>
                <li>Chiminea</li>

                </p>
            </div>
        </div>
        <!--Fin del quinceavo-->


    </div>


    <br><br><br>


</body>

</html>