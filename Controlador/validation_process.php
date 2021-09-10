<?php
    session_start();

    require_once("../Repositorio/Conexion.php");

    $conexion = new Conexion;
    $conexion->conectar();

    $codigo = $_POST["verification_code"];
    $username = $_POST["username"];

    $verificar = "SELECT id, nombres, apellidos, email, username, clave, escuela_id
                FROM temp_Usuarios
                WHERE codigo_verificacion = '$codigo' AND
                    username = '$username';";

    $verify = $conexion->ejecutar($verificar);
    if(mysqli_num_rows($verify) > 0)
	{
        $verificacion = mysqli_fetch_array($verify);
        $nombres = $verificacion["nombres"];
        $apellidos = $verificacion["apellidos"];
        $email = $verificacion["email"];
        $username = $verificacion["username"];
        $clave = $verificacion["clave"];
        $escuela_id = $verificacion["escuela_id"];

        $query = "INSERT INTO Usuarios (nombres, apellidos, email, username, clave, escuela_id, permisos) VALUES ('$nombres', '$apellidos', '$email', '$username', '$clave', $escuela_id , 0);";
        $FreeTempTable = "DELETE FROM temp_Usuarios WHERE username = $username;";
        
        $result = $conexion->ejecutar($query);        
        $result2 = $conexion->ejecutar($FreeTempTable);
        if ($result && $result2)
        {
            echo 0;
        }
        else if (!$result)
        {
            echo 1;
        }
        else if (!$result2)
        {
            echo 2;
        }
        else
        {
            echo 3;
        }
    }
    else
    {
        echo 4;
    }

    $conexion->desconectar();
    exit;
