<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

<form id="miFormulario"  action="" >
    <h1>Registro de alumno</h1>
    <label for="nombre">Digita tu nombre:</label><br>
    <input type="text" name="nombre"  id="nombre" autocomplete="off" placeholder="Escribe tu nombre" required ><br>
    <label for="Edad">Edad:</label><br>
    <input type="number" name="edad" id="edad" autocomplete="off" placeholder="Edad"><br><br>
    <label for="carrera">Carrera</label>
    <select name="carrera" id="carrera">
        <option value="software">Ing Software</option>
        <option value="sistemas">Ing Sistemas</option>
        <option value="iformatica">Ing Informatica</option>
    </select>
    <br>
    <label for="confirmacion">Eres estudiante</label><br>
        <div class="form-check">
            <label class="form-check-label" for="opcion1">SI</label>
            <input class="form-check-input" type="radio" name="opcion" id="opcion1" value="Si">
        </div>
        <div class="form-check">
            <label class="form-check-label" for="opcion2">NO</label>
            <input class="form-check-input" type="radio" name="opcion" id="opcion2" value="No">
        </div>
        <button  class="btn btn-primary" type="submit">Enviar</button>
</form>
<table id="miTable" class="table">
 <thead>
    <tr>
      <th scope="col">Nombre</th>
      <th scope="col">Edad</th>
      <th scope="col">Carrera</th>
      <th scope="col">Estudiante</th>
    </tr>
 </thead>
 <tbody>
    <tr>
      <td><span id="nombres"  ></span> </td>
      <td><span id="edads"  ></span> </td>
      <td><span id="carreras"  ></span> </td>
      <td><span id="estudiantes"  ></span> </td>
    </tr>
 </tbody>
</table>
<script>
    document.getElementById('miFormulario').addEventListener('submit', function(event) {
        event.preventDefault();
        var nombre = document.getElementById('nombre').value;
        var edad=document.getElementById('edad').value;
        var carrera=document.getElementById('carrera').value;
        var estudiante=document.querySelector('input[name="opcion"]:checked').value;

        document.getElementById('nombres').textContent = nombre;
        document.getElementById('edads').textContent=edad;
        document.getElementById('carreras').textContent=carrera;
        document.getElementById('estudiantes').textContent=estudiante;

    });
</script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>