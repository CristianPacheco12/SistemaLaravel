<!DOCTYPE html>
<html lang="es">

<head>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CENTRO ECOTURISTICO LA CUMBRE IXTEPEJI</title>
    <link rel="icon" href="{{ asset('img/logoixtepeji.jpg') }}" type="image/png">
    <link rel="stylesheet" href="css/estilos.css">
    <!-- Latest compiled and minified CSS -->


    <style>
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

.navbar {
    text-align: left;
}


body {
    font-family: Verdana, Geneva, Tahoma, sans-serif;
}

.contenedor {
    padding: 90px 0;
    width: 90%;
    max-width: 1000px;
    margin: auto;
    overflow: hidden;
}

.titulo {
    color: black;
    font-size: 30px;
    text-align: center;
    margin-bottom: 30px;
}

header {
    width: 100%;
    height: 600px;
    background: #127D0B;
    /* fallback for old browsers */
    background: -webkit-linear-gradient(to right, hsla(6, 60%, 35%, 0.671), hsla(353, 52%, 47%, 0.671)), url("../../public/img/portada.jpg");
    background: linear-gradient(to right, hsla(6, 60%, 35%, 0.671), hsla(353, 52%, 47%, 0.671)), url("../../public/img/portada.jpg");
    /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    background-size: cover;
    background-attachment: fixed;

}

nav {
    text-align: right;
    padding: 30px 50px 0 0;
}

.span1 {
    font-size: 24px;
}

nav>a {
    color: #fff;
    font-weight: 300;
    text-decoration: none;
    margin-right: 13px;
    
}

nav>a:hover {
    text-decoration: underline;
    
}

header .textos-header {
    display: flex;
    height: 430px;
    width: 100%;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    text-align: center;
    color:#fff;
}

.textos-header h1 {
    font-size: 75px;
    color: #fff;
    font-family: sans-serif;
}

.textos-header img {
   width: 50%; 
    

}

.wave {
    width: 100%;
    position: inherit;
    bottom: 0;
}

html {
    scroll-behavior: smooth;
}

.barra {
    font-family: 'Lato', sans-serif;
    /Alto y ancho de donde se va a activar cuando pase el mouse/
    width: 10%;
    height: 9%;
    /Para que este siempre en la misma parte de la pantalla aunque se haga scroll/
    position: fixed;
    /Tiempo en el que va a transitar la animacion/
    transition: .4s all;
    /este arriba de todo en la pantalla/
    z-index: 1;
}

.barra ul {
    /solucionar espacios no deseados/
    padding: 0px;
    text-align: center;

}

.barra li {
    /Velocidad de transicion del contenido/
    transition: all .3s;
    list-style: none;
}

.barra a {
    text-decoration: none;

    font-weight: normal;

    /La letra crece con el menu de esta manera no se va a ver como se ajusta al margen mientras crece/
    transition: .3s all;
    /Se ocultan los elementos/
    font-size: 0px;
    padding: 0px;
}

.barra h2 {
    text-align: center;
    color: rgb(0, 0, 0);
    padding: 7px;
    padding-bottom: 7px;

    /Se oculta el h2/
    font-size: 0px;
}

.barra img {
    padding-top: 7px;
    padding-left: 5px;
}

.barra:hover {
    /Tamaño cuando el cursor señale la barra/
    width: 30%;
    height: 100vh;

    /Color/
    background: hsla(0, 76%, 44%, 0.87);
}

.barra:hover h2 {
    /posicion dentro de barra del h2/
    padding: 15px;
    font-size: 20px;
}

.barra:hover a {
    font-size: 15px;
    color: rgb(0, 0, 0);
    /Se usa el display block para que el enlace respete el margin/
    display: block;
    padding: 20px;
}

.barra:hover img {
    /Desaparecer la imagen/
    height: 0px;
}


.barra:hover li {
    border-top: 1px solid #ffffff11;
    /Espacios entre las lineas y el contenido/

    width: 100%;

}

.barra:hover ul:last-of-type {


    border-bottom: 1px solid hsla(0, 0%, 0%, 0.171);
}

.barra:hover a:hover {
    font-size: 15px;
    padding: 30px 0px;
    background: rgba(255, 255, 255, 0.98);
}

.contenedor-sobre-nosotros {
    display: flex;
    justify-content: space-evenly;

}

.imagen-about-us {
    width: 500px;
    height: 300px;
    float: left;
    margin-top: 50px;
}

.sobre-nosotros .contenido-textos {
    width: 200%;
}



