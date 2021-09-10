<?php
  include_once '../../Repositorio/Conexion.php';
  require_once ('../../Controlador/important.php');
  session_start();
?>

<!DOCTYPE html>
<html>

<head>
<?php print_header("Enlaces", "../Resources/img/web_icon.png", "../Resources/styles/index.css"); ?>
</head>

<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light" style="font-size:25px;">
    <div class="container-fluid">
      <a class="navbar-brand" id="navbar_title" style="font-size:25px;">Tatleon</a>
      <div class="dropdown" style="display: None;" id="dropdown_menu">
        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="font-size:25px;">
          Tatleon
        </button>
        <ul class="dropdown-menu">
          <li><a class="nav-link active" aria-current="page" href="../../index.php">Inicio</a></li>
          <li><a class="nav-link" href="functions.php">Funcionalidades</a></li>
          <li><a class="nav-link" href="about.php">Acerca de </a></li>
          <li><a class="nav-link" href="contact_us.php">Contáctanos</a></li>
        </ul>
      </div>
      &nbsp;&nbsp;&nbsp;
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link active" aria-current="page" href="../../index.php">Inicio</a>
          <a class="nav-link" href="functions.php">Funcionalidades</a>
          <a class="nav-link" href="about.php">Acerca de </a>
          <a class="nav-link" href="contact_us.php">Contáctanos</a>
        </div>
      </div>
    </div>
  </nav>

  <br>
  <!-- Table of Schools -->

  <?php
  $Conn = new Conexion();
  $Conn->conectar();
  $school_id = $_GET['id'];
  $sql = "SELECT L.id, L.nombre, L.descripcion, L.url_content
        FROM Links L
        WHERE L.escuela_id=$school_id";
  $school = "SELECT nombre FROM Escuelas WHERE id=$school_id";

  $resultado = $Conn->ejecutar($sql);

  $resultado2 = mysqli_fetch_array($Conn->ejecutar($school))['nombre'];
  ?>

  <div class="container">
    <h1 class="display-3"> Enlaces de <?php echo $resultado2; ?> </h1>
    <br>

    <table class="table table-hover table-bordered">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Nombre</th>
          <th scope="col">Descripción</th>
          <th scope="col">Enlace</th>
        </tr>

      </thead>
      <tbody>
        <?php
        if ($resultado != null) {
          foreach ($resultado as $row) {
            echo "<tr>";
            echo "<th scope=\"row\">" . $row['id'] . "</th>";
            echo "<td>" . $row['nombre'] . "</td>";

            echo "<td>" . $row['descripcion'] . "</td>";

            echo "<td> <a href=\"" .  $row['url_content'] . "\" class=\"btn btn-success\"> Visitar</a> </td>";
            echo "</tr>";
          }
        }
        ?>
      </tbody>
    </table>
  </div>


  <?php

  if (isset($_SESSION['id'])) {
    $query = "SELECT escuela_id FROM Usuarios WHERE id=" . $_SESSION['id'];
    $result = $Conn->ejecutar($query);
    $result = mysqli_fetch_array($result);
    if ($result['escuela_id'] == $school_id) {
      echo "<div class=\"container\" align=\"right\">";
      echo "<a href=\"add_link.php\" class=\"btn btn-outline-success\"> Agregar enlace </a>";
      echo "<br>";
      echo "</div>";
    }
  } else {
    echo "<div class=\"container\" align=\"right\">";
    echo "<p class=\"text-muted\"> Inicia sesión para agregar enlaces </p>";
    echo "<a href=\"login.php\" class=\"btn btn-outline-success\"> Iniciar sesión </a>";
    echo "<br>";
    echo "</div>";
  }
  ?>


  <div class="container">
    <a href="javascript:history.go(-1)" class="btn btn-outline-dark"> Volver atrás </a>
    <br><br>
  </div>

</body>

</html>