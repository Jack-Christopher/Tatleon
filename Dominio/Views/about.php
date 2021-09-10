<?php
    require_once ('../../Controlador/important.php');
?>

<!DOCTYPE html>
<html>

<head>
  <?php print_header("Acerca de", "Dominio/Resources/img/web_icon.png"); ?>
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


  <!-- Main -->
  <div class="container">
    <br><br><br>
    <div class="alert alert-primary" role="alert">
      <h1 class="display-3" align="center">Acerca de</h1>

      <h2>Tatleon</h2>
      <p>
        Tatleon es una aplicación web que permite a los usuarios alamacenar datos academicos en forma de enlaces
        para que puedan ser difundidos a todos los usuarios de la aplicación.
      </p>
      <h2>Funcionalidades</h2>
      <p>
        Tatleon ofrece sus funcionalidades de forma gratuita para que los estudiantes de la Universidad Nacional de San Agustín
        puedan acceder a ellas sin ningún inconveniente.
      </p>
    </div>

    <br>
    <div class="alert alert-primary" role="alert">
      <h2 align="center"> Equipo de Trabajo</h2>
      <h4>Delta Team</h4>
      <p>
        Este proyecto fue desarrollado por los estudiantes miembros de "The Delta Team" de la carrera de Ciencias de la Computación
        de la Universidad Nacional de San Agustín en el año 2021.
      </p>
    </div>
    <br><br><br>


    <div class="container">
      <a href="javascript:history.go(-1)" class="btn btn-outline-dark"> Volver atrás </a>
      <br><br>
    </div>
</body>

</html>