<?php
    session_start();
    require_once ('../../Controlador/important.php');

?>

<html>

<head>
    <?php print_header("Agregar Enlace", "../Resources/img/web_icon.png", "../Resources/styles/login.css"); ?>2
</head>

<body background="../Resources/img/blue_background.jpg" style="background-size: cover">
    <div class="container" align="center">
        <br>
        <div class="container jumbotron container_box">
            <div align="center">
                <img src="../Resources/img/link_icon.png" alt="Icono de inicio de sesión" id="login_icon">
                <br>
                <h1 class="display-5"> Agregar Enlace </h1>
                <br>
            </div>
            <form id="add_link_form" align="left">
                <label for="project_name"> Nombre del proyecto: </label>
                <input type="text" name="project_name" id="project_name" class="form-control">
                <label for="link"> Enlace: </label>
                <textarea type="text" name="link" id="link" class="form-control"></textarea>
                <label for="link_description"> Descripción: </label>
                <textarea type="text" name="link_description" id="link_description" class="form-control" rows="3"></textarea>

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
        var nombre = $("#project_name");
        var link = $("#link");
        var descripcion = $("#description");
        if (nombre.val() == "") {
            var op = alertify.alert("Debe colocar el nombre del proyecto.").setHeader("Atención");
            return false;
        } else if (link.val() == "") {
            alertify.alert("Debe colocar el enlace").setHeader("Atención");
            return false;
        } else if (descripcion.val() == "") {
            alertify.alert("Debe colocar la descripción del proyecto.").setHeader("Atención");
            return false;
        }
        return true;
    }

    $(document).ready(function() {
        $("#submit_button").click(function() {
            if (formEsValido()) {
                cadena = $("#add_link_form").serialize();
                $.ajax({
                    type: 'POST',
                    url: "../../Controlador/add_link_process.php",
                    data: cadena,
                    success: function(data) {
                        if (data == 0) {
                            alertify.alert('Hecho', 'Registro de enlace exitoso!', function() {
                                location.href = "javascript:history.go(-1)";
                            });
                            // var op = alertify.success("Registro de enlace exitoso");
                            //location.reload();
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