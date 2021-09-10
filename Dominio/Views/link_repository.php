<?php
  require_once ('../../Repositorio/Conexion.php');
  require_once ('../../Controlador/important.php');
?>

<!DOCTYPE html>
<html>

<head>
  <?php print_header("Link Repository", "../Resources/img/web_icon.png", "../Resources/styles/index.css"); ?>
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

  <!-- Page Content -->
  <div class="container">

    <?php
    $Conn = new Conexion();
    $Conn->conectar();

    if (isset($_GET['area'])) 
    {
      if ($_GET['area'] == "ing")
      {
        $sql = "SELECT * FROM Escuelas WHERE id LIKE '1%' ORDER BY id";
        echo "<h1>Escuelas de Ingeniería</h1>";
      }
      else if ($_GET['area'] == "bio")
      {
        $sql = "SELECT * FROM Escuelas WHERE id LIKE '2%' ORDER BY id";
        echo "<h1>Escuelas de Biomédicas</h1>";
      }
      else if ($_GET['area'] == "soc")
      {
        $sql = "SELECT * FROM Escuelas WHERE id LIKE '3%' ORDER BY id";     
        echo "<h1>Escuelas de Sociales</h1>";
      }
    

    
    $escuelas = $Conn->ejecutar($sql);
    ?>

    
    <br>

    <table class="table table-hover table-bordered">
      <thead>
        </tr>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nombre</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if ($escuelas != null) {
          foreach ($escuelas as $school) {
            echo "<tr>";
            echo "<th scope=\"row\">" . $school['id'] . "</th>";
            echo "<td>" . $school['nombre'] . "</td>";
            echo "<td> <a href=\"school.php?id=" . $school['id'] . "\" class=\"btn btn-success\"> Explorar</a> </td>";
            echo "</tr>";
          }
        }
        ?>
      </tbody>


    </table>


  </div>
  </div>

  <?php
  }
  else
  {
    echo "<br>";
    echo "<div class=\"jumbotron\"  align=\"center\" style=\"background-color: #e0e0eb;\">";
    echo "<br>";
    echo "<h6 class=\"display-6\"> Áreas de Universidad Nacional de San Agustín </h6>";
    echo "<br><br>";
    echo "<a href=\"link_repository.php?area=ing\" class=\"btn btn-success btn-lg\">Ingenierías</a>";
    echo "<br><br>";
    echo "<a href=\"link_repository.php?area=bio\" class=\"btn btn-warning btn-lg\">Biomédicas</a>";
    echo "<br><br>";
    echo "<a href=\"link_repository.php?area=soc\" class=\"btn btn-danger btn-lg\">Sociales</a>";
    echo "<br><br>";    
    echo "</div>";
    echo "<br>";
  }
  ?>




  <div class="container">
    <a href="javascript:history.go(-1)" class="btn btn-outline-dark"> Volver atrás </a>
    <br><br>
  </div>
</body>

</html>