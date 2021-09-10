<?php
    require_once ('../../Controlador/important.php');
?>

<!DOCTYPE html>
<html>

<head>
  <?php print_header("Contáctanos", "../Resources/img/web_icon.png", "../Resources/styles/index.css"); ?>
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
  <!-- Contact -->

  <div class="container jumbotron">
    <h1 class="display-3"> Medios de Contacto</h1>
    <br>

    <table class="table table-hover table-bordered">
      <thead>
        <tr>
          <th scope="col">Nombres</th>
          <th scope="col">Cargo</th>
          <th scope="col">Correo Electrónico</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Tatleon Web</td>
          <th>Servicio Técnico</th>
          <td>tatleonweb@gmail.com</td>
        </tr>
        <tr>
          <td>Jack C. Huaihua Huayhua</td>
          <th>Programador/ Diseñador/ QA</th>
          <td>jhuaihuah@unsa.edu.pe</td>
        </tr>
        <tr>
          <td>Rommel M. Ccorahua Lozano</td>
          <th>Programador/ Diseñador</th>
          <td>rccorahual@unsa.edu.pe</td>
        </tr>
      </tbody>
    </table>
  </div>



  <div class="container">
    <a href="javascript:history.go(-1)" class="btn btn-outline-dark"> Volver atrás </a>
    <br><br>
  </div>



</body>

</html>