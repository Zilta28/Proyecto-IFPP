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
    $numHoras = $_POST["numHoras"];

    // Realizar la actualización en la base de datos
    $query = "UPDATE aceptacion_pp SET nombreExpide = ?, cargoPer = ?, nombreEscuela = ?, nombreEstudiante = ?, carrera = ?, noCuenta = ?, numHoras = ? WHERE Id_pp = ?";
    $sentencia = mysqli_prepare($getconex, $query);
    mysqli_stmt_bind_param($sentencia, "sssssssi", $nombreExpide , $cargoPer, $nombreEscuela, $nombreEstudiante, $carrera, $noCuenta, $numHoras, $id);
    mysqli_stmt_execute($sentencia);
    $afectado = mysqli_stmt_affected_rows($sentencia);

    if ($afectado == 1) {
        echo "<script>alert('Registro actualizado correctamente'); location.href='pp_table.php';</script>";
        exit();
    } else {
        echo "<script>alert('Error al actualizar el registro'); location.href='pp_table.php';</script>";
        exit();
    }
}

// Obtener los datos del registro a editar
$consulta = "SELECT * FROM aceptacion_pp WHERE Id_pp = $idSeleccionado";
$resultado = mysqli_query($getconex, $consulta);
$fila = mysqli_fetch_assoc($resultado);

// Asegurarse de que se encontró el registro a editar
if (!$fila) {
    echo "<script>alert('Registro no encontrado'); location.href='pp_table.php';</script>";
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
            <input type="hidden" class="form-control" name="id" value="<?php echo $fila['Id_pp']; ?>">
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
        <label for="carrera">Carrera: </label>
        <input type="text" class="form-control" name="carrera" value="<?php echo $fila['carrera']; ?>">
      </div>
      <div class="form-group">
        <label for="noCuenta">Matricula: </label>
        <input type="text" class="form-control" name="noCuenta" value="<?php echo $fila['noCuenta']; ?>">
      </div>
      <div class="form-group">
        <label for="numHoras">Horas: </label>
        <input type="number" class="form-control" name="numHoras" value="<?php echo $fila['numHoras']; ?>">
      </div>
      
      <button type="submit" class="btn btn-primary">Guardar cambios</button>
    </form>
  </div>

</body>
</html>