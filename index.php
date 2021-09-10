<?php
session_start();
require_once("Repositorio/Conexion.php");
require_once ('Controlador/important.php');

if (isset($_GET['logout'])) {
  if ($_GET['logout'] == "true") {
    session_destroy();
    header("Location: index.php");
  }
}
?>
<!DOCTYPE html>
<html>

<head>
  <?php print_header("Inicio", "Dominio/Resources/img/web_icon.png", "Dominio/Resources/styles/index.css"); ?>
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
          <li><a class="nav-link active" aria-current="page" href="index.php">Inicio</a></li>
          <li><a class="nav-link" href="Dominio/Views/functions.php">Funcionalidades</a></li>
          <li><a class="nav-link" href="Dominio/Views/about.php">Acerca de </a></li>
          <li><a class="nav-link" href="Dominio/Views/contact_us.php">Contáctanos</a></li>
        </ul>
      </div>
      &nbsp;&nbsp;&nbsp;
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
          <a class="nav-link" href="Dominio/Views/functions.php">Funcionalidades</a>
          <a class="nav-link" href="Dominio/Views/about.php">Acerca de </a>
          <a class="nav-link" href="Dominio/Views/contact_us.php">Contáctanos</a>
        </div>
      </div>
    </div>
  </nav>





  <br>


  <div class="container" align="center" style="padding:2%;">
    <img src="Dominio/Resources/img/logo.png" alt="UNSA Logo" id="logo">
  </div>

  <!-- LOGIN/REGISTER-->

  <?php
  if (isset($_SESSION['id'])) {
    $Conn =  new Conexion;
    $Conn->conectar();
    $nombre = $_SESSION['nombres'];

    echo "<br>";
    echo "<div class=\"container\" align=\"center\">";
    echo "<h3 class=\"display-2\" > Bienvenido(a) " . $nombre . "</h3>";
    echo "</div>";
  } else {
    echo "<div class=\"container\" align=\"center\">";
    echo "<a href=\"Dominio/Views/login.php\" class=\"btn btn-outline-primary\" id=\"btn_login\" style=\"margin:3%;\"> Iniciar Sesión </a>";
    echo "<a href=\"Dominio/Views/register.php\" class=\"btn btn-outline-success\" id=\"btn_register\" style=\"margin:3%;\"> Registrarse </a>";
    echo "</div>";
  }
  ?>

  <div class="container" align="center" style="padding:2%;">
    <!-- Buttons -->
    <br>

    <div class="container" id="button_box">
      <br><br>
      <div class="container" align="center">
        <a href="Dominio/Views/link_repository.php" class="btn btn-lg btn-primary index_button"> Link Repository</a>
        <a href="Dominio/Views/teacher_history.php" class="btn btn-lg btn-danger index_button"> Teacher History</a>
        <a href="Dominio/Views/resources.php" class="btn btn-lg btn-warning index_button"> Resources</a>
        <br>
        <a href="Dominio/Views/help_for_newbies.php" class="btn btn-lg btn-primary index_button"> Help for Newbies  </a>
        <a href="#" class="btn btn-lg btn-danger index_button"> Coming soon... </a>
        <a href="#" class="btn btn-lg btn-warning index_button"> Coming soon... </a>
        <br>
        <a href="#" class="btn btn-lg btn-primary index_button"> Coming soon... </a>
        <a href="#" class="btn btn-lg btn-danger index_button"> Coming soon... </a>
        <a href="#" class="btn btn-lg btn-warning index_button"> Coming soon... </a>
      </div>
      <br><br>

    </div>
    <br><br>
    <div class="container" style="display: block;">
      Made by
      <img src="Dominio/Resources/img/logo.jpg" alt="The Delta Team Logo" id="TDT_logo">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <?php
      if (isset($_SESSION['id'])) {
        echo "<button class='btn btn-dark' id='logout_button' onclick='logout()'> Cerrar Sesion</button>";
      }
      ?>
    </div>
    <br>
</body>

</html>


<script>
  function logout() {
    location.href = "index.php?logout=true";
  }
</script>