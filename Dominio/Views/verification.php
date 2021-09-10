<?php
    session_start();
    require_once ('../../Controlador/important.php');
?>
<html>

<head>
    <?php print_header("Verificación", "../Resources/img/web_icon.png", "../Resources/styles/login.css"); ?>
</head>


<body background="../Resources/img/blue_background.jpg" style="background-size: cover">

    <div class="container" align="center">
        <br><br>
        <div class="alert alert-dark" role="alert">
            Un mensaje se ha enviado a su correo con un codigo de 6 dígitos para verificar su cuenta.
        </div>

        <br>

        <div class="jumbotron container_box" style="background:#cfe7ff">

            <div>
                <h3 class="display-4">Usuario: <?php echo $_SESSION['username']; ?></h3>
            </div>

            <form id="verification_form">
                <label for="verification_code"> Código de Verificación </label>
                <input type="text" name="verification_code" id="verification_code" class="form-control">
                <input type="hidden" name="username" id="username" value="<?php echo $_SESSION['username']; ?>">
                <br>
                <input type="button" id="button_submit" value="Enviar" class="btn btn-success" align="right">
            </form>
        </div>

    </div>
</body>


<div class="container">
    <a href="javascript:history.go(-1)" class="btn btn-outline-dark"> Volver atrás </a>
    <br><br>
</div>

</html>


<script>
    function formEsValido() {
        var codigo = $("#verification_code");
        var user_name = $("#username");

        if (codigo.val() == "") {
            var op = alertify.alert("Debe colocar sus nombres.");
            return false;
        } else if (user_name.val() == "") {
            var op = alertify.alert("Debe haberse registrado previamente.");
            return false;
        }

        return true;
    }


    $(document).ready(function() {

        $('#button_submit').click(function() {

            if (formEsValido()) {
                cadena = $("#verification_form").serialize();

                $.ajax({
                    type: "POST",
                    url: '../../Controlador/validation_process.php',
                    data: cadena,
                    success: function(data) {
                        if (data == 0) {
                            alertify.alert('Hecho', 'Registro de usuario completado exitosamente!', function() {
                                location.href = "../../index.php";
                            });
                        } else if (data == 1) {
                            alertify.alert("No se pudo registrar al usuario.");
                        } else if (data == 2) {
                            alertify.alert("No se pudo completar el proceso.");
                        } else if (data == 3) {
                            alertify.alert("Ocurrió un error inesperado. Inténtelo más tarde.");
                        } else if (data == 4) {
                            var op = alertify.alert("El código de verificación es incorrecto.");
                        }
                    }
                });
                //this is mandatory other wise your from will be submitted.
                return false;
            }
        });

    });
</script>