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
    $numHoras = $_POST["numHoras"];
    $foto = $_FILES["foto"];
    $fotoNombre = $foto["name"];
    $fotoTmpName = $foto["tmp_name"];
    $fotoRuta = "Fotografias/" . $fotoNombre; 
    $telefono= $_POST["telefono"];
    $dj= $_POST["dj"];

    if(move_uploaded_file($fotoTmpName, $fotoRuta)){
    $query = "INSERT INTO aceptacion_pp (nombreExpide, cargoPer, nombreEscuela, nombreEstudiante, carrera, noCuenta, numHoras, ruta, telefono, dj) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $sentencia = mysqli_prepare($getconex, $query);
    mysqli_stmt_bind_param($sentencia, "ssssssssss", $nombreExpide , $cargoPer, $nombreEscuela, $nombreEstudiante, $carrera, $noCuenta, $numHoras, $fotoRuta,$telefono,$dj);
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
        location.href = 'Form_PP.html';
    </script>";
    }
    else{
        echo "<script> alert('El prestatario [$nombreEstudiante] NO se agregó correctamente'); location.href='Form_PP.html';</script>";
    }
    mysqli_stmt_close($sentencia);
}
else{
    echo "<script> alert('Error al cargar la foto'); </script>";
}
    mysqli_close($getconex);
}
?>
