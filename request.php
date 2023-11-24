<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario</title>
    <link rel="stylesheet" href=".\css\styles.css">
</head>
    <body>
        <div>
            <?php
            // Inicializar la variables
            $nombre = '';
            $apellidos = '';
            $email = '';
            $libro = '';
            $dataalquiler = '';
            $dni = '';
            $letras = '';
            $resto = '';
            $mensajeError = ''; 

            //Funcion para verificar el dni
            function verificarDNI($dni) {
                $letras = "TRWAGMYFPDXBNJZSQVHLCKE";

                //Comprovar que el dni esta con en formato correcto (8 digitos y una letra)
                if (!preg_match('/^[0-9]{8}[A-Za-z]$/', $dni)) {
                    return false;
                }

                // Extrair a parte numerica y la letra
                $numeroDNI = substr($dni, 0, 8);
                $letraDNI = strtoupper(substr($dni, 8, 1));

                // Calcular o resto
                $resto = $numeroDNI % 23;

                // Comprobar que a letra calculada coincide con la proporcionada
                if ($letras[$resto] === $letraDNI) {
                    return true;
                } else {
                    return false;
                }
            }

            // Verificar se el formulario fue enviado
            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                // Recuperar datos del formulario
                $nombre = $_POST['nombre'];
                $apellidos = $_POST['apellidos'];
                $email = $_POST['email'];
                $libro = $_POST['libro'];
                $dataalquiler = $_POST['dataalquiler'];
                $dni = $_POST['dni'];

                // Crear array para guardar los nombre de las variables vacias
                $emptyFields = array();

                // Comprovar todos los datos, y se estan vacions guardar su nombre en un array
                if (empty($nombre)) {
                    $emptyFields[] = 'Nombre';
                }
                if (empty($apellidos)) {
                    $emptyFields[] = 'Apellidos';
                }
                if (empty($email)) {
                    $emptyFields[] = 'Email';
                }
                if (empty($libro)) {
                    $emptyFields[] = 'Libro';
                }
                if (empty($dataalquiler)) {
                    $emptyFields[] = 'Data de Alquiler';
                } else {
                    // Verificar que la fecha de alquiler es mayor o igual a la fecha actual
                    $fechaActual = date('Y-m-d');
                    if (strtotime($dataalquiler) < strtotime($fechaActual)) {
                        $mensajeError .= "La fecha de alquiler debe ser igual o posterior a la fecha actual. <br>";
                    }
                    else {
                        $datadevolucion = date('d-m-Y', strtotime($dataalquiler . ' +10 days'));
                    }
                }
                if (empty($dni)) {
                    $emptyFields[] = 'DNI';
                } else {
                    // Verificar el DNI
                    $letras = "TRWAGMYFPDXBNJZSQVHLCKE";
                    $numeroDNI = substr($dni, 0, 8);
                    $letraDNI = strtoupper(substr($dni, 8, 1));
                    $resto = $numeroDNI % 23;
                            
                    if (!verificarDNI($dni)) 
                        $mensajeError .= "<br>El DNI introducido no es válido. La letra correcta sería: " . $letras[$resto];                           
                }

                    // Si algun campo de texto está vacio, printar su nombre 
                    if (!empty($emptyFields)) {
                        echo "<p style='color: red;'><br><b>Por favor rellene los siguientes campos: " . implode(', ', $emptyFields) . "</p>";

                    // Printar messagem de error se campo de DNI no es valido
                    } else if (!empty($mensajeError)) {                  
                    echo "<p style='color: red;'><b>Error: " . $mensajeError . "</b></p>";
                    
                    // En caso de todos los datos estaren completos y correctos, printar la solicitude enviada correctamente con los datos siguientes
                    } else {
                        echo "<h1> Solicitud Enviada</h1>";
                        echo "<p> Nombre: <strong>" . $nombre . "  " . $apellidos . "  </strong><br> Fecha de devolución:  <strong>" . $datadevolucion . " </strong><br> DNI: <strong>" . strtoupper($dni) . "</strong></p>";
                    }
                }
            ?>
        </div>
    </body>
</html>
