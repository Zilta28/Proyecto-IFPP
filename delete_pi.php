<?php
include("conexion.php");
$getmysql = new mysqlconex();
$getconex = $getmysql->conex();

$idSeleccionado = $_GET['id'];

$consulta = "SELECT * FROM aceptacion_pi WHERE Id_pi = $idSeleccionado";
$resultado = mysqli_query($getconex, $consulta);

if ($fila = mysqli_fetch_assoc($resultado)) {
    $id = $fila['Id_pi'];

    $query = "DELETE FROM aceptacion_pi WHERE Id_pi = ?";
    $sentencia = mysqli_prepare($getconex, $query);
    mysqli_stmt_bind_param($sentencia, "i", $id);
    mysqli_stmt_execute($sentencia);
    $afectado = mysqli_stmt_affected_rows($sentencia);

    if ($afectado == 1) {
        // Eliminar la imagen física del servidor
        $rutaImagen = $fila['ruta'];
        if (file_exists($rutaImagen)) {
            unlink($rutaImagen);
        }

        echo "<script>alert('Eliminación exitosa'); location.href='pi_table.php';</script>";
    } else {
        echo "<script>alert('Error al eliminar'); location.href='pi_table.php';</script>";
    }
}
?>