.sobre-nosotros h2 span {
    background: rgb(131, 12, 36);
    color: rgb(255, 255, 255);
    border-radius: 100%;
    display: inline-block;
    text-align: center;
    width: 30px;
    height: 30px;
    padding: 0px 0px 0px 0px;
    box-shadow: 0 0 6px 0 rgba(0, 0, 0, .5);
    margin-right: 5px;
}

.sobre-nosotros h3 span {
    background: rgb(131, 12, 36);
    color: rgb(255, 255, 255);
    border-radius: 100%;
    display: inline-block;
    text-align: center;
    width: 15px;
    height: 15px;
    padding: 0px 0px 0px 0px;
    box-shadow: 0 0 6px 0 rgba(0, 0, 0, .5);
    margin-right: 5px;
}

.contenido-textos p {
    padding: 12px 0px 0px 15px;
    font-weight: 300;
    text-align: justify;
}

.contenido-textos h3 {
    padding: 12px 0px 0px 15px;
    font-weight: 300;
    text-align: justify;
}

.about-services h2 span {
    background: rgb(131, 12, 36);
    color: rgb(255, 255, 255);
    border-radius: 100%;
    display: inline-block;
    text-align: center;
    width: 30px;
    height: 30px;
    padding: 0px 0px 0px 0px;
    box-shadow: 0 0 6px 0 rgba(0, 0, 0, .5);
    margin-right: 5px;
}

.about-services {
    background: #f2f2f2;
    padding-bottom: 30px;
}

.servicio-cont {
    display: flex;
    justify-content: space-between;
    align-items: center;

}

.servicio-ind {
    width: 40%;
    text-align: center;
}

.servicio-ind img {
    width: 95%;
}

.servicio-ind h3 {
    font-size: 20px;
    margin: 10px 0px 0px 0px;
}

.servicio-ind #rutaGam {
    font-size: 18px;
    margin: 10px 0px 0px 0px;
}

.servicio-ind p {
    font-weight: 300;
    text-align: center;
}

.portafolio h2 span {
    background: rgb(131, 12, 36);
    color: rgb(255, 255, 255);
    border-radius: 100%;
    display: inline-block;
    text-align: center;
    width: 30px;
    height: 30px;
    padding: 0px 0px 0px 0px;
    box-shadow: 0 0 6px 0 rgba(0, 0, 0, .5);
    margin-right: 5px;
}

.galeria-port {
    display: flex;
    justify-content: space-evenly;
    flex-wrap: wrap;
}

.imagen-port {
    width: 28%;
    margin-bottom: 10px;
    height: 200px;
    overflow: hidden;
    position: relative;
    cursor: pointer;
    box-shadow: 0 0 6px 0 rgba(0, 0, 0, .5);

}

.imagen-port>img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
}

.hover-galeria {
    position: absolute;
    width: 100%;
    height: 100%;
    top: 0;
    transform: scale(0);
    background: hsla(0, 91%, 27%, 0.7);
    transition: transform .5s;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;

}

.hover-galeria img {
    width: 50px;
}

.hover-galeria p {
    color: #fff
}

.imagen-port:hover .hover-galeria {
    transform: scale(1);
}

footer {
    background: #f2f2f2;
    padding: 60px 0 30px 0;
    margin: auto;
    overflow: hidden;
}

.contenedor-footer {
    display: flex;
    width: 90%;
    justify-content: space-evenly;
    margin: auto;
    padding-bottom: 50px;
    border-bottom: 1px solid #ccc;

}

.content-foo {
    text-align: center;
}

.content-foo h5 {
    color: black;
    border-bottom: 3px solid rgb(255, 0, 0);
    padding-bottom: 5px;
    margin-bottom: 10px;

}

.content-foo p {
    color: black;

}

.titulo-final {
    text-align: center;
    font-size: 24px;
    margin: 20px 0 0 0;
    color: rgb(0, 0, 0);
}

