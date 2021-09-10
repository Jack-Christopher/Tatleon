<?php
include_once '../../Repositorio/Conexion.php';
include_once '../../Controlador/important.php';
session_start();
?>

<!DOCTYPE html>
<html>

<head>
  <?php print_header("Teacher History", "../Resources/img/web_icon.png", "../Resources/styles/index.css"); ?>
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
  $sql = "SELECT id, nombres, apellidos
        FROM Teachers";

  $resultado = $Conn->ejecutar($sql);
  ?>

  <div class="container">

    <?php
    if ($resultado != null) {
      foreach ($resultado as $teacher) {
        echo "<h2 class='display-6'> " . $teacher['id'] . " | " . $teacher['apellidos'] . ", " . $teacher['nombres'] . "</h2>";
    ?>

        <table class="table table-hover table-bordered">
          <thead>
            </tr>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Comentario</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $sql2 = "SELECT id, comentario
                  FROM Comments
                  WHERE teacher_id = " . $teacher['id'];

            $resultado2 = $Conn->ejecutar($sql2);
            if ($resultado2 != null) {
              foreach ($resultado2 as $comment) {
                echo "<tr>";
                echo "<th scope='row'>" . $comment['id'] . "</th>";
                echo "<td>" . $comment['comentario'] . "</td>";
                echo "</tr>";
              }
            }
            ?>

          </tbody>


        </table>
    <?php
        if (isset($_SESSION['id'])) {
          if ($_SESSION["permisos"] == "Administrador" || $_SESSION["permisos"] == "Moderador") {
            echo "<div class='container'>";
            echo "<a href='add_comment.php?nombres=" . $teacher['nombres'] . "&apellidos=" . $teacher['apellidos'] . "' class='btn btn-secondary'>Agregar Comentario</a>";
            echo "</div>";
            echo "<br><br>";
          }
        }
      }
    }
    ?>
  </div>


  <?php
  if (isset($_SESSION['id'])) {
    if ($_SESSION["permisos"] == "Administrador" || $_SESSION["permisos"] == "Moderador") {
      echo "<div class='container' align=\"right\">";
      echo "<a href='add_teacher.php' class='btn btn-primary'>Agregar Docente</a>";
      echo "</div>";
      echo "<br><br>";
    } else {
      echo "<div class=\"container\" align=\"center\">";
      echo "<br>";
      echo "<p class=\"alert alert-danger\" role=\"alert\"> Solo los delegados pueden agregar Docentes y Comentarios </p>";
      echo "<br>";
      echo "</div>";
      echo "<br><br>";
    }
  } else {
    echo "<div class=\"container\" align=\"right\">";
    echo "<p class=\"text-muted\"> Inicia sesión para agregar Docentes y Comentarios</p>";
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