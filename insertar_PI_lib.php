<?php
include("conexion.php");
$getmysql = new mysqlconex();
$getconex = $getmysql->conex();

if(isset($_POST["registrar"])){
    $nombreExpide = strtoupper($_POST["nombreExpide"]);
    $cargoPer =strtoupper($_POST["cargoPer"]);
    $nombreEscuela = strtoupper($_POST["nombreEscuela"]);
    $nombreEstudiante =strtoupper($_POST["nombreEstudiante"]);
    $carrera = strtoupper($_POST["carrera"]);
    $noCuenta = $_POST["noCuenta"];
    $area = strtoupper($_POST["area"]);
    $subarea = strtoupper($_POST["subarea"]);
    $jefeInmediato =strtoupper($_POST["jefeInmediato"]);
    $numHoras = $_POST["numHoras"];
    $periodo_inicio = strtoupper($_POST["periodo_inicio"]);
    $periodo_final = strtoupper($_POST["periodo_final"]);
    $foto = $_FILES["foto"];
    $fotoNombre = $foto["name"];
    $fotoTmpName = $foto["tmp_name"];
    $fotoRuta = "Fotografias/" . $fotoNombre; 


    if(move_uploaded_file($fotoTmpName, $fotoRuta)){
    $query = "INSERT INTO terminacion_pi (nombreExpide, cargoPer, nombreEscuela, nombreEstudiante, carrera, noCuenta, area, subarea, jefeInmediato , numHoras, periodo_inicio, periodo_final, ruta) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $sentencia = mysqli_prepare($getconex, $query);
    mysqli_stmt_bind_param($sentencia, "sssssssssssss", $nombreExpide , $cargoPer, $nombreEscuela, $nombreEstudiante, $carrera, $noCuenta, $area, $subarea, $jefeInmediato,$numHoras,$periodo_inicio,$periodo_final, $fotoRuta);
    mysqli_stmt_execute($sentencia);
    $afectado = mysqli_stmt_affected_rows($sentencia);
    if($afectado == 1){
        echo "<script>
        var message = 'El prestatario [$nombreEstudiante] se agregó correctamente. Deberás presentar la siguiente documentación en físico en el IFPP:\\n\\n' +
                      '- (ORIGINAL) CARTA DE PRESENTACIÓN DIRIGIDA: DR. FABIÁN HERNÁNDEZ GALICIA. TITULAR DEL INSTITUTO DE FORMACIÓN PROFESIONAL DE PROCURADURÍA GENERAL DE JUSTICIA DEL ESTADO DE HIDALGO.\\n' +
                      '- (ORIGINAL) CONSTANCIA DE ESTUDIOS.\\n' +
                      '- (COPIA) CURP.\\n' +
                      '- (COPIA) INE.\\n' +
                      '- (COPIA) ACTA DE NACIMIENTO.\\n' +
                      '- CURRICULUM VITAE.\\n' +
                      '- FOLDER TAMAÑO CARTA COLOR BEIGE';
        alert(message);
        location.href = 'Form_PI_Lib.html';
    </script>";
    }
    else{
        echo "<script> alert('El prestatario [$nombreEstudiante] NO se agregó correctamente'); location.href='Form_PI_Lib.html';</script>";
    }
    mysqli_stmt_close($sentencia);
}
else{
    echo "<script> alert('Error al cargar la foto'); </script>";
}
    mysqli_close($getconex);
}
?>
