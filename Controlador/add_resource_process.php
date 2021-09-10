<?php
    require_once("../Repositorio/Conexion.php");
    session_start();
    
    $descripcion = $_POST['link_description'];
    $link = $_POST['link'];
    $curso_id = $_POST['curso_id'];

    $conexion = new Conexion();
    $conexion->conectar();

    $sql = "INSERT INTO Resources (descripcion, url_content, curso_id) VALUES ('$descripcion', '$link', $curso_id)";
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

    $sql2 = "SELECT MAX(id) 'maximo' FROM Resources";
    $result2 = $conexion->ejecutar($sql2);
    $row = mysqli_fetch_array($result2);
    $resource_id = $row['maximo'];

    $sql3 = "SELECT NOW() 'date_time'";
    $result3 = $conexion->ejecutar($sql3);
    $row3 = mysqli_fetch_array($result3);
    $dt = $row3['date_time'];

    $sql3 = "INSERT INTO Auditorias (usuario_id, tabla, item_id, fecha_hora) VALUES (" . $_SESSION['id'] .", 'Resources', " .$resource_id .", '" . $dt ."')";
    $result3 = $conexion->ejecutar($sql3);    
?>
