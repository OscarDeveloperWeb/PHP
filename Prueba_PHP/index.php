<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script src="Controllers/ajax.js"></script>
    <title>Datos</title>
</head>
<body>
    <h1>Datos de pobreza por Año:</h1>
    <h1 id="fecha" name="fecha" ></h1>
    <form >
        <label for="inicio">Año Inicial:</label>
        <input type="number" name="inicio" id="inicio">
        <label for="final">Año Final:</label>
        <input type="number" name="final" id="final">
        <input type="button" value="Generar Gráfico" id="Graficar">
    </form>
    <div id="container" style="width:100%; height:400px;"></div>
</body>
</html>
