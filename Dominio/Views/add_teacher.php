<?php
    require_once ('../../Controlador/important.php');
?>

<html>

<head>
    <?php print_header("Agregar Docente", "../Resources/img/web_icon.png", "../Resources/styles/login.css"); ?>
</head>

<body background="../Resources/img/blue_background.jpg" style="background-size: cover">

    <div class="container" align="center">
        <br>
        <div class="container jumbotron container_box">
            <div align="center">
                <img src="../Resources/img/teacher_icon.png" alt="Icono de inicio de sesión" id="login_icon">
                <br>
                <h1 class="display-5"> Agregar Docente </h1>
                <br>
            </div>

            <form id="add_teacher_form" align="left">
                <label for="teacher_name"> Nombres: </label>
                <input type="text" name="teacher_name" id="teacher_name" class="form-control">
                <label for="teacher_lastname"> Apellidos: </label>
                <input type="text" name="teacher_lastname" id="teacher_lastname" class="form-control">
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
        var nombres = $("#teacher_name");
        var apellidos = $("#teacher_lastname");

        if (nombres.val() == "") {
            var op = alertify.alert("Debe colocar los nombres.").setHeader("Atención");
            return false;
        } else if (apellidos.val() == "") {
            alertify.alert("Debe colocar los apellidos").setHeader("Atención");
            return false;
        }

        return true;
    }

    $(document).ready(function() {
        $("#submit_button").click(function() {
            if (formEsValido()) {
                cadena = $("#add_teacher_form").serialize();
                $.ajax({
                    type: 'POST',
                    url: "../../Controlador/add_teacher_process.php",
                    data: cadena,

                    success: function(data) {
                        if (data == 0) {
                            alertify.alert('Hecho', 'Registro de docente exitoso!', function() {
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