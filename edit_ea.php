<?php
include("conexion.php");
$getmysql = new mysqlconex();
$getconex = $getmysql->conex();

$idSeleccionado = $_GET['id'];

// Comprobar si se ha enviado el formulario de edición
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $id = $_POST["id"];
    $directivo = strtoupper($_POST["directivo"]);
    $cargo =strtoupper($_POST["cargo"]);
    $escuela = strtoupper($_POST["escuela"]);
    $prestatario =strtoupper($_POST["prestatario"]);
    $carrera = strtoupper($_POST["carrera"]);
    $matricula = $_POST["matricula"];
    $horas = $_POST["horas"];

    // Realizar la actualización en la base de datos
    $query = "UPDATE aceptacion_ea SET directivo = ?, cargo = ?, escuela = ?, prestatario = ?, carrera = ?, matricula = ?, horas = ? WHERE Id_ea = ?";
    $sentencia = mysqli_prepare($getconex, $query);
    mysqli_stmt_bind_param($sentencia, "sssssssi", $directivo, $cargo, $escuela, $prestatario, $carrera, $matricula, $horas, $id);
    mysqli_stmt_execute($sentencia);
    $afectado = mysqli_stmt_affected_rows($sentencia);

    if ($afectado == 1) {
        echo "<script>alert('Registro actualizado correctamente'); location.href='ea_table.php';</script>";
        exit();
    } else {
        echo "<script>alert('Error al actualizar el registro'); location.href='ea_table.php';</script>";
        exit();
    }
}

// Obtener los datos del registro a editar
$consulta = "SELECT * FROM aceptacion_ea WHERE Id_ea = $idSeleccionado";
$resultado = mysqli_query($getconex, $consulta);
$fila = mysqli_fetch_assoc($resultado);

// Asegurarse de que se encontró el registro a editar
if (!$fila) {
    echo "<script>alert('Registro no encontrado'); location.href='ea_table.php';</script>";
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
        <label for="directivo">Nombre: </label>
        <input type="text" class="form-control" name="directivo" value="<?php echo $fila['directivo']; ?>">
      </div>
      
      <div class="form-group">
        <label for="cargo">Cargo: </label>
        <input type="text" class="form-control" name="cargo" value="<?php echo $fila['cargo']; ?>">
      </div>
      
      <div class="form-group">
        <label for="escuela">Escuela: </label>
        <input type="text" class="form-control" name="escuela" value="<?php echo $fila['escuela']; ?>">
      </div>
      <div class="form-group">
        <label for="prestatario">Prestatario: </label>
        <input type="text" class="form-control" name="prestatario" value="<?php echo $fila['prestatario']; ?>">
      </div>
      <div class="form-group">
        <label for="carrera">Carrera: </label>
        <input type="text" class="form-control" name="carrera" value="<?php echo $fila['carrera']; ?>">
      </div>
      <div class="form-group">
        <label for="matricula">Matricula: </label>
        <input type="text" class="form-control" name="matricula" value="<?php echo $fila['matricula']; ?>">
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
