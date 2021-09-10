<?php
    require_once("../Repositorio/Conexion.php");
    session_start();
    
    $teacher_name = $_POST['teacher_name'];
    $teacher_lastname = $_POST['teacher_lastname'];
    $comentario = $_POST['comment'];

    $conexion = new Conexion();
    $conexion->conectar();

    $sql = "SELECT id FROM Teachers WHERE nombres = '$teacher_name' AND apellidos = '$teacher_lastname'";
    $result = $conexion->ejecutar($sql);
    if (mysqli_num_rows($result) == 0) 
    {
        echo 1;
        exit();
    }

    $row = mysqli_fetch_array($result);    
    $teacher_id = $row['id'];

    $sql = "INSERT INTO Comments (comentario, teacher_id) VALUES ('$comentario', '$teacher_id')";
    $result = $conexion->ejecutar($sql);

    if($result)
    {
        echo 0;
    }
    else
    {
        echo 2;
    }

    $sql2 = "SELECT MAX(id) 'maximo' FROM Comments";
    $result2 = $conexion->ejecutar($sql2);
    $row = mysqli_fetch_array($result2);
    $comment_id = $row['maximo'];

    $sql3 = "SELECT NOW() 'date_time'";
    $result3 = $conexion->ejecutar($sql3);
    $row3 = mysqli_fetch_array($result3);
    $dt = $row3['date_time'];

    $sql3 = "INSERT INTO Auditorias (usuario_id, tabla, item_id, fecha_hora) VALUES (" . $_SESSION['id'] .", 'Comments', " .$comment_id .", '" . $dt ."')";
    $result3 = $conexion->ejecutar($sql3);    
?>
