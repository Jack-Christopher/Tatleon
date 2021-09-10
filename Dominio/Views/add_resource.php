<?php
require_once("../../Repositorio/Conexion.php");
require_once ('../../Controlador/important.php');

session_start();
?>

<html>

<head>
    <?php print_header("Agregar Recurso", "../Resources/img/web_icon.png", "../Resources/styles/login.css"); ?>
</head>

<body background="../Resources/img/blue_background.jpg" style="background-size: cover">

    <?php
    $course_id = $_GET['id'];
    $conexion = new Conexion();
    $conexion->conectar();
    $sql = "SELECT nombre FROM Cursos WHERE id = '$course_id'";
    $result = $conexion->ejecutar($sql);
    $row = mysqli_fetch_array($result);
    $course_name = $row['nombre'];
    ?>
    <div class="container" align="center">
        <br>
        <div class="container jumbotron container_box">
            <div align="center">
                <img src="../Resources/img/resource_icon.png" alt="Icono de inicio de sesión" id="login_icon">
                <br>
                <h3> <?php echo $course_name; ?> </h3>
                <br>
            </div>

            <form id="add_resource_form" align="left">
                <label for="link"> Enlace: </label>
                <textarea type="text" name="link" id="link" class="form-control"></textarea>
                <label for="link_description"> Descripción: </label>
                <textarea type="text" name="link_description" id="link_description" class="form-control" rows="3"></textarea>
                <input type="hidden" name="curso_id" id="curso_id" value="<?php echo $course_id; ?>">
                <br>

                <div align="right">
                    <button type="button" id="submit_button" class="btn btn-primary"> Agregar </button>
                </div>
            </form>
            <br>
        </div>
    </div>
    <br>


    <div class="container">
        <a href="javascript:history.go(-1)" class="btn btn-outline-dark"> Volver atrás </a>
        <br><br>
    </div>
</body>

</html>

<script>
    function formEsValido() {
        var link = $("#link");
        var descripcion = $("#description");

        if (link.val() == "") {
            alertify.alert("Debe colocar el enlace").setHeader("Atención");
            return false;
        } else if (descripcion.val() == "") {
            alertify.alert("Debe colocar la descripción del recurso.").setHeader("Atención");
            return false;
        }

        return true;
    }

    $(document).ready(function() {
        $("#submit_button").click(function() {
            if (formEsValido()) {
                cadena = $("#add_resource_form").serialize();
                $.ajax({
                    type: 'POST',
                    url: "../../Controlador/add_resource_process.php",
                    data: cadena,

                    success: function(data) {
                        if (data == 0) {
                            alertify.alert('Hecho', 'Registro de recurso exitoso!', function() {
                                location.href = "javascript:history.go(-1)";
                            });
                        } else if (data == 1) {
                            alertify.error("Hubo un inconveniente. Inténtelo más tarde.");

                        } else {
                            alertify.error(data);
                        }
                    }

                })
            }

        })
    })
</script>