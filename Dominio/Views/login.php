<?php
    require_once ('../../Controlador/important.php');
?>

<html>

<head>
    <?php print_header("Iniciar Sesión", "../Resources/img/web_icon.png", "../Resources/styles/login.css"); ?>
</head>

<body background="../Resources/img/blue_background.jpg" style="background-size: cover">

    <div class="container" align="center">
        <br>
        <div class="container jumbotron container_box">
            <div align="center">
                <img src="../Resources/img/login_icon.png" alt="Icono de inicio de sesión" id="login_icon">
                <br>
                <h1 class="display-5"> Iniciar Sesión </h1>
                <br>
            </div>

            <form id="login_form" align="left">
                <label for="user_name"> Nombre de Usuario: </label>
                <input type="text" name="user_name" id="user_name" class="form-control">
                <label for="password"> Contraseña </label>
                <input type="password" name="password" id="password" class="form-control">

                <br>

                <div align="right">
                    <button type="button" id="submit_button" class="btn btn-primary"> Iniciar Sesión </button>
                </div>
            </form>
            <br> ¿No tienes una cuenta?
            <a href="register.php"> Regístrate </a>
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
        var nombre_de_usuario = $("#user_name");
        var clave_de_usuario = $("#password");

        if (nombre_de_usuario.val() == "") {
            var op = alertify.alert("Debe colocar su nombre de usuario.").setHeader("Atención");

            return false;

        } else if (clave_de_usuario.val() == "") {
            alertify.alert("Debe colocar su clave de usuario").setHeader("Atención");
            return false;
        }

        return true;
    }

    $(document).ready(function() {
        $("#submit_button").click(function() {
            if (formEsValido()) {
                cadena = $("#login_form").serialize();
                $.ajax({
                    type: 'POST',
                    url: "../../Controlador/login_process.php",
                    data: cadena,

                    success: function(data) {
                        if (data == 0) {

                            alertify.alert('Hecho', 'Inicio de sesión exitoso', function() {
                                location.href = "../../index.php";
                            });

                        } else if (data == 1) {
                            alertify.error("Contraseña incorrecta");
                        } else if (data == 2) {
                            alertify.error("El usuario no existe.")
                        } else {
                            alertify.error("Ha ocurrido un error: ")
                            alertify.error(data)
                        }
                    }

                })
            }

        })
    })
</script>