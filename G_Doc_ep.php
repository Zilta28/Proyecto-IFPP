<?php
require_once 'vendor/autoload.php'; // Ruta al archivo autoload.php de PHPWord
use PhpOffice\PhpWord\TemplateProcessor;

// Conexión a la base de datos y consulta para obtener los datos del cliente

include("conexion.php");
$getmysql = new mysqlconex();
$getconex = $getmysql->conex();

$idSeleccionado = $_GET['id'];

$consulta = "SELECT * FROM aceptacion_ep WHERE id_ep = $idSeleccionado";
$resultado = mysqli_query($getconex, $consulta);

if ($fila = mysqli_fetch_assoc($resultado)) {
    $documento = new TemplateProcessor('FORMATOS/ACEPTACION_EP.docx');

    // Rellenar los campos del documento con los datos del cliente
    $documento->setValue('nombreExpide', $fila['nombreExpide']);
    $documento->setValue('cargoP', $fila['cargoP']);
    $documento->setValue('nombreEscuela', $fila['nombreEscuela']);
    $documento->setValue('nombrePrestatario', $fila['nombrePrestatario']);
    $documento->setValue('nombreLic', $fila['nombreLic']);
    $documento->setValue('noCuenta', $fila['noCuenta']);
    $documento->setValue('horas', $fila['horas']);


    // Guardar el documento modificado
    header('Content-Disposition: attachment; filename="Documento.docx"');
    $documento->saveAs("php://output");
} else {
    echo "No se encontraron datos para el cliente especificado.";
}

$conexion->close();
?>
