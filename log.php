<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>ADMIN</title>
  <link rel="stylesheet" href="Forms.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="shortcut icon" href="img/Logo.png">
  <style>
    h2 {
      font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
      font-size: 450%;
    }

    h3 {
      color: #691B31;
      font-size: 120%;
    }

    h5 {
      font-size: 200%;
      text-align: center;
      background-color: white;
    }

    body {
      margin: 0;
      padding: 0;
      font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
      background-color: #A02142;
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }

    header {
      background-color: white;
      padding: 10px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap;
    }

    .logo {
      display: flex;
      align-items: center;
    }

    .logo img {
      max-width: 50px;
      height: auto;
      width: 100%;
    }

    .buttons {
      display: flex;
      align-items: center;
      margin-top: 10px;
    }

    .button {
      margin-right: 10px;
      padding: 10px 20px;
      background-color: #A02142;
      color: #fff;
      font-size: 130%;
      text-decoration: none;
      border-radius: 5px;
    }

    .content {
      padding: 20px;
      position: relative;
      flex: 1;

    }


    .content4 {
      padding: 50px;
      background: #A02142;

    }

    footer {
      background-color: white;
      padding: 20px;
      text-align: center;

    }

    .footer-logo {
      max-width: 450px;
      height: auto;
      width: 100%;
    }


    @media (min-width: 768px) {

      .logo {
        flex: 1;
      }

      .buttons {
        margin-top: 0;
      }

      .content2 {
        flex-direction: row;
        justify-content: space-around;
        align-items: center;
      }
    }
  </style>
</head>

<body>
  <header>
    <div class="logo">
      <img src="img/Logo.png" alt="Logo" oncontextmenu="return false;">
    </div>
    <div class="buttons">
      <a href="index.html" class="button">Inicio</a>
    </div>
  </header>
  <br><br><br><br>
  <div class="content4">
    <div class="card">
      <div class="card-body">
        <h5 class="title">Bienvenido administrador</h5>
        <br>
        <?php
        session_start();

        if (isset($_SESSION['usuario'])) {
          header("Location: Inicio_A.html");
          exit();
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
          $usuario = $_POST['usuario'];
          $password = $_POST['password'];

          $_SESSION['usuario'] = $usuario;
          header("Location: Inicio_A.html");
          exit();
        }
        ?>
        <form method="post" action="login.php">
          <div class="form-group">
            <label for="usuario">Usuario:</label>
            <input type="text" name="usuario" class="form-control" id="usuario" required>
            <label for="password">Contraseña:</label>
            <input type="password" name="password" class="form-control" id="password" required>
            <br>
            <center>
              <button type="submit" value="ingresar" class="btn btn-primary">Ingresar</button>
            </center>
          </div>
        </form>
      </div>
    </div>
  </div>
  <footer>
    <img src="img/Footer.png" class="footer-logo" oncontextmenu="return false;">
  </footer>
</body>

</html>


