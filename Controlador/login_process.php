<?php
session_start();
require_once("../Repositorio/Conexion.php");
$conexion = new Conexion;

$conexion->Conectar();

$username = $_POST["user_name"];
$password = $_POST["password"];

$_SESSION["username"] = "$username";


$query1 = "SELECT id, nombres, clave, permisos, escuela_id FROM Usuarios WHERE username='$username'";
//$query2 = "SELECT id FROM Organizador WHERE nombre_de_usuario='$username' AND clave='$password'";

$result1 = $conexion->ejecutar($query1);
//$result2= $conexion->ejecutar($query2);

if (mysqli_num_rows($result1) > 0) {
    $row1 = mysqli_fetch_array($result1);
    $verify = password_verify($password, $row1["clave"]);
    if ($verify) {
        echo 0;

        $_SESSION["id"] = $row1["id"];
        $_SESSION["nombres"] = $row1["nombres"];
        if ($row1["permisos"] == 0) 
        {
            $_SESSION["permisos"] = "Usuario";
        }
        else if ($row1["permisos"] == 1) 
        {
            $_SESSION["permisos"] = "Moderador";
        }
        else if ($row1["permisos"] == 2)
        {
            $_SESSION["permisos"] = "Administrador";
        }

        $_SESSION['escuela_id'] = $row1['escuela_id'];

    } else {
        echo 1;
    }
}
/*
    else if (mysqli_num_rows($result2) > 0)
    {
        echo 1;
        while ($registro = mysqli_fetch_array($result2))
        {
            $id = $registro["id"];
            $_SESSION["id"] = "$id";
        }
        $_SESSION["permisos"] = "user";
    }
    */ else {
    echo 2;
}

$conexion->Desconectar();
exit;
