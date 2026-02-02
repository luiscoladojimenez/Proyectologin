<?php  
/* PROTEGER PARA QUE SOLO PUEDA USUARIO LOGUEADO */
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: index.html"); // si no hay sesión, volver al login
    exit();
}

// Regenerar ID de sesión para mayor seguridad
session_regenerate_id(true);

// Definir foto de perfil con validación
$foto = !empty($_SESSION['foto']) 
    ? "./imagenes/" . basename($_SESSION['foto']) . ".jpg" 
    : "./imagenes/default.jpg";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuario - Reparación Móviles</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="./libreriabuena/bootstrap.min.css">
    <script src="./libreriabuena/jquery-3.1.1.min.js"></script>
    <script src="./libreriabuena/popper.min.js"></script>
    <script src="./libreriabuena/bootstrap.min.js"></script>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Estilos propios -->
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)),
                        url("./imagenes/fondo/fondo3.jpeg") center/cover no-repeat;
            color: #fff;
            min-height: 100vh;
            margin: 0;
        }
        header {
            background: rgba(0,0,0,0.75);
            color: #fff;
            text-align: center;
            padding: 2rem;
            border-bottom: 6px solid #4CAF50;
        }
        header h1 {
            font-family: 'Lobster', cursive;
            font-size: 2.5rem;
            color: #ff9800;
            text-transform: uppercase;
            text-shadow: 0 5px 15px rgba(255,140,0,0.8);
        }
        .profile-card {
            background: rgba(255,255,255,0.1);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 30px;
            max-width: 600px;
            margin: 50px auto;
            text-align: center;
            box-shadow: 0 8px 20px rgba(0,0,0,0.5);
            animation: fadeIn 1.2s ease;
        }
        .profile-card img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
            border: 3px solid #4CAF50;
            margin-bottom: 20px;
            transition: transform 0.3s ease;
        }
        .profile-card img:hover { transform: scale(1.05); }
        .profile-card h2 { font-weight: 600; margin-bottom: 10px; }
        .profile-card h6 { font-size: 1rem; margin: 8px 0; }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>

    <!-- HEADER -->
    <header>
        <h1>Perfil de Usuario</h1>
    </header>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="./bienvenida.php"><i class="fa-solid fa-house"></i> Inicio</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item"><a class="nav-link active" href="./perfil.php"><i class="fa-solid fa-user"></i> Perfil</a></li>
            <li class="nav-item"><a class="nav-link" href="#"><i class="fa-solid fa-box"></i> Mis pedidos</a></li>
            <li class="nav-item"><a class="nav-link" href="./contacto.html"><i class="fa-solid fa-envelope"></i> Contacto</a></li>
          </ul>
          <a class="btn btn-danger" href="logout.php"><i class="fa-solid fa-right-from-bracket"></i> Salir</a>
        </div>
    </nav>

    <!-- PERFIL -->
    <div class="profile-card">
        <img class="img-fluid rounded-circle border border-success mb-3" 
             src="<?php echo htmlspecialchars($foto); ?>" 
             alt="Foto de perfil de <?php echo htmlspecialchars($_SESSION['usuario']); ?>">
        
        <h2 class="text-warning">Bienvenido, <?php echo htmlspecialchars($_SESSION['usuario']); ?> 🎉</h2>
        <p>Este es tu perfil personal.</p>

        <hr class="my-3">

        <ul class="list-unstyled">
            <li><strong>ID:</strong> <?php echo htmlspecialchars($_SESSION['id']); ?></li>
            <li><strong>Nombre:</strong> <?php echo htmlspecialchars($_SESSION['usuario']); ?></li>
            <li><strong>DNI:</strong> <?php echo htmlspecialchars($_SESSION['dni']); ?></li>
            <li><strong>Email:</strong> <?php echo htmlspecialchars($_SESSION['email']); ?></li>
            <li><strong>Contraseña:</strong> 🔒 Protegida</li>
        </ul>
    </div>

</body>
</html>