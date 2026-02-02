<?php
session_start();

$host = "127.0.0.1";
$port = "3307"; // cámbialo a 3306 si tu MySQL usa el puerto por defecto
$dbname = "reparacionmoviles";
$user = "root";
$pass = "";

try {
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if(isset($_POST['dni']) && isset($_POST['contrasena'])){
        $dni = trim($_POST['dni']);
        $contrasena = trim($_POST['contrasena']);

        $stmt = $pdo->prepare("SELECT id , nombre, dni , email , foto ,contrasena FROM usuarios WHERE dni = ?");
        $stmt->execute([$dni]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if($usuario && password_verify($contrasena, $usuario['contrasena'])){
            // Guardar sesión
            $_SESSION['id'] = $usuario['id'];
            $_SESSION['usuario'] = $usuario['nombre'];
            $_SESSION['dni'] = $usuario['dni'];      
            $_SESSION['email'] = $usuario['email'];
            $_SESSION['foto'] = $usuario['foto'];
            $_SESSION['contrasena'] = $usuario['contrasena'];

            echo "success"; // devolvemos un indicador de éxito
        } else {
        echo "<div class='alert alert-danger'>DNI o contraseña incorrectos.</div>";        }
    } else {
        echo "Faltan datos.";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>