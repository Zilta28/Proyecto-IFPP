<?php
include("conexion.php");
$getmysql = new mysqlconex();
$getconex = $getmysql->conex();

$idSeleccionado = $_GET['id'];

// Comprobar si se ha enviado el formulario de edición
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $id = $_POST["id"];
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

    // Realizar la actualización en la base de datos
    $query = "UPDATE terminacion_ea  SET nombreExpide = ?, cargoPer = ?, nombreEscuela = ?, nombreEstudiante = ?, carrera = ?, noCuenta = ?, area = ?, subarea = ?,jefeInmediato = ?, numHoras = ?, periodo_inicio = ?, periodo_final = ?  WHERE Id_ea = ?";
    $sentencia = mysqli_prepare($getconex, $query);
    mysqli_stmt_bind_param($sentencia, "ssssssssssssi", $nombreExpide , $cargoPer, $nombreEscuela, $nombreEstudiante, $carrera, $noCuenta, $area, $subarea, $jefeInmediato,$numHoras,$periodo_inicio,$periodo_final, $id);
    mysqli_stmt_execute($sentencia);
    $afectado = mysqli_stmt_affected_rows($sentencia);

    if ($afectado == 1) {
        echo "<script>alert('Registro actualizado correctamente'); location.href='ea_lib_table.php';</script>";
        exit();
    } else {
        echo "<script>alert('Error al actualizar el registro'); location.href='ea_lib_table.php';</script>";
        exit();
    }
}

// Obtener los datos del registro a editar
$consulta = "SELECT * FROM terminacion_ea WHERE Id_ea = $idSeleccionado";
$resultado = mysqli_query($getconex, $consulta);
$fila = mysqli_fetch_assoc($resultado);

// Asegurarse de que se encontró el registro a editar
if (!$fila) {
    echo "<script>alert('Registro no encontrado'); location.href='ea_lib_table.php';</script>";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Editar Registro</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <style>
    .form-group {
      position: relative;
    }
  </style>
</head>
<body>
  <div class="container">
  <h1>Edicion de registro</h1>
    
    <form method="POST" action="">
        <div class="form-group">
            <input type="hidden" class="form-control" name="id" value="<?php echo $fila['Id_ea']; ?>">
          </div>
      <div class="form-group">
        <label for="nombreExpide">Nombre: </label>
        <input type="text" class="form-control" name="nombreExpide" value="<?php echo $fila['nombreExpide']; ?>">
      </div>
      
      <div class="form-group">
        <label for="cargoPer">Cargo: </label>
        <input type="text" class="form-control" name="cargoPer" value="<?php echo $fila['cargoPer']; ?>">
      </div>
      
      <div class="form-group">
        <label for="nombreEscuela">Escuela: </label>
        <input type="text" class="form-control" name="nombreEscuela" value="<?php echo $fila['nombreEscuela']; ?>">
      </div>
      <div class="form-group">
        <label for="nombreEstudiante">Prestatario: </label>
        <input type="text" class="form-control" name="nombreEstudiante" value="<?php echo $fila['nombreEstudiante']; ?>">
      </div>
      <div class="form-group">
        <label for="carrera">Licenciatura/Ingeniería: </label>
        <input type="text" class="form-control" name="carrera" value="<?php echo $fila['carrera']; ?>">
      </div>
      <div class="form-group">
        <label for="noCuenta">Matricula: </label>
        <input type="text" class="form-control" name="noCuenta" value="<?php echo $fila['noCuenta']; ?>">
      </div>

      <div class="form-group">
        <label for="area">Área: </label>
        <input type="text" class="form-control" name="area" value="<?php echo $fila['area']; ?>">
      </div>

      <div class="form-group">
        <label for="subarea">Subárea: </label>
        <input type="text" class="form-control" name="subarea" value="<?php echo $fila['subarea']; ?>">
      </div>

      <div class="form-group">
        <label for="jefeInmediato">Jefe inmediato: </label>
        <input type="text" class="form-control" name="jefeInmediato" value="<?php echo $fila['noCuenta']; ?>">
      </div>


      <div class="form-group">
        <label for="numHoras">Horas: </label>
        <input type="number" class="form-control" name="numHoras" value="<?php echo $fila['numHoras']; ?>">
      </div>

      <div class="form-group">
        <label for="periodo_inicio">Periodo inicio: </label>
        <input type="text" class="form-control" name="periodo_inicio" value="<?php echo $fila['periodo_inicio']; ?>">
      </div>
      
      <div class="form-group">
        <label for="periodo_final">Periodo final: </label>
        <input type="text" class="form-control" name="periodo_final" value="<?php echo $fila['periodo_final']; ?>">
      </div>

      
      <button type="submit" class="btn btn-primary">Guardar cambios</button>
    </form>
  </div>

</body>
</html>