<?php
  include_once '../../Repositorio/Conexion.php';
  require_once ('../../Controlador/important.php');
  session_start();

  
  $conexion = new Conexion();
  $conexion->conectar();

  if (isset($_GET['add'])) 
  {
    $sql = "INSERT INTO Curso_Escuela (curso_id, escuela_id) VALUES (".$_GET['add'].", ".$_SESSION['escuela_id'].")";
    $result = $conexion->ejecutar($sql);
    $pair_id = $conexion->last_id();

    $sql3 = "SELECT NOW() 'date_time'";
    $result3 = $conexion->ejecutar($sql3);
    $row3 = mysqli_fetch_array($result3);
    $dt = $row3['date_time'];

    $sql4 = "INSERT INTO Auditorias (usuario_id, tabla, item_id, fecha_hora) VALUES (" . $_SESSION['id'] .", 'Curso_Escuela', " .$pair_id .", '" . $dt ."')";
    $result4 = $conexion->ejecutar($sql4);

    header("Location: resources.php");
    
    echo $sql;
    
  }
?>

<!DOCTYPE html>
<html>

<head>
  <?php print_header("Cursos", "../Resources/img/web_icon.png", "../Resources/styles/index.css"); ?>
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
  <?php
  
  if (isset($_SESSION['escuela_id'])) 
  {
    $sql = "SELECT C.id, C.nombre FROM Cursos C, Curso_Escuela CE WHERE CE.escuela_id =" . $_SESSION['escuela_id'] . " AND CE.curso_id = C.id";
  }
  else
  {
    $sql = "SELECT id, nombre FROM Cursos";
  }
  if  (isset($_GET['id'])) 
  {
    if ($_GET['id'] == "all") 
    {
      $sql = "SELECT C.id, C.nombre FROM Cursos C, Curso_Escuela CE WHERE CE.curso_id = C.id GROUP BY C.id";
    }
    else if ($_GET['id'] == "search")
    {
      $sql = "SELECT C.id, C.nombre FROM Cursos C, Curso_Escuela CE 
      WHERE CE.curso_id = C.id AND C.id NOT IN ( 
        SELECT C.id FROM Cursos C, Curso_Escuela CE WHERE CE.escuela_id = " . $_SESSION['escuela_id'] . " AND CE.curso_id = C.id
          ) GROUP BY C.id;" ;
    }
    else
    {
      $sql = "SELECT C.id, C.nombre FROM Cursos C, Curso_Escuela CE WHERE CE.escuela_id =" . $_GET['id'] . " AND CE.curso_id = C.id GROUP BY C.id";
    }
  }

  
  $resultado = $conexion->ejecutar($sql);
  ?>

  <div class="container">
    <br>
    <h1 class="display-3" style="text-align: center;"> 
    <?php
      if  (isset($_GET['id'])) 
      {
        if ($_GET['id'] == "all")
        {
          echo "Todos los cursos";
        }
        else if ($_GET['id'] == "search")
        {
          echo "Cursos disponibles para ser agregados";
        }
        else
        {
          echo "Cursos";
        }
      }
      else
      {
        if (isset($_SESSION['escuela_id']))
        {
          echo "Cursos de la escuela";
        }
        else
        {
          echo "Todos los cursos";
        }
      }
    ?>
    </h1>
    <br><br>

    <table class="table table-hover table-bordered">
      <thead>
        </tr>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Curso</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        <?php
        if ($resultado != null) {
          foreach ($resultado as $curso) {
            echo "<tr>";
            echo "<th scope='row'>" . $curso['id'] . "</th>";
            echo "<td>" . $curso['nombre'] . "</td>";
            echo "<td> ";
            if ( isset($_GET['id']) )
            {
              if ($_GET['id'] == "search")
              {
                echo " <a href=\"resources.php?add=" . $curso['id'] . "\" class=\"btn btn-success\"> Agregar</a>";
              }
              else
              {
                echo "<a href=\"course.php?id=" . $curso['id'] . "\" class=\"btn btn-success\"> Explorar</a> ";
              }
            }
            else
            {
              echo "<a href=\"course.php?id=" . $curso['id'] . "\" class=\"btn btn-success\"> Explorar</a> ";
            }

            echo "</td> </tr>";
          }
        }

        
        ?>

      </tbody>
    </table>

      <?php	
      if  (!isset($_GET['id'])) 
      {
         echo '<a href="resources.php?id=all" class="btn btn-secondary"> Ver todos los cursos </a>';
      }
      else
      {
        if ($_GET['id'] == "all")
        {
          echo '<a href="resources.php" class="btn btn-secondary"> Ver los cursos de mi escuela</a>';
        }
      }
      ?>


  </div>


  <?php
  if (isset($_SESSION['id'])) {
    if ($_SESSION["permisos"] == "Administrador" || $_SESSION["permisos"] == "Moderador") {
      echo "<div class='container' align=\"right\">";
      if (isset($_GET['id']) && $_GET['id'] == "search") 
      {
        echo "¿No encuentras tu curso? &nbsp;&nbsp;&nbsp;";
      }
      echo "<button class='btn btn-primary' onclick='showMessage()'>Crear Curso</button>";
      echo "</div>";
      echo "<br><br>";
    } else {
      echo "<div class=\"container\" align=\"center\">";
      echo "<br>";
      echo "<p class=\"alert alert-danger\" role=\"alert\"> Solo los Delegados pueden agregar Cursos </p>";
      echo "<br>";
      echo "</div>";
      echo "<br><br>";
    }
  } else {
    echo "<div class=\"container\" align=\"right\">";
    echo "<p class=\"text-muted\"> Inicia sesión para agregar Cursos</p>";
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



<script>
  function showMessage() 
  {
    <?php
    if (!isset($_GET['id']) || $_GET['id'] != "search") 
    {
      echo "alertify.alert('Atención', 'Debes revisar si el curso que quieres crear ya existe.', function() ";
      echo '{ location.href = "resources.php?id=search";  });';
    }
    else
    {
      echo '  location.href = "add_course.php";';
    }
    ?>
  }

</script>