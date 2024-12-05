<?php
include("conexion.php");
$getmysql = new mysqlconex();
$getconex = $getmysql->conex();

$idSeleccionado = $_GET['id'];

$consulta = "SELECT * FROM terminacion_ea WHERE Id_ea = $idSeleccionado";
$resultado = mysqli_query($getconex, $consulta);

if ($fila = mysqli_fetch_assoc($resultado)) {
    $id = $fila['Id_ea'];

    $query = "DELETE FROM terminacion_ea WHERE Id_ea = ?";
    $sentencia = mysqli_prepare($getconex, $query);
    mysqli_stmt_bind_param($sentencia, "i", $id);
    mysqli_stmt_execute($sentencia);
    $afectado = mysqli_stmt_affected_rows($sentencia);

    if ($afectado == 1) {
        $rutaImagen = $fila['ruta'];
        if (file_exists($rutaImagen)) {
            unlink($rutaImagen);
        }
        echo "<script>alert('Eliminacion exitosa'); location.href='ea_lib_table.php';</script>";
    } else {
        echo "<script>alert('Error al eliminar'); location.href='ea_lib_table.php';</script>";
  
    }
}
?>