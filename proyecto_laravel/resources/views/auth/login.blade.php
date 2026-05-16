<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Login | Biblioteca InmaCloud</title>

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

        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            /* FONDO DE LIBROS CON OVERLAY OSCURO */
            background: linear-gradient(
                rgba(15, 23, 42, 0.7), 
                rgba(15, 23, 42, 0.7)
            ), 
            url('https://images.unsplash.com/photo-1507842217343-583bb7270b66?q=80&w=1200&auto=format&fit=crop');
            background-size: cover;
            background-position: center;
            overflow: hidden;
        }

        /* Efecto de círculos flotantes sutiles */
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
            background:rgba(255, 255, 255, 0.05);
            animation:float 8s infinite ease-in-out;
        }

        .circle:nth-child(1){ width:300px; height:300px; top:-100px; left:-80px; }
        .circle:nth-child(2){ width:200px; height:200px; bottom:-60px; right:50px; animation-delay:2s; }

        @keyframes float{
            0%,100%{ transform:translateY(0px); }
            50%{ transform:translateY(-30px); }
        }

        .container{
            position:relative;
            z-index:1;
            width:400px;
            padding:40px;
            border-radius:30px;
            /* EFECTO CRISTAL MÁS REFINADO */
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: white;
        }

        .logo{
            text-align:center;
            margin-bottom:30px;
        }

        .logo h1{
            font-size:28px;
            font-weight:700;
            letter-spacing: -1px;
        }

        .logo span {
            color: #f59e0b; /* Color ámbar como el Welcome */
        }

        .logo p{
            color: #e2e8f0;
            font-size:13px;
            margin-top:5px;
            opacity: 0.8;
        }

        .input-group{
            margin-bottom:20px;
        }

        .input-group label{
            display:block;
            margin-bottom:8px;
            font-size:13px;
            font-weight: 500;
            color:#f1f5f9;
        }

        .input-group input{
            width:100%;
            padding:14px;
            border: 1px solid rgba(255,255,255,0.1);
            border-radius:15px;
            outline:none;
            background:rgba(255,255,255,0.1);
            color:white;
            transition: 0.3s;
        }

        .input-group input:focus {
            background: rgba(255,255,255,0.2);
            border-color: #f59e0b;
        }

        .options{
            margin: -10px 0 20px 0;
            text-align: right;
        }

        .options a{
            color:#fbbf24;
            text-decoration:none;
            font-size: 12px;
            transition: 0.3s;
        }

        .options a:hover {
            text-decoration: underline;
        }

        .btn{
            width:100%;
            padding:14px;
            border:none;
            border-radius:15px;
            background:#d97706; /* Ámbar oscuro */
            color:white;
            font-size:16px;
            font-weight:600;
            cursor:pointer;
            transition:0.4s;
            box-shadow: 0 10px 15px -3px rgba(217, 119, 6, 0.3);
        }

        .btn:hover{
            background:#b45309;
            transform:translateY(-2px);
            box-shadow: 0 20px 25px -5px rgba(217, 119, 6, 0.4);
        }

        .footer{
            margin-top:25px;
            text-align:center;
            font-size:14px;
            color:#cbd5e1;
        }

        .footer a{
            color:#fbbf24;
            text-decoration:none;
            font-weight:600;
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
    </div>

    <div class="container">
        <div class="logo">
            <h1>INMA<span>CLOUD</span></h1>
            <p>I.E. Inmaculada Concepción</p>
        </div>

        <form action="{{ route('login') }}" method="POST">
            @csrf

            <div class="input-group">
                <label>Correo electrónico</label>
                <input type="email" name="email" placeholder="ejemplo@correo.com" required>
            </div>

            <div class="input-group">
                <label>Contraseña</label>
                <input type="password" name="password" placeholder="••••••••" required>
            </div>

            <div class="options">
                <a href="#">¿Olvidaste tu contraseña?</a>
            </div>

            <button type="submit" class="btn">
                Entrar a la Biblioteca
            </button>
        </form>

      
    </div>

</body>
</html>