<?php
    require_once ('../../Controlador/important.php');
?>
<html>

<head>
    <?php print_header("Agregar Comentario", "../Resources/img/web_icon.png", "../Resources/styles/login.css"); ?>
</head>

<body background="../Resources/img/blue_background.jpg" style="background-size: cover">

    <?php
    $nombres = $_GET['nombres'];
    $apellidos = $_GET['apellidos'];
    ?>

    <div class="container" align="center">
        <br>
        <div class="container jumbotron container_box">
            <div align="center">
                <img src="../Resources/img/comment_icon.png" alt="Icono de inicio de sesión" id="login_icon">
                <br>
                <h6 class="display-6"> <?php echo $nombres . ", " . $apellidos; ?> </h6>
                <br>
            </div>
            <form id="add_comment_form" align="left">
                <label for="comment"> Comentario: </label>
                <textarea type="text" name="comment" id="comment" class="form-control" rows="5"> </textarea>
                <input type="hidden" name="teacher_name" id="teacher_name" value="<?php echo $nombres; ?>">
                <input type="hidden" name="teacher_lastname" id="teacher_lastname" value="<?php echo $apellidos; ?>">
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
        var comentario = $("#comment");

        if (comentario.val() == "") {
            alertify.alert("Debe colocar un comentario").setHeader("Atención");
            return false;
        }

        return true;
    }

    $(document).ready(function() {
        $("#submit_button").click(function() {
            if (formEsValido()) {
                cadena = $("#add_comment_form").serialize();
                $.ajax({
                    type: 'POST',
                    url: "../../Controlador/add_comment_process.php",
                    data: cadena,

                    success: function(data) {
                        if (data == 0) {
                            alertify.alert('Hecho', 'Registro de comentario exitoso!', function() {
                                location.href = "javascript:history.go(-1)";
                            });

                        } else if (data == 1) {
                            alertify.error("Los datos de el/la docente no fueron ingresados correctamente.");
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