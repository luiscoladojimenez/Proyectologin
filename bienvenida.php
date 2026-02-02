<?php  
session_start();
if(!isset($_SESSION['usuario'])){
    header("Location: index.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Bienvenida</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Fuentes y Bootstrap -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Lobster&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="./libreriabuena/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>
    :root {
      --color-primary: #1F4D8F;
      --color-secondary: #FF7A00;
      --color-bg: #F5F7FB;
      --color-text: #1A1A1A;
      --color-border: #D7DCE5;
    }
    body {
      font-family: 'Inter', sans-serif;
      margin:0; padding:0;
      background:url("./imagenes/fondo/fondo3.jpeg") center/cover no-repeat;
      color:var(--color-text);
    }
    header {
      background:rgba(0,0,0,0.75);
      text-align:center;
      padding:2rem;
      border-bottom:6px solid var(--color-primary);
    }
    header h1 {
      font-family:'Lobster', cursive;
      font-size:3rem;
      color:var(--color-secondary);
      text-transform:uppercase;
      text-shadow:0 5px 15px rgba(255,140,0,0.8);
    }
    .container {
      padding:3rem 1.5rem;
      max-width:1200px;
      margin:30px auto;
      background:rgba(255,255,255,0.95);
      border-radius:15px;
      box-shadow:0 12px 20px rgba(0,0,0,0.1);
    }
    .card {
      border:none;
      border-radius:12px;
      box-shadow:0 6px 16px rgba(0,0,0,0.08);
      transition:transform 0.2s;
    }
    .card:hover { transform:translateY(-5px); }
    .btn-primary {
      background:var(--color-primary);
      border:none;
      border-radius:8px;
      font-weight:600;
    }
    .btn-primary:hover { background:#163a6a; }
    footer {
      background:#222;
      color:#fff;
      text-align:center;
      padding:1.5rem;
      margin-top:50px;
    }
    footer a { color:var(--color-secondary); margin:0 10px; }
    .social-icons a {
      color:#fff; margin:0 10px; font-size:1.3rem; transition:0.3s;
    }
    .social-icons a:hover { color:var(--color-secondary); transform:scale(1.2); }
  </style>
</head>
<body>

  <header><h1>Reparación de Móviles</h1></header>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand active" href="./bienvenida.php"><i class="fa-solid fa-house"></i> Inicio</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"><span class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item"><a class="nav-link" href="./perfil.php"><i class="fa-solid fa-user"></i> Perfil</a></li>
        <li class="nav-item"><a class="nav-link" href="./pedidos.html"><i class="fa-solid fa-box"></i> Mis pedidos</a></li>
        <li class="nav-item"><a class="nav-link" href="./contacto.html"><i class="fa-solid fa-envelope"></i> Contacto</a></li>
      </ul>
      <a class="btn btn-danger" href="logout.php"><i class="fa-solid fa-right-from-bracket"></i> Salir</a>
    </div>
  </nav>

  <main class="container text-center">
    <h2 class="mt-4">Bienvenido, <?php echo htmlspecialchars($_SESSION['usuario']); ?> 🎉</h2>
    <p>Has iniciado sesión correctamente en tu cuenta.</p>
    <!-- Tarjetas de servicios -->
    <section class="mt-5">
      <h3>Servicios destacados</h3>
      <div class="row mt-4">
        <!-- Tarjeta 1 -->
        <div class="col-md-4">
          <div class="card">
            <img src="./imagenes/servicios/pantalla.jpg" class="card-img-top" alt="Reparación de pantallas de móviles">
            <div class="card-body">
              <h5 class="card-title">Reparación de Pantallas</h5>
              <p class="card-text">Cambia tu pantalla rota con repuestos originales.</p>
              <a href="#" class="btn btn-primary">Solicitar</a>
            </div>
          </div>
        </div>
        <!-- Tarjeta 2 -->
        <div class="col-md-4">
          <div class="card">
            <img src="./imagenes/servicios/bateria.jpg" class="card-img-top" alt="Cambio de batería de móviles">
            <div class="card-body">
              <h5 class="card-title">Cambio de Batería</h5>
              <p class="card-text">Recupera la autonomía de tu móvil en minutos.</p>
              <a href="#" class="btn btn-primary">Solicitar</a>
            </div>
          </div>
        </div>
        <!-- Tarjeta 3 -->
        <div class="col-md-4">
          <div class="card">
            <img src="./imagenes/servicios/software.jpg" class="card-img-top" alt="Solución de problemas de software">
            <div class="card-body">
              <h5 class="card-title">Solución de Software</h5>
              <p class="card-text">Actualizaciones, limpieza de virus y optimización.</p>
              <a href="#" class="btn btn-primary">Solicitar</a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

  <footer>
    <p>&copy; <?php echo date("Y"); ?> Reparación de Móviles - Todos los derechos reservados</p>
    <p>Teléfono: +34 671 120 085 | Email: contacto@reparaciontelefonos.com</p>
    <div class="social-icons">
      <a href="#"><i class="fa-brands fa-facebook"></i></a>
      <a href="#"><i class="fa-brands fa-twitter"></i></a>
      <a href="#"><i class="fa-brands fa-instagram"></i></a>
    </div>
    <p><a href="#">Política de privacidad</a> | <a href="#">Términos de uso</a></p>
  </footer>

</body>
</html>