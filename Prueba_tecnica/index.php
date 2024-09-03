<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="./ajax.js"></script>
    <title>Gráfico histórico del índice pobreza en el Perú</title>
</head>
<body>
    <h1>Gráfico de Pobreza del Perú</h1>
    <form action="" class="" method="get">
        <label for="inicio">Año Inicial:</label>
        <input type="number" name="inicio" id="inicio">
        <label for="final">Año Final:</label>
        <input type="number" name="final" id="final">
        <input type="button" value="Generar Gráfico" id="Graficar">
    </form>
    <div id="container" style="width:100%; height:400px;"></div>
</body>
</html>
