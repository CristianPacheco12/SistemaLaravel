
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login y Registro - Ixtepeji </title>
    <link rel="icon" href="{{ asset('img/logoixtepeji.jpg') }}" type="image/png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
   <style>
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    text-decoration: none;
    font-family: 'Roboto', sans-serif;  
   }
   body{
    background-image: url("{{ asset('img/fond.jpg') }}");
     background-size: cover;
     background-repeat: no-repeat;
     background-position: center;
   
   
     
     background-attachment: fixed;
   }
   
   main{
       width: 100%;
       padding: 20px;
       margin: auto;
       margin-top: 100px;
   }
   
   
   
   .contenedor__todo{
       width: 100%;
       max-width: 800px;
       margin: auto;
       position: relative;
   
   }
   
   .caja__trasera{
       width: 100%;
       padding: 10px 20px;
       display: flex;
       justify-content: center;
       backdrop-filter: blur(10px);
       background-color: rgba(0, 128, 255, 0.5);
   }
   
   .caja__trasera div{
       margin: 100px 40px;
       color: white;
       transition: all 500ms;
   }
   
   .caja__trasera div p,
   .caja__trasera div button{
       margin-top: 30px;
   }
   
   .caja__trasera div h3{
   font-weight: 400;
   font-size: 26px;
   }
   .caja__trasera button{
       padding: 10px 40px;
       border: 2px solid #fff;
       background: transparent;
       font-size: 14px;
       font-weight: 600;
       cursor: pointer;
       color: white;
       outline: none;
       transform: all 300ms;
   }
   .caja__trasera button:hover{
       background: #fff;
       color: #46a2fd;
   }
   
   
   .contenedor__login-register{
       display: flex;
       align-items: center;
       width: 100%;
       max-width: 380px;
       position: relative;
       top: -185px;
       left: 10px;
   
       transition: left 500ms cubic-bezier(0.175,0.885,0.320,1.275);
   }
   .contenedor__login-register form{
       width: 100%;
       padding: 80px 20px;
       background: #fff;
       position: absolute;
       border-radius: 20px;
   }
   
   .contenedor__login-register form h2{
       font-size: 30px;
       text-align: center;
       margin-bottom: 20px;
       color: #46a2fd;
   }
   
   .contenedor__login-register form input{
       width:100%;
       margin-top: 20px;
       padding: 10px;
       border: none;
       background: #f2f2f2;
       font-size: 16px;
       outline: none;
   }
   
   .contenedor__login-register form button{
       padding: 10px 40px;
       margin-top: 40px;
       border: none;
       font-size: 14px;
       background: #46a2fd;
       color: white;
       cursor: pointer;
       outline: none;
   }
   
   .formulario__login{
       opacity: 1;
       display: block;
   }
   .formulario__register{
   display: none;
   }
   
   /*Trabajando eñ eñ responsive */
   @media screen and(max-width: 850px) {
       main {
           margin-top: 50px;
       }
       .caja__trasera{
           max-width: 350px;
           height: 300px;
           flex-direction: column;
           margin: auto;
       }
       
   
   
   .caja__trasera div{
       margin: 0px;
       position: absolute;
   
   }
   
   
   
   .contenedor__login-register{
       top: -10px;
       left: -5px;
       margin: auto;
   }
   
   .contenedor__login-register form {
       position: relative;
   }
   }


   </style>
</head>
<body>
     <main>
        <div class="contenedor__todo">
        
            <div class="caja__trasera">
              
                <div class="caja__trasera-login">
                    <h3>¿Ya tienes una cuenta?</h3>
                    <p>Inicia sesión para entrar al sitio web</p>
                    <button id="btn_inicar-sesion">Iniciar sesion </button>
                </div>
        
                <div class="caja__trasera-register">
                    <h3>¿Aún no tienes una cuenta?</h3>
                    <p>Registrate para que puedas entrar al sitio web</p>
                    <button id="btn_Resgistrarse">Registrarse</button>
                </div>
            </div>
        <!-- FORMULARIO DE LOGIN Y REGISTRO -->
        <div class="contenedor__login-register">
            <!-- lOGIN -->
            <form action="{{ route('login') }}" method="POST" class="formulario__login">
    @csrf <!-- Esto es para incluir el token CSRF en el formulario de Laravel -->

    <h2>Iniciar sesión</h2>

    @if ($errors->any())
        <div class="alert alert-danger p-0">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="form-group">
        <label for="email">Email</label>
        <input aria-describedby="emailHelpBlock" id="email" type="email"
               class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
               placeholder="Enter Email" tabindex="1"
               value="{{ (Cookie::get('email') !== null) ? Cookie::get('email') : old('email') }}" autofocus
               required>
        <div class="invalid-feedback">
            {{ $errors->first('email') }}
        </div>
    </div>

    <div class="form-group">
        <div class="d-block">
            <label for="password" class="control-label">Contraseña</label>
            
        </div>
        <input aria-describedby="passwordHelpBlock" id="password" type="password"
               value="{{ (Cookie::get('password') !== null) ? Cookie::get('password') : null }}"
               placeholder="Enter Password"
               class="form-control{{ $errors->has('password') ? ' is-invalid': '' }}" name="password"
               tabindex="2" required>
        <div class="invalid-feedback">
            {{ $errors->first('password') }}
        </div>
        <!--  <div class="float-right">
                <a href="{{ route('password.request') }}" class="text-small" style="color:#000;">
                    ¿Olvidaste tu contraseña?
                </a>
            </div> -->
    </div>



    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
            Iniciar sesión
        </button>
    </div>
