<?php
  include_once '../../Repositorio/Conexion.php';
  require_once ('../../Controlador/important.php');

  session_start();
?>

<!DOCTYPE html>
<html>

<head>
  <?php print_header("Recursos", "../Resources/img/web_icon.png"); ?>
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
  $course_id = $_GET['id'];
  $sql = "SELECT R.id, R.descripcion, R.url_content
        FROM Resources R
        WHERE R.curso_id=$course_id";
  $curso = "SELECT nombre FROM Cursos WHERE id=$course_id";

  $resultado = $Conn->ejecutar($sql);

  $resultado2 = mysqli_fetch_array($Conn->ejecutar($curso))['nombre'];
  ?>

  <div class="container">
    <h1 class="display-3"> Recursos de: <?php echo $resultado2; ?> </h1>
    <br>

    <table class="table table-hover table-bordered">
      <thead>
        <tr>
          <th scope="col">ID</th>
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
    if ($_SESSION["permisos"] == "Administrador" || $_SESSION["permisos"] == "Moderador") {
      echo "<div class=\"container\" align=\"right\">";
      echo "<a href=\"add_resource.php?id=" . $course_id . "\" class=\"btn btn-outline-success\"> Agregar Recurso </a>";
      echo "<br>";
      echo "</div>";
    } else {
      echo "<div class=\"container\" align=\"center\">";
      echo "<br>";
      echo "<p class=\"alert alert-danger\" role=\"alert\"> Solo los delegados pueden agregar Recursos </p>";
      echo "<br>";
      echo "</div>";
      echo "<br><br>";
    }
  } else {
    echo "<div class=\"container\" align=\"right\">";
    echo "<p class=\"text-muted\"> Inicia sesión para agregar Recursos</p>";
    echo "<a href=\"login.php\" class=\"btn btn-outline-success\"> Iniciar sesión </a>";
    echo "<br>";
    echo "</div>";
    echo "<br><br>";
  }
  ?>



  <div class="container">
    <a href="javascript:history.go(-1)" class="btn btn-outline-dark"> Volver atrás </a>
    <br><br>
  </div>


</body>

</html>