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

   

    if(isset($_POST['nombre'], $_POST['dni'], $_POST['email'], $_POST['foto'], $_POST['contrasena'])){
      
        $idgenerado = $pdo->lastInsertId();
        $nombre = trim($_POST['nombre']);
        $dni = trim($_POST['dni']);
        $email = trim($_POST['email']);
        $foto = trim($_POST['foto']);
        $contrasena = trim($_POST['contrasena']);

        // Encriptar la contraseña
        $hash = password_hash($contrasena, PASSWORD_DEFAULT);

        // Insertar usuario
        $stmt = $pdo->prepare("INSERT INTO usuarios (id ,nombre, dni, email ,foto , contrasena) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$idgenerado,$nombre, $dni, $email, $foto, $hash]);

        
        // Guardar sesión y devolver éxito
        $_SESSION['id'] = $pdo->lastInsertId();
        $_SESSION['usuario'] = $nombre;
        $_SESSION['dni'] = $dni;
        $_SESSION['email'] = $email;
        $_SESSION['foto'] = $foto;
        $_SESSION['contrasena'] = $hash;

        echo "success";
    } else {
        echo "Faltan datos.";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>