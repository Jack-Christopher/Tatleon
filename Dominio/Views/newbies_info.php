<?php
  require_once ('../../Repositorio/Conexion.php');
  require_once ('../../Controlador/important.php');
  session_start();
?>

<!DOCTYPE html>
<html>

<head>
  <?php print_header("Newbies Info", "../Resources/img/web_icon.png", "../Resources/styles/index.css"); ?>
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

  <div class="container">
    <?php
    $conexion = new Conexion();
    $conexion->conectar();

    if (isset($_GET['id'])) 
    {
        $id = $_GET['id'];
        $query = "SELECT * FROM newbies_info WHERE escuela_id = $id";
        $result = $conexion->ejecutar($query);
        $row = mysqli_fetch_array($result);
        $email = $row['email_contacto'];
        $wa_url  = $row['whatsapp_group_url'];
        $bienvenida = $row['mensaje_bienvenida'];
        $ayuda = $row['mensaje_ayuda'];
    }
    ?>


<?php
if (isset($_GET['id'])) 
{
    $sql = "SELECT nombre FROM escuelas WHERE id = $id";
    $result = $conexion->ejecutar($sql);
    $row = mysqli_fetch_array($result);
    $escuela = $row['nombre'];
}
?>



<h1 class="display-4" align="center"> Bienvenido(a) a <?php echo $escuela ?> </h1>
<br>
 <div class="jumbotron" style="background-color: #f5f5f5;" align="center">
    <br>
    <?php echo $bienvenida ?>
    <br><br>
 </div>

 <br><br>
<h3 align="center"> Información adicional </h4>
<br>
<div class="jumbotron" style="background-color: #f5f5f5;" align="center">
    <br>
    <?php echo $ayuda ?>
    <br><br>
 </div>
    
        <br>
    <h3 align="center"> Medios de Contacto </h3>

    <table class="table table-hover table-bordered">
      <thead>
        </tr>
        <tr>
          <th scope="col">Concepto</th>
          <th scope="col">Dato</th>
        </tr>
      </thead>
      <tbody>
        <tr>
            <td>Email de Contacto</td>
            <td><?php echo $email; ?></td>
        </tr>
        <tr>
            <td>Enlace del Grupo de Whatsapp </td>
            <?php 
            if ( $id == $_SESSION['escuela_id'] ) 
            { ?>
            <td> <a class="btn btn-success" target="blank" href="<?php echo $wa_url; ?>"> Unirse al Grupo de WhatsApp </a> </td>
            <?php }
            else
            { ?>
                <td> <a class="btn btn-success disabled"  > Unirse al Grupo de WhatsApp </a> </td>
            <?php } ?>
        </tr>
        
      </tbody>
    <br>
    </table>
        
  </div>

  <br>
</body>

</html>



