<?php
    require_once("../Repositorio/Conexion.php");
    session_start();
    
    $name = $_POST['project_name'];
    $descripcion = $_POST['link_description'];
    $link = $_POST['link'];

    $conexion = new Conexion();
    $conexion->conectar();
    $escuela_id = $_SESSION["escuela_id"];
    $sql = "INSERT INTO Links (nombre, descripcion, url_content, escuela_id) VALUES ('$name', '$descripcion', '$link', $escuela_id)";
    $result = $conexion->ejecutar($sql);

    if($result)
    {
        echo 0;
    }
    else
    {
        echo 1;
        exit();
    }

    $sql2 = "SELECT MAX(id) 'maximo' FROM Links";
    $result2 = $conexion->ejecutar($sql2);
    $row = mysqli_fetch_array($result2);
    $link_id = $row['maximo'];

    $sql3 = "SELECT NOW() 'date_time'";
    $result3 = $conexion->ejecutar($sql3);
    $row3 = mysqli_fetch_array($result3);
    $dt = $row3['date_time'];

    $sql3 = "INSERT INTO Auditorias (usuario_id, tabla, item_id, fecha_hora) VALUES (" . $_SESSION['id'] .", 'Links', " .$link_id .", '" . $dt ."')";
    $result3 = $conexion->ejecutar($sql3);    
?>
