<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesone/5.15.1/css/all.min.css">
  <link rel="stylesheet" href="StyleT.css">
  
  <link rel="shortcut icon" href="img/Logo.png">

  <title>IFPP</title>
  
</head>
<body>
  <header>
    <div class="logo">
      <img src="img/Logo.png" alt="Logo">
    </div>
    <div class="buttons">
    <a href="Inicio_A.html" class="button">Menu</a>
    <a href="logout.php" class="button">Cerrar sesión</a>
    </div>
  </header>

  <div class="container">

  <table class="table">
            <caption>Terminación Servicio Social</caption>
            <thead>
                <tr>
                <th>ID</th>
                    <th>Directivo</th>
                    <th>Cargo</th>
                    <th>Escuela</th>
                    <th>Prestatario</th>
                    <th>Carrera</th>     
                    <th>Matricula</th>
                    <th>Area</th>
                    <th>SubArea</th>
                    <th>Jefe Inmediato</th>
                    <th>Horas a realizar</th>
                    <th>Fecha Inicial</th>
                    <th>Fecha Final</th>
                    <th>Fotografia</th>
                    <th></th>
                </tr>
            </thead>
        <tbody>
            <?php
                // Establecer el número de registros por página
                $registrosPorPagina = 25;

                // Obtener la página actual (por defecto es la página 1)
                $pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;

                // Calcular el inicio de la página
                $inicio = ($pagina - 1) * $registrosPorPagina;

                // Consulta SQL con la cláusula LIMIT para obtener solo los primeros 25 registros
                $consulta = "SELECT * FROM terminacion_ss LIMIT $inicio, $registrosPorPagina";

                // Ejecutar la consulta y mostrar los resultados en la tabla
                include("conexion.php");
                $getmysql = new mysqlconex();
                $getconex = $getmysql->conex();

                $resultado = mysqli_query($getconex, $consulta);

                    
                    while ($fila = mysqli_fetch_assoc($resultado)) {
                        echo "<tr>";
                        echo "<td style='width: 10px;'>{$fila['Id_ss']}</td>";
                        echo "<td>" . $fila["nombreExpide"] . "</td>";
                        echo "<td>" . $fila["cargoPer"] . "</td>";
                        
                        echo "<td>" . $fila["nombreEstudiante"] . "</td>";
                        echo "<td>" . $fila["carrera"] . "</td>";
                        echo "<td>" . $fila["nombreEscuela"] . "</td>";
                        echo "<td>" . $fila["noCuenta"] . "</td>";
                        echo "<td>" . $fila["area"] . "</td>";
                        echo "<td>" . $fila["subarea"] . "</td>";
                        echo "<td>" . $fila["jefeInmediato"] . "</td>";
                        echo "<td>" . $fila["numHoras"] . "</td>";
                        echo "<td>" . $fila["periodo_inicio"] . "</td>";
                        echo "<td>" . $fila["periodo_final"] . "</td>";
                        echo "<td class='tabla-imagen'><img src='{$fila['ruta']}' alt='Fotografía'></td>";
                        
                        echo '<td>
                        <button class="btn btn-seleccionar" data-id="' . $fila['Id_ss'] . '"><img src="iconos/lib.svg" alt="Icono" class="icono-svg"></button>
                        <button class="btn-editar" data-id="' . $fila['Id_ss'] . '">
                        <img src="iconos/edit.svg" alt="Icono" class="icono-svg">
                        </button>
                        <button class="btn-eliminar" data-id="' . $fila['Id_ss'] . '">
                        <img src="iconos/delete.svg" class="icono-svg">
                        </button>
                       
                        </td>';
    
                    echo '</tr>';
                    }
                
                    
                ?>
                <script>
                // Obtener todos los botones de editar
                var botonesEditar = document.querySelectorAll('.btn-editar');

                // Agregar un controlador de eventos a cada botón
                botonesEditar.forEach(function (boton) {
                    boton.addEventListener('click', function () {
                        // Obtener el ID del registro a editar
                        var idSeleccionado = this.getAttribute('data-id');

                        // Mostrar un mensaje de confirmación antes de editar
                        if (confirm('¿Estás seguro de que deseas editar este registro?')) {
                            // Redirigir a la página PHP para editar el registro
                            window.location.href = 'edit_ss_lib.php?id=' + idSeleccionado;
                        }
                    });
                });
                </script>
            <script>
            // Obtener todos los botones de eliminar
            var botonesEliminar = document.querySelectorAll('.btn-eliminar');

            // Agregar un controlador de eventos a cada botón
            botonesEliminar.forEach(function (boton) {
                boton.addEventListener('click', function () {
                    // Obtener el ID del registro a eliminar
                    var idSeleccionado = this.getAttribute('data-id');

                    // Mostrar un mensaje de confirmación antes de eliminar
                    if (confirm('¿Estás seguro de que deseas eliminar este registro?')) {
                        // Redirigir a la página PHP para eliminar el registro
                        window.location.href = 'delete_ss_lib.php?id=' + idSeleccionado;
                    }
                });
            });
            </script>

            <script>
            // Obtener todos los botones o enlaces de selección
            var botonesSeleccionar = document.querySelectorAll('.btn-seleccionar');

            // Agregar un controlador de eventos a cada botón o enlace
            botonesSeleccionar.forEach(function (boton) {
                boton.addEventListener('click', function () {
                // Obtener el ID de la fila seleccionada
                var idSeleccionado = this.getAttribute('data-id');

                // Redirigir a la página PHP para crear el documento Word
                window.location.href = 'G_Doc_ss_lib.php?id=' + idSeleccionado;
                });
            });
            </script>

        </table>
        <div class="pagination">
        <?php
        //Consulta SQL para obtener el número total de registros
                    $consultaTotal = "SELECT COUNT(*) as total FROM terminacion_ss";
                    $resultadoTotal = mysqli_query($getconex, $consultaTotal);
                    $filaTotal = mysqli_fetch_assoc($resultadoTotal);
                    $totalRegistros = $filaTotal['total'];

                    mysqli_close($getconex);

                    // Calcular el número total de páginas
                    $totalPaginas = ceil($totalRegistros / $registrosPorPagina);

                    // Mostrar los enlaces de paginación
                    echo "<div class='pagination-container'>";
                    for ($i = 1; $i <= $totalPaginas; $i++) {
                    echo "<a href='?pagina=$i' class='pagination-button'>$i</a>";
                    }
                    echo "</div>";

                    
         ?>
        </div>
  </div>

  <footer>
    <img src="img/Final.png" class="footer-logo">
  </footer>
</body>
</html>
