<?php
include("conexion.php");
$getmysql = new mysqlconex();
$getconex = $getmysql->conex();

if (isset($_POST["registrar"])) {
    $directivo = strtoupper($_POST["directivo"]);
    $cargo = strtoupper($_POST["cargo"]);
    $escuela = strtoupper($_POST["escuela"]);
    $prestatario = strtoupper($_POST["prestatario"]);
    $carrera = strtoupper($_POST["carrera"]);
    $matricula = $_POST["matricula"];
    $horas = $_POST["horas"];
    $foto = $_FILES["foto"];
    $fotoNombre = $foto["name"];
    $fotoTmpName = $foto["tmp_name"];
    $fotoRuta = "Fotografias/" . $fotoNombre;
    $telefono= $_POST["telefono"];
    $dj= $_POST["dj"];

    if (move_uploaded_file($fotoTmpName, $fotoRuta)) {
        $query = "INSERT INTO aceptacion_pi (directivo, cargo, escuela, prestatario, carrera, matricula, horas, ruta, telefono, dj) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $sentencia = mysqli_prepare($getconex, $query);
        mysqli_stmt_bind_param($sentencia, "ssssssssss", $directivo, $cargo, $escuela, $prestatario, $carrera, $matricula, $horas, $fotoRuta,$telefono,$dj);
        mysqli_stmt_execute($sentencia);
        $afectado = mysqli_stmt_affected_rows($sentencia);
        if ($afectado == 1) {
            echo "<script>
            var message = 'El prestatario [$prestatario] se agregó correctamente. Deberás presentar la siguiente documentación en físico en el IFPP:\\n\\n' +
                          '- (ORIGINAL) CARTA DE PRESENTACIÓN DIRIGIDA: DR. FABIÁN HERNÁNDEZ GALICIA. TITULAR DEL INSTITUTO DE FORMACIÓN PROFESIONAL DE PROCURADURÍA GENERAL DE JUSTICIA DEL ESTADO DE HIDALGO.\\n' +
                          '- (ORIGINAL) CONSTANCIA DE ESTUDIOS.\\n' +
                          '- (COPIA) CURP.\\n' +
                          '- (COPIA) INE.\\n' +
                          '- (COPIA) ACTA DE NACIMIENTO.\\n' +
                          '- CURRICULUM VITAE.\\n' +
                          '- FOLDER TAMAÑO CARTA COLOR BEIGE';
            alert(message);
            location.href = 'Form_PI.html';
        </script>";
        

        } else {
            echo "<script> alert('El prestatario [$prestatario] NO se agregó correctamente'); location.href='Form_PI.html';</script>";
        }
        mysqli_stmt_close($sentencia);
    } else {
        echo "<script> alert('Error al cargar la foto'); </script>";
    }
    mysqli_close($getconex);
}
