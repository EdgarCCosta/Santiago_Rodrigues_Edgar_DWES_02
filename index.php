<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario</title>
    <link rel="stylesheet" href=".\css\styles.css">
</head>
<body>


    
    <h1>Solicitar libro</h1>

    <form action="request.php" method="post">

        <!-- Text input para nombre -->
        <br>
        <label for="nombre">Nombre:</label>
        <br>
        <input type="text" name="nombre" >
        <br>

        <!-- Text input para apellidos -->
        <br>
        <label for="apellidos">Apellidos:</label>
        <br>
        <input type="text" name="apellidos" >
        <br>

        <!-- Text input para libro -->
        <br>
        <label for="libro">Libro:</label>
        <br>
        <input type="text" id="libro" name="libro" >
        <br>

        <!-- Email input para email -->
        <br>
        <label for="email">Email:</label>
        <br>
        <input type="email" id="email" name="email"  required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
        <br>

        <!-- date input para dataalquiler -->
        <br>
        <label for="dataalquiler">Fecha de Alquiler:</label>
        <br>
        <input type="date" id="dataalquiler" name="dataalquiler" >
        <br>

        <!-- text input for dni -->
        <br>
        <label for="dni">DNI:</label>
        <br>
        <input type="text" id="dni" name="dni" >
        <br>

        <!-- Submit Button -->
        <br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>