@media screen and (max-width:900px) {

    .textos-header h1 {
        font-size: 50px;
    }

    header {
        background-position: center;
    }

    .contenedor-sobre-nosotros {
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .sobre-nosotros .contenido-textos {
        width: 90%;

    }

    .imagen-about-us {
        width: 90%;
        margin-top: 1px;
    }

    .imagen-port {
        width: 45%;
    }

    .servicio-cont {
        justify-content: center;
        flex-direction: column;
    }

    .servicio-ind {
        width: 100%;
        text-align: center;
    }

    .contenedor-footer {
        flex-direction: column;
        border: none;
    }

    .content-foo {
        margin-bottom: 20px;
        text-align: center;

    }

    .content-foo h4 {
        border: none;
    }

    .content-foo p {
        color: black;
        padding-bottom: 20px;
    }

    .titulo-final {
        font-size: 20px;
    }
}

@media screen and (max-width:450px) {

    .textos-header h1 {
        font-size: 50px;
    }

    .textos-header img {
        width: 300px;
        height: auto;
        /* Esto mantiene la proporción original de la imagen */
    }

    header {
        background-position: center;
    }

    .contenedor-sobre-nosotros {
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .sobre-nosotros .contenido-textos {
        width: 90%;

    }

    .imagen-about-us {
        width: 90%;
        margin-right: 20px; 
        margin-top: 1px;
    }

    .imagen-port {
        width: 45%;
    }

    .servicio-cont {
        justify-content: center;
        flex-direction: column;
    }

    .servicio-ind {
        width: 100%;
        text-align: center;
    }

    .contenedor-footer {
        flex-direction: column;
        border: none;
    }

    .content-foo {
        margin-bottom: 20px;
        text-align: center;

    }

    .content-foo h4 {
        border: none;
    }

    .content-foo p {
        color: black;
        padding-bottom: 20px;
    }

    .titulo-final {
        font-size: 20px;
    }

}


@media screen and (max-width:300px) {

    .textos-header h1 {
        font-size: 50px;
    }

    .textos-header img {
        width: 250px;
        height: auto;
        /* Esto mantiene la proporción original de la imagen */
    }

    header {
        background-position: center;
    }

    .contenedor-sobre-nosotros {
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .sobre-nosotros .contenido-textos {
        width: 90%;

    }

    .imagen-about-us {
        width: 80%;
        float: left;
        margin-right: 10px; 
        

    }

    .imagen-port {
        width: 45%;
    }

    .servicio-cont {
        justify-content: center;
        flex-direction: column;
    }

    .servicio-ind {
        width: 100%;
        text-align: center;
    }

    .contenedor-footer {
        flex-direction: column;
        border: none;
    }

    .content-foo {
        margin-bottom: 20px;
        text-align: center;

    }

    .content-foo h4 {
        border: none;
    }

    .content-foo p {
        color: black;
        padding-bottom: 20px;
    }

    .titulo-final {
        font-size: 20px;
    }
}
    </style>

</head>

<body>


    <header>
   
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link active" aria-current="page" href="#noso" style="color: #fff;">Nosotros</a>
                        <a class="nav-link" href="#ser" style="color: #fff; ">Servicios</a>
                        <a class="nav-link" href="#eve" style="color: #fff;">Eventos</a>
                        <a class="nav-link" href="#con" style="color: #fff;">Contactos</a>
                    </div>
                    @if (Route::has('login'))
                <div class="ml-auto"> <!-- Agregar la clase ml-auto para alinear a la derecha -->
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700" style="color:#fff;">Home</a>
                    @else
                        <a href="{{ route('registro') }}" class="text-sm" style="color:#fff; margin-right: 20px; text-decoration: none;">Iniciar Sesión o Registrarse</a>
                    @endauth
                </div>
            @endif


                    </div>
                </div>
            </div>
        </nav>

        
        <section class="textos-header">
           
        <h1>Centro Ecoturistico <p>La Cumbre Ixtepeji</p></h1>
    </section>
    <div class="wave" style="height: 150px; overflow: hidden;">
        <svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;">
            <path d="M-1.97,78.47 C149.99,150.00 345.65,38.98 499.72,82.41 L500.00,150.00 L0.00,150.00 Z"
                style="stroke: none; fill: #CA4129;"></path>
        </svg>
    </div>
    </header>

    <main>

        <section class="contenedor sobre-nosotros">
            <h2 class="titulo" id="noso"><span class="span1">1</span>Nosotros</h2>
            <div class="contenedor-sobre-nosotros">
                <img src="{{ asset('img/mirador.jpg') }}" alt="" class="imagen-about-us">
                <div class="contenido-textos">
                    <p>El centro ecoturistico "LA CUMBRE IXTEPEJI" comienza a brindar sus servicios a partir del año de 1986, ofreciendo a cada uno de
                        los visitantes un lugar comodo, tranquilo y céntrico para descansar y pasar un momento agradable.
                    </p>
                    <h3><span>.</span>Valores:</h3>
                    <p>1.Honestidad.</p>
                    <p>2.Respeto.</p>
                    <p>3.Creatividad.</p>
                    <p>4.Equidad.</p>
                    <p>5.Solidaridad.</p>
                    <p>7.Puntualidad.</p>
                    <p>8.Responsabilidad.</p>


                </div>
            </div>
        </section>

        <section class="about-services">
            <div class="contenedor">
                <h2 class="titulo" id="ser"><span class="span1">2</span>Servicios</h2>
                <div class="servicio-cont">
                    <div class="servicio-ind">
                        
                        <img src="{{ asset('img/caba.png') }}" alt="" style="height: 130px;">
                        <h3>Cabaña</h3>
                        <p></p>
                    </div>
                    <div class="servicio-ind">
                        <img src="{{ asset('img/restaurante.jpeg') }}" alt="" style="height: 130px;">
                        <h3>Restaurante</h3>
                        <p></p>
                    </div>
                    <div class="servicio-ind">
                        <img src="{{asset ('img/tirolesa.jpg')}}" alt="" style="height: 130px;">
                        <h3>Tirolesa</h3>
                        <p></p>
                    </div>
                    <div class="servicio-ind">
                        <img src="{{ asset('img/caminata.jpg') }}" alt="" style="height: 130px;">
                        <h3>Senderismo</h3>
                        <p></p>
                    </div>
                    <div class="servicio-ind">
                        <img src="{{ asset('img/cil.png') }}" alt="" style="height:130px; width: 70%;">
                        <h3>Cilismo Montaña</h3>
                        <p></p>
                    </div>
                </div>
            </div>

        </section>

        <section class="portafolio">
            <div class="contenedor">
                <h2 class="titulo" id="eve"><span class="span1">3</span>NOS ESPECIALIZAMOS EN</h2>
                <div class="galeria-port">
                    <div class="imagen-port">
                        <img src="{{ asset('img/cabañas.jpeg') }}" alt="">
                        <div class="hover-galeria">
                            <a href="https://www.facebook.com/share/BPkTWZEZJ6oFKQyH/?mibextid=qi2Omg">
                               <!-- <img src="{{ asset('img/cabañas.jpeg') }}" alt="">-->
                            </a>
                            <a href="https://www.facebook.com/share/BPkTWZEZJ6oFKQyH/?mibextid=qi2Omg">
                                <p>CABAÑAS</p>
                            </a>
                        </div>
                    </div>

                    <div class="imagen-port">
                        <img src="{{ asset('img/cilcis.png') }}" alt="">
                        <div class="hover-galeria">
                            <a href="https://fb.watch/oUH3MGM1RX/">
                               <!-- <img src="{{ asset('img/cilcis.png') }}"  alt="">-->
                            </a>
                            <a href="https://fb.watch/oUH3MGM1RX/">
                                <p>CICLISMO</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <footer>
        <div class="contenedor-footer">
            <div class="content-foo" id="con">
                <a
                    href="https://api.whatsapp.com/send?phone=%2B529511585206&fbclid=IwAR3V6HlvHDx93rucVUXm7RhVs_EfsLPH2vFNSBNwldeCUzKjtJtl0pOGUWA"><img
                        src="{{ asset('img/telefono.jpg') }}"  style= "width: 7%;" ></a>
                <h5>Teléfono</h5>
                <p>951 173 5307</p>
                <p>951 560 4039</p>

            </div>
            <div class="content-foo">
                <a href="https://www.facebook.com/profile.php?id=100094426500831"><img src="{{ asset('img/face.png') }}" style= "width: 7%;"
                       ></a>
                <h5>Facebook</h5>
                <p>CENTRO ECOTURISISTICO <br> LA CUMBRE IXTEPEJI</p>
            </div>
            <div class="content-foo">
                <a
                    href="https://maps.app.goo.gl/yLPMqcwaZDsenF6J7"><img
                        src="{{ asset('img/ubicacion.jpg') }}" style= "width: 8%;"></a>
                <h5>Ubicación</h5>
                <p>Carretera federal 175 Oaxaca-Guelatao, Santa Catarina Ixtepeji </p>
            </div>
            <div class="content-foo">
                <a href="https://www.facebook.com/profile.php?id=100094426500831"><img src="{{ asset('img/opinion.jpg') }}"  style= "width:4%;"
                        ></a>
                <h5>Opiniones</h5>
                <p>Lo que nuestros clientes opinan.</p>
            </div>
        </div>
        <h2 class="titulo-final"><b>&copy; Centro Ecoturistico | LA CUMBRE IXTEPEJI</b></h2>
    </footer>
</body>

</html>