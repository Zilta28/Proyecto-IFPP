<?php
require_once 'vendor/autoload.php'; // Ruta al archivo autoload.php de PHPWord
use PhpOffice\PhpWord\TemplateProcessor;

// Conexión a la base de datos y consulta para obtener los datos del cliente

include("conexion.php");
$getmysql = new mysqlconex();
$getconex = $getmysql->conex();

$idSeleccionado = $_GET['id'];

$consulta = "SELECT * FROM aceptacion_pp WHERE Id_pp = $idSeleccionado";
$resultado = mysqli_query($getconex, $consulta);

if ($fila = mysqli_fetch_assoc($resultado)) {
    
    $documento = new TemplateProcessor('FORMATOS/ACEPTACION_PP.docx');

    // Rellenar los campos del documento con los datos del cliente
    $documento->setValue('nombreExpide', $fila['nombreExpide']);
    $documento->setValue('cargoPer', $fila['cargoPer']);
    $documento->setValue('nombreEscuela', $fila['nombreEscuela']);
    $documento->setValue('nombreEstudiante', $fila['nombreEstudiante']);
    $documento->setValue('carrera', $fila['carrera']);
    $documento->setValue('noCuenta', $fila['noCuenta']);
    $documento->setValue('numHoras', $fila['numHoras']);


    // Guardar el documento modificado
    header('Content-Disposition: attachment; filename="Documento.docx"');
    $documento->saveAs("php://output");
} else {
    echo "No se encontraron datos para el cliente especificado.";
}

$conexion->close();
?>
