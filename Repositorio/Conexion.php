<?php
class Conexion
{
    private $host;
    private $user;
    private $pass;
    private $db;
    private $conn;

    public function __construct()
    {
        $this->host = "localhost";
        $this->user = "root";
        $this->pass = "root";
        $this->db = "Tatleon";
        /*
        $this->host = "sql100.epizy.com";
        $this->user = "epiz_29440885";
        $this->pass = "YD0FdeMPKhs";
        $this->db = "epiz_29440885_Tatleon";
        */
    }

    public function conectar()
    {
        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->db);
        if ($this->conn->connect_error) 
        {
            die("No se pudo conectar a la base de datos");
        }
    }

    public function desconectar()
    {
        $this->conn->close();
    }

    public function ejecutar($sql)
    {
        $resultado = $this->conn->query($sql);
        if ($resultado === false) 
        {
            die("No se pudo ejecutar la consulta");
        }
        return $resultado;
    }

    public function last_id()
    {
        return $this->conn->insert_id;
    }
}