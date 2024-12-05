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
    $cargoP =strtoupper($_POST["cargoP"]);
    $nombreEscuela = strtoupper($_POST["nombreEscuela"]);
    $nombrePrestatario =strtoupper($_POST["nombrePrestatario"]);
    $nombreLic = strtoupper($_POST["nombreLic"]);
    $noCuenta = $_POST["noCuenta"];
    $horas = $_POST["horas"];

    // Realizar la actualización en la base de datos
    $query = "UPDATE aceptacion_ep SET nombreExpide = ?, cargoP = ?, nombreEscuela = ?, nombrePrestatario = ?, nombreLic = ?, noCuenta = ?, horas = ? WHERE id_ep = ?";
    $sentencia = mysqli_prepare($getconex, $query);
    mysqli_stmt_bind_param($sentencia, "sssssssi", $nombreExpide , $cargoP, $nombreEscuela, $nombrePrestatario, $nombreLic, $noCuenta, $horas, $id);
    mysqli_stmt_execute($sentencia);
    $afectado = mysqli_stmt_affected_rows($sentencia);

    if ($afectado == 1) {
        echo "<script>alert('Registro actualizado correctamente'); location.href='ep_table.php';</script>";
        exit();
    } else {
        echo "<script>alert('Error al actualizar el registro'); location.href='ep_table.php';</script>";
        exit();
    }
}

// Obtener los datos del registro a editar
$consulta = "SELECT * FROM aceptacion_ep WHERE id_ep = $idSeleccionado";
$resultado = mysqli_query($getconex, $consulta);
$fila = mysqli_fetch_assoc($resultado);

// Asegurarse de que se encontró el registro a editar
if (!$fila) {
    echo "<script>alert('Registro no encontrado'); location.href='ep_table.php';</script>";
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
            <input type="hidden" class="form-control" name="id" value="<?php echo $fila['id_ep']; ?>">
          </div>
      <div class="form-group">
        <label for="nombreExpide">Nombre: </label>
        <input type="text" class="form-control" name="nombreExpide" value="<?php echo $fila['nombreExpide']; ?>">
      </div>
      
      <div class="form-group">
        <label for="cargoP">Cargo: </label>
        <input type="text" class="form-control" name="cargoP" value="<?php echo $fila['cargoP']; ?>">
      </div>
      
      <div class="form-group">
        <label for="nombreEscuela">Escuela: </label>
        <input type="text" class="form-control" name="nombreEscuela" value="<?php echo $fila['nombreEscuela']; ?>">
      </div>
      <div class="form-group">
        <label for="nombrePrestatario">Prestatario: </label>
        <input type="text" class="form-control" name="nombrePrestatario" value="<?php echo $fila['nombrePrestatario']; ?>">
      </div>
      <div class="form-group">
        <label for="nombreLic">Carrera: </label>
        <input type="text" class="form-control" name="nombreLic" value="<?php echo $fila['nombreLic']; ?>">
      </div>
      <div class="form-group">
        <label for="noCuenta">Matricula: </label>
        <input type="text" class="form-control" name="noCuenta" value="<?php echo $fila['noCuenta']; ?>">
      </div>
      <div class="form-group">
        <label for="horas">Horas: </label>
        <input type="number" class="form-control" name="horas" value="<?php echo $fila['horas']; ?>">
      </div>
      
      <button type="submit" class="btn btn-primary">Guardar cambios</button>
    </form>
  </div>

</body>
</html>
