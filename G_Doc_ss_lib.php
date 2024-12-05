<?php
require_once 'vendor/autoload.php'; // Ruta al archivo autoload.php de PHPWord
use PhpOffice\PhpWord\TemplateProcessor;

// Conexión a la base de datos y consulta para obtener los datos del cliente

include("conexion.php");
$getmysql = new mysqlconex();
$getconex = $getmysql->conex();

$idSeleccionado = $_GET['id'];

$consulta = "SELECT * FROM terminacion_ss WHERE Id_ss = $idSeleccionado";
$resultado = mysqli_query($getconex, $consulta);

if ($fila = mysqli_fetch_assoc($resultado)) {
    
    $documento = new TemplateProcessor('FORMATOS/TERMINACION_SS.docx');

    // Rellenar los campos del documento con los datos del cliente
    $documento->setValue('nombreExpide', $fila['nombreExpide']);
    $documento->setValue('cargoPer', $fila['cargoPer']);
    $documento->setValue('nombreEscuela', $fila['nombreEscuela']);
    $documento->setValue('nombreEstudiante', $fila['nombreEstudiante']);
    $documento->setValue('carrera', $fila['carrera']);
    $documento->setValue('noCuenta', $fila['noCuenta']);
    $documento->setValue('area', $fila['area']);
    $documento->setValue('subarea', $fila['subarea']);
    $documento->setValue('jefeInmediato', $fila['jefeInmediato']);
    $documento->setValue('numHoras', $fila['numHoras']);
    $documento->setValue('periodo_inicio', $fila['periodo_inicio']);
    $documento->setValue('periodo_final', $fila['periodo_final']);

    // Guardar el documento modificado
    header('Content-Disposition: attachment; filename="Documento.docx"');
    $documento->saveAs("php://output");
} else {
    echo "No se encontraron datos para el cliente especificado.";
}

$conexion->close();
?>