</form>
             <!--   Resgistro -->
             <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" class="formulario__register">
    @csrf <!-- Esto es para incluir el token CSRF en el formulario de Laravel -->

    <h2>Registrarse</h2>

    @if ($errors->any())
        <div class="alert alert-danger p-0">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="form-group">
        <label for="name">Nombre completo:</label><span class="text-danger">*</span>
        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" tabindex="1" placeholder="Ingrese su nombre completo" value="{{ old('name') }}" autofocus required>
        <div class="invalid-feedback">
            {{ $errors->first('name') }}
        </div>
    </div>

    <div class="form-group">
        <label for="email">Correo electrónico:</label><span class="text-danger">*</span>
        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Ingrese su dirección de correo electrónico" name="email" tabindex="1" value="{{ old('email') }}" required autofocus>
        <div class="invalid-feedback">
            {{ $errors->first('email') }}
        </div>
    </div>

    <div class="form-group">
        <label for="password" class="control-label">Contraseña:</label><span class="text-danger">*</span>
        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid': '' }}" placeholder="Establecer contraseña de la cuenta" name="password" tabindex="2" required>
        <div class="invalid-feedback">
            {{ $errors->first('password') }}
        </div>
    </div>

    <div class="form-group">
        <label for="password_confirmation" class="control-label">Confirmar contraseña:</label><span class="text-danger">*</span>
        <input id="password_confirmation" type="password" placeholder="Confirmar contraseña de la cuenta" class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid': '' }}" name="password_confirmation" tabindex="2" required>
        <div class="invalid-feedback">
            {{ $errors->first('password_confirmation') }}
        </div>
    </div>

    

    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
            Registrarse
        </button>
    </div>
</form>
        </div>
        
        </div>


     </main>
     <script>
document.getElementById("btn_inicar-sesion").addEventListener("click",iniciarSesion);
document.getElementById("btn_Resgistrarse").addEventListener("click",register);
window.addEventListener("resize",anchoPagina);

//variables
var contenedor_login_register=document.querySelector(".contenedor__login-register");
var formulario_login=document.querySelector(".formulario__login");
var formulario_register=document.querySelector(".formulario__register");
var caja_trasera_login=document.querySelector(".caja__trasera-login");
var caja_trasera_register=document.querySelector(".caja__trasera-register");

function anchoPagina()
{
    if(window.innerWidth>850){
        caja_trasera_login.style.display="block";
        caja_trasera_register.style.display="block";

    }else {
        caja_trasera_register.style.display="block";
        caja_trasera_register.style.opacity="1";
        caja_trasera_login.style.display="none";
        formulario_login.style.display="block";
        formulario_register.style.display="none";
        contenedor_login_register.style.left="0px";
        
    }
}

anchoPagina();
function iniciarSesion() {
    if(window.innerWidth > 850){
    formulario_register.style.display="none";
contenedor_login_register.style.left="10px";
formulario_login.style.display="block";
caja_trasera_register.style.opacity="1";
caja_trasera_login.style.opacity="0";
}else{
    formulario_register.style.display="none";
    contenedor_login_register.style.left="0px";
    formulario_login.style.display="block";
    caja_trasera_register.style.display="block";
    caja_trasera_login.style.display="none";

}
}

function register() {
    if(window.innerWidth>850){  
formulario_register.style.display="block";
contenedor_login_register.style.left="410px";
formulario_login.style.display="none";
caja_trasera_register.style.opacity="0";
caja_trasera_login.style.opacity="1";
    }else{
        formulario_register.style.display="block";
    contenedor_login_register.style.left="0px";
    formulario_login.style.display="none";
    caja_trasera_register.style.display="none";
    caja_trasera_login.style.display="block";
    caja_trasera_login.style.opacity="1";
    }
}



     </script>
    
</body>
</html>