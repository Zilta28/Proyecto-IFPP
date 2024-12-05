<?php
session_start();

// Verificar si el usuario ya ha iniciado sesión
if (isset($_SESSION['usuario'])) {
    header("Location: Inicio_A.html");
    exit();
}

// Verificar si se envió el formulario de inicio de sesión
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    // Realizar la conexión a la base de datos utilizando la clase mysqlconex
    include('conexion.php');
    $conex = new mysqlconex();
    $conexion = $conex->conex();

    // Verificar si la conexión a la base de datos fue exitosa
    if (!$conexion) {
        die("Error al conectar con la base de datos: " . mysqli_connect_error());
    }

    // Escapar los datos para prevenir inyección SQL
    $usuario = mysqli_real_escape_string($conexion, $usuario);
    $password = mysqli_real_escape_string($conexion, $password);

    // Consulta para verificar las credenciales del usuario
    $consulta = "SELECT * FROM usuario WHERE user = '$usuario' AND pass = '$password'";
    $resultado = mysqli_query($conexion, $consulta);

    // Verificar si se obtuvo algún resultado
    if (mysqli_num_rows($resultado) > 0) {
        // Inicio de sesión exitoso
        $_SESSION['usuario'] = $usuario;
        header("Location: Inicio_A.html");
        exit();
    } else {
        // Credenciales incorrectas, redirigir al formulario de inicio de sesión con mensaje de error
        echo "<script> alert('Usuario o contraseña incorrecta'); location.href='log.php?error=1';</script>";
        exit();
    }

    // Cerrar la conexión a la base de datos
    mysqli_close($conexion);
}
?>
