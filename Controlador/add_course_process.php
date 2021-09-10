<?php
    require_once("../Repositorio/Conexion.php");
    session_start();
    
    $nombre = $_POST['nombre'];

    $conexion = new Conexion();
    $conexion->conectar();

    $sql = "INSERT INTO Cursos (nombre) VALUE ('$nombre')";
    $result = $conexion->ejecutar($sql);
    
    if($result)
    {
        echo 0;
    }
    else
    {
        echo 2;
    }

    $curso_id = $conexion->last_id();

    $sql2 = "INSERT INTO Curso_Escuela (curso_id, escuela_id) VALUES ('$curso_id', '$_SESSION[escuela_id]')";
    $result2 = $conexion->ejecutar($sql2);
    $pair_id = $conexion->last_id();

    $sql3 = "SELECT NOW() 'date_time'";
    $result3 = $conexion->ejecutar($sql3);
    $row3 = mysqli_fetch_array($result3);
    $dt = $row3['date_time'];

    $sql3 = "INSERT INTO Auditorias (usuario_id, tabla, item_id, fecha_hora) VALUES (" . $_SESSION['id'] .", 'Cursos', " .$curso_id .", '" . $dt ."')";
    $result3 = $conexion->ejecutar($sql3);    

    $sql4 = "INSERT INTO Auditorias (usuario_id, tabla, item_id, fecha_hora) VALUES (" . $_SESSION['id'] .", 'Curso_Escuela', " .$pair_id .", '" . $dt ."')";
    $result4 = $conexion->ejecutar($sql4);
?>
