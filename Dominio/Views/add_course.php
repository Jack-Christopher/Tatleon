<?php
    require_once ('../../Repositorio/Conexion.php');
    require_once ('../../Controlador/important.php');
    session_start();
?>
<html>

<head>
    <?php print_header("Agregar Curso", "../Resources/img/web_icon.png", "../Resources/styles/login.css"); ?>
</head>

<body background="../Resources/img/blue_background.jpg" style="background-size: cover">

    <?php

        $conexion = new Conexion();
        $conn = $conexion->conectar();
        $sql = "SELECT nombre FROM Escuelas WHERE id=$_SESSION[escuela_id]";
        $result = $conexion->ejecutar($sql);
        $row = $result->fetch_array();
        $escuela = $row[0];
    ?>
        
    <div class="container" align="center">
        <br>
        <div class="container jumbotron container_box">
            <div align="center">
                <img src="../Resources/img/course_icon.png" alt="Icono de inicio de sesión" id="login_icon">
                <br>
                <h6 class="display-6"> <?php echo $escuela; ?> </h6>
                <br>
            </div>
            <form id="add_course_form" align="left">
                <label for="comment"> Nombre del Curso: </label>
                <textarea type="text" name="nombre" id="nombre" class="form-control" rows="2"></textarea>
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

    function formEsValido() 
    {
        var nombre = $("#nombre");

        if (nombre.val() == "")
        {
            alertify.alert("Debe colocar el nombre del curso").setHeader("Atención");
            return false;
        }

        return true;
    }

    $(document).ready(function() {
        $("#submit_button").click(function() {
            if (formEsValido()) {
                cadena = $("#add_course_form").serialize();
                $.ajax({
                    type: 'POST',
                    url: "../../Controlador/add_course_process.php",
                    data: cadena,

                    success: function(data) {
                        if (data == 0) {
                            alertify.alert('Hecho', 'Registro de curso exitoso!', function() {
                                location.href = "javascript:history.go(-1)";
                            });

                        } else if (data == 1) {
                            alertify.error("Los datos del curso no fueron ingresados correctamente.");
                        } else {
                            alertify.error(data);
                            alertify.error("Hubo un inconveniente. Inténtelo más tarde.");
                        }
                    }

                })
            }

        })
    })
</script>