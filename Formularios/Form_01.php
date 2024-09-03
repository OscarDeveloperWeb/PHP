<?php
session_start(); 

$errores = [];
$nombre = '';
$categoria = '';
$precio='';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = trim($_POST['nombre']);
    $categoria= trim($_POST['categoria']);
    $precio= trim($_POST['precio']);
    
    if(empty($nombre)){
        $errores['nombre']="El nombre es obligatorio";
    }
    if(empty($categoria)){
        $errores['categoria']="La categoria es obligatorio";
    }

    if(empty($precio)){ 
        $errores['precio']="El precio es obligatorio ";
    }else{
        if ($precio <= 0) { 
        $errores['precio']="El precio debe ser mayor a 0";
        }
    }
    if (empty($errores)) {
        $_SESSION['ultimoComentario'] = ['nombre' => htmlspecialchars($nombre), 
                                         'categoria' => htmlspecialchars($categoria),
                                         'precio' => htmlspecialchars($precio)];
        $nombre = '';
        $categoria = '';
        $precio='';

    } else {
        unset($_SESSION['ultimoComentario']);
    }
}

$ultimoComentario = isset($_SESSION['ultimoComentario']) ? $_SESSION['ultimoComentario'] : null;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Comentarios</title>
</head>
<body>
    <h2>Registro de Producto</h2>

    <form method="POST" action="">
        <label for="nombre">Nombre Producto:</label>
        <input type="text" id="nombre" autocomplete="off" name="nombre" value="<?= htmlspecialchars($nombre) ?>">
        <span style="color:red;"><?= $errores['nombre'] ?? '' ?></span><br><br>

        <label for="comentario">Categoria:</label>
        <input type="text" id="categoria" autocomplete="off" name="categoria" value="<?= htmlspecialchars($categoria) ?>">
        <span style="color:red;"><?= $errores['categoria'] ?? '' ?></span><br><br>

        <label for="nombre">Precio:</label>
        <input type="number" id="precio" autocomplete="off" name="precio" value="<?= htmlspecialchars($precio) ?>">
        <span style="color:red;"><?= $errores['precio'] ?? '' ?></span><br><br>

        <button type="submit">Registrar</button>
    </form>

    <?php if ($ultimoComentario) : ?>
        <h3>Producto Registrado:</h3>
        <p>
            <strong>
                <?= "Producto: ". htmlspecialchars($ultimoComentario['nombre'])."<br>" ?>
            </strong>  <strong><?= "Categoria :".  htmlspecialchars($ultimoComentario['categoria'])."<br>" ?></strong>
            <strong>Precio:</strong> <?= htmlspecialchars($ultimoComentario['precio']) ?>
        </p>
    <?php endif; ?>
    
</body>
</html>



