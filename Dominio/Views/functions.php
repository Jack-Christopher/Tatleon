<?php
    require_once ('../../Controlador/important.php');
?>

<!DOCTYPE html>
<html>

<head>
<?php print_header("Funcionalidades", "../Resources/img/web_icon.png", "../Resources/styles/index.css"); ?>

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
    <br><br>
    <h1 class="display-3" align="center">Funcionalidades</h1>
    <br><br>

    <div class="alert alert-danger" role="alert">
      <h2> Link Repository</h2>
      <h5> Propósito: </h5>
      <p> Almacenar y poner a disposición enlaces de trabajos realizados por los estudiantes
        de la Universidad Nacional de San Agustín que han sido subidos a otras plataformas con el propósito de
        hacerlo difundirlo entre los estudiantes de la UNSA y puedan tener una mayor cantidad de reacciones.</p>
      <h5> Funcionamiento: </h5>
      <p>
        Solo las personas que se hayan registrado en Tatleon Web podrán ingresar enlaces relativos a su escuela,
        los cuales serán almacenados en la plataforma.
        Cualquier persona, no es necesario que se haya registrado, podrá ver los enlaces almacenados en su totalidad.
        <br><br>
        No podrán subir enlaces a la Vista de una escuela:
      <ul>
        <li> Los que no se hayan registrado </li>
        <li> Los que no pertenezcan a esa escuela </li>
      </ul>
      </p>
    </div>

    <div class="alert alert-warning" role="alert">
      <h2> Teacher History</h2>
      <h5> Propósito: </h5>
      <p> Almacenar y poner a disposición el "Historial" de los docentes, ésto es, un conjunto de comentarios subidos por
        los delegados de los cursos que han sido dictados por estos docentes de la Universidad Nacional de San Agustín.</p>
      <h5> Funcionamiento: </h5>
      <p>
        Solo los usuarios registrados como delegados podrán agregar un docente a la plataforma
        y además podrán ingresar un comentario sobre los docentes que ya se encuentren en la plataforma.
        Antes de agregar a un docente se debe verificar si ya se encuentra en la plataforma.
        Antes de agregar un comentario el/la delegado(a) debe hacer un consenso con los estudiantes para tener comentarios adecuados y justos.
        El usuario podrá ver todos los comentarios almacenados en la plataforma.
        <br><br>
        No podrán subir comentarios sobre un docente:
      <ul>
        <li> Los que no se hayan registrado </li>
        <li> Los que no sean delegados </li>
      </ul>
      </p>
    </div>

    <div class="alert alert-success" role="alert">
      <h2> Resources</h2>
      <h5> Propósito: </h5>
      <p> Almacenar y poner a disposición Recursos Academicos subidos por los estudiantes
        de la Universidad Nacional de San Agustín.
        Con el propósito de que los estudiantes que están en grados inferiores puedan estudiar y/o practicar con anticipación
        y tener una educación más integral complementando con estos recursos los cursos que estén llevando.</p>
      </p>
      <h5> Funcionamiento: </h5>
      <p>
        Solo los usuarios registrados como delegados podrán agregar un recurso a la plataforma
        La idea es que el /la delegado(a) del curso cree una carpeta en Google Drive con el nombre del curso y dentro de esta carpeta
        los estudiantes suban los recursos que se usen en el desarrollo del curso.
        El usuario podrá ver todos los recursos almacenados en la plataforma.
        <br><br>
        No podrán subir Recursos de un curso:
      <ul>
        <li> Los que no se hayan registrado </li>
        <li> Los que no sean delegados </li>
      </ul>
      </p>
    </div>

    <div class="alert alert-info" role="alert">
      <h2> Coming soon...</h2>
      <p> Pronto estaremos implementando nuevas funcionalidades.</p>
      <br>
      <p> Puedes dejar tus sugerencias en el siguiente formulario.</p>
      <a href="https://forms.gle/ypVaTyf5dG8BZHtL6" target="_blank" class="btn btn-info">Ir a Formulario</a>
    </div>
    <br><br>
  </div>


  <div class="container">
    <a href="javascript:history.go(-1)" class="btn btn-outline-dark"> Volver atrás </a>
    <br><br>
  </div>

</body>

</html>