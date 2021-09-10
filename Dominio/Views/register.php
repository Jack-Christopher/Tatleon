<?php
    require_once("../../Repositorio/Conexion.php");
    require_once ('../../Controlador/important.php');
?>
<html>

<head>
    <?php print_header("Registrarse", "../Resources/img/web_icon.png", "../Resources/styles/login.css"); ?>
</head>

<body background="../Resources/img/blue_background.jpg" style="background-size: cover">

    <?php
    $conexion = new Conexion();
    $conexion->conectar();
    $sql = "SELECT * FROM Escuelas";
    $result = $conexion->ejecutar($sql);
    ?>

    <div class="container" align="center">
        <br><br>
        <div class="jumbotron container_box" style="background:#cfe7ff">
            <!-- c3f6c3 -->
            <br><br>
            <div align="center">
                <img src="../Resources/img/register_icon.png" alt="Icono de registrarse" width="150" height="150">
                <h1 class="display-5"> Registrarse </h1>
            </div>
            <br>

            <form id="signup_form" align="left">
                <label for="name"> Nombres: </label>
                <input type="text" name="name" id="name" class="form-control">
                <label for="last_name"> Apellidos: </label>
                <input type="text" name="last_name" id="last_name" class="form-control">
                <br>
                <label for="escuela"> Escuela Profesional: </label>
                <select name="school" id="school">
                    <option value="null"> Elija su escuela ... </option>
                    <?php
                    while ($escuela = mysqli_fetch_array($result)) {
                    ?>
                        <option value=" <?php echo $escuela['id']; ?>"> <?php echo $escuela['nombre']; ?></option>
                    <?php
                    }
                    ?>
                </select>
                <br><br>
                <label for="e_mail"> Correo Electrónico: </label>
                <input type="email" name="e_mail" id="e_mail" class="form-control">
                <!--<label for="cellphone"> Número de celular: </label>
        <input type="tel" name="cellphone" id="cellphone" class="form-control">-->
                <label for="user_name"> Nombre de Usuario: </label>
                <input type="text" name="user_name" id="user_name" class="form-control">
                <label for="password"> Contraseña </label>
                <input type="password" name="password" id="password" class="form-control">
                <label for="password_again"> Repite tu contraseña </label>
                <input type="password" name="password_again" id="password_again" class="form-control">

                <br>

                <div align="right">
                    <button type="button" id="submit_button" class="btn btn-success"> Registrarse </button>
                </div>

            </form>
            <br> ¿Ya tienes una cuenta?
            <a href="login.php"> Inicia Sesión </a>
            <br><br>
        </div>
        <br>


    </div>

    <div class="container">
        <a href="javascript:history.go(-1)" class="btn btn-outline-dark"> Volver atrás </a>
        <br><br>
    </div>

</body>

</html>

<script>
    function formEsValido() {
        var nombres = $("#name");
        var apellidos = $("#last_name");
        var escuela = $("#school");
        var correo_electronico = $("#e_mail");
        var nombre_de_usuario = $("#user_name");
        var clave_de_usuario = $("#password");
        var clave_de_usuario2 = $("#password_again");

        var emailRegex = new RegExp('.*@unsa.edu.pe');

        if (nombres.val() == "") {
            var op = alertify.alert("Debe colocar sus nombres.");
            return false;
        } else if (apellidos.val() == "") {
            var op = alertify.alert("Debe colocar sus apellidos.");
            return false;
        } else if (escuela.val() == "null") {
            var op = alertify.alert("Debe seleccionar una escuela.");
            return false;
        } else if (correo_electronico.val() == "") {
            var op = alertify.alert("Debe colocar su correo electrónico.");
            return false;
        } else if (!emailRegex.test(correo_electronico.val())) {
            var op = alertify.alert("Debe usar un Correo Institucional.");
            return false;
        } else if (nombre_de_usuario.val() == "") {
            var op = alertify.alert("Debe colocar su nombre de usuario.");
            return false;
        } else if (clave_de_usuario.val() == "") {
            var op = alertify.alert("Debe colocar su clave de usuario.");
            return false;
        } else if (clave_de_usuario2.val() == "") {
            var op = alertify.alert("Debe colocar su clave de usuario otra vez.");
            return false;
        } else if (clave_de_usuario.val() != clave_de_usuario2.val()) {
            var op = alertify.alert("Las clave de usuario deben coincidir.");
            return false;
        }

        return true;
    }


    $(document).ready(function() {

        $('#submit_button').click(function() {
            if (formEsValido()) {
                cadena = $("#signup_form").serialize();

                $.ajax({
                    type: "POST",
                    url: '../../Controlador/register_process.php',
                    data: cadena,
                    success: function(data) {
                        if (data == 0) {
                            window.location.replace('verification.php');
                        }
                        else if (data == 3) 
                        {
                            alertify.alert("El nombre de usuario ya existe.");
                        }
                        else {
                            alertify.alert("No se pudo completar el proceso.");
                        }
                    }
                });
                //this is mandatory other wise your from will be submitted.
                return false;
            }
        });

    });
</script>