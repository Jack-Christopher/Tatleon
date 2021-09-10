<?php
    require_once("../Repositorio/Conexion.php");
    session_start();
    
    $teacher_name = $_POST['teacher_name'];
    $teacher_lastname = $_POST['teacher_lastname'];

    $conexion = new Conexion();
    $conexion->conectar();

    $sql = "INSERT INTO Teachers (nombres, apellidos) VALUES ('$teacher_name', '$teacher_lastname')";
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

    $sql2 = "SELECT MAX(id) 'maximo' FROM Teachers";
    $result2 = $conexion->ejecutar($sql2);
    $row = mysqli_fetch_array($result2);
    $teacher_id = $row['maximo'];

    $sql3 = "SELECT NOW() 'date_time'";
    $result3 = $conexion->ejecutar($sql3);
    $row3 = mysqli_fetch_array($result3);
    $dt = $row3['date_time'];

    $sql3 = "INSERT INTO Auditorias (usuario_id, tabla, item_id, fecha_hora) VALUES (" . $_SESSION['id'] .", 'Teachers', " .$teacher_id .", '" . $dt ."')";
    $result3 = $conexion->ejecutar($sql3);    
?>
