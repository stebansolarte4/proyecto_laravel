<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login Biblioteca</title>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <style>
    *{
      margin:0;
      padding:0;
      box-sizing:border-box;
      font-family:'Poppins', sans-serif;
    }

    body{
      height:100vh;
      display:flex;
      justify-content:center;
      align-items:center;
      background:linear-gradient(135deg,#0f172a,#1e293b,#334155);
      overflow:hidden;
    }

    .background{
      position:absolute;
      width:100%;
      height:100%;
      overflow:hidden;
      z-index:0;
    }

    .circle{
      position:absolute;
      border-radius:50%;
      background:rgba(255,255,255,0.05);
      animation:float 8s infinite ease-in-out;
    }

    .circle:nth-child(1){
      width:300px;
      height:300px;
      top:-100px;
      left:-80px;
    }

    .circle:nth-child(2){
      width:200px;
      height:200px;
      bottom:-60px;
      right:50px;
      animation-delay:2s;
    }

    .circle:nth-child(3){
      width:150px;
      height:150px;
      top:50%;
      left:70%;
      animation-delay:4s;
    }

    @keyframes float{
      0%,100%{
        transform:translateY(0px);
      }
      50%{
        transform:translateY(-20px);
      }
    }

    .container{
      position:relative;
      z-index:1;
      width:400px;
      padding:40px;
      border-radius:25px;
      background:rgba(255,255,255,0.1);
      backdrop-filter:blur(15px);
      box-shadow:0 8px 32px rgba(0,0,0,0.3);
      border:1px solid rgba(255,255,255,0.2);
      color:white;
    }

    .logo{
      text-align:center;
      margin-bottom:25px;
    }

    .logo h1{
      font-size:32px;
      font-weight:700;
    }

    .logo p{
      color:#cbd5e1;
      font-size:14px;
      margin-top:5px;
    }

    .input-group{
      margin-bottom:20px;
    }

    .input-group label{
      display:block;
      margin-bottom:8px;
      font-size:14px;
      color:#e2e8f0;
    }

    .input-group input{
      width:100%;
      padding:14px;
      border:none;
      border-radius:12px;
      outline:none;
      background:rgba(255,255,255,0.15);
      color:white;
      font-size:15px;
    }

    .input-group input::placeholder{
      color:#cbd5e1;
    }

    .options{
      display:flex;
      justify-content:space-between;
      align-items:center;
      margin-bottom:20px;
      font-size:13px;
    }

    .options a{
      color:#93c5fd;
      text-decoration:none;
    }

    .btn{
      width:100%;
      padding:14px;
      border:none;
      border-radius:12px;
      background:#3b82f6;
      color:white;
      font-size:16px;
      font-weight:600;
      cursor:pointer;
      transition:0.3s;
    }

    .btn:hover{
      background:#2563eb;
      transform:scale(1.02);
    }

    .footer{
      margin-top:20px;
      text-align:center;
      font-size:14px;
      color:#cbd5e1;
    }

    .footer a{
      color:#93c5fd;
      text-decoration:none;
      font-weight:500;
    }

    @media(max-width:450px){
      .container{
        width:90%;
        padding:30px;
      }
    }
  </style>
</head>

<body>

  <div class="background">
    <div class="circle"></div>
    <div class="circle"></div>
    <div class="circle"></div>
  </div>

  <div class="container">

    <div class="logo">
      <h1>Biblioteca InmaCloud</h1>
      <p>Institución Educativa Inmaculada Concepción</p>
    </div>

    <form action="{{ route('login') }}" method="POST">
      @csrf

      <div class="input-group">
        <label>Correo electrónico</label>
        <input type="email" name="email" required>
      </div>

      <div class="input-group">
        <label>Contraseña</label>
        <input type="password" name="password" required>
      </div>

    
<div>
        <a href="#">¿Olvidaste tu contraseña?</a>
      </div>

    

      <button type="submit" class="btn">
  Iniciar Sesión
</button>

<form action="{{ route('logout') }}" method="POST">
  @csrf
  <button type="submit" class="logout-btn">
    Cerrar Sesión
  </button>
</form>

    

    </form>

    <div class="footer">
      ¿No tienes cuenta?
      <a href="{{ route('register') }}">Registrarse</a>
    </div>

  </div>

</body>
</html>