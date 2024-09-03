<?php
$usuarios = []; 
$errores = [];
$mensaje = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = trim($_POST['nombre']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (empty($nombre)) {
        $errores['nombre'] = 'El nombre es obligatorio.';
    }

    if (empty($email)) {
        $errores['email'] = 'El correo electrónico es obligatorio.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errores['email'] = 'El correo electrónico no es válido.';
    }

    if (empty($password)) {
        $errores['password'] = 'La contraseña es obligatoria.';
    } elseif (strlen($password) < 8) {
        $errores['password'] = 'La contraseña debe tener al menos 8 caracteres.';
    }

    if (empty($errores)) {
        $usuarios[] = ['nombre' => $nombre, 'email' => $email, 'password' => $password];

        $mensaje = "Registro exitoso. Todo está correcto.";
    } else {
        $mensaje = "Algo está mal. Por favor, corrige los errores.";
    }
}  
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuarios</title>
</head>
<body>
    <h2>Registro de Usuarios</h2>

    <form method="POST" action="">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" autocomplete="off" name="nombre" value="<?= htmlspecialchars($nombre ?? '') ?>">
        <span style="color:red;"><?= $errores['nombre'] ?? '' ?></span><br>

        <label for="email">Correo Electrónico:</label>
        <input type="email" id="email"autocomplete="off" name="email" value="<?= htmlspecialchars($email ?? '') ?>">
        <span style="color:red;"><?= $errores['email'] ?? '' ?></span><br>

        <label for="password">Contraseña:</label>
        <input type="password" id="password"autocomplete="off" name="password">
        <span style="color:red;"><?= $errores['password'] ?? '' ?></span><br>

        <button type="submit">Registrar</button>
    </form>
    <?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo "<p>$mensaje</p>";
    }
    ?>
</body>
</html>

