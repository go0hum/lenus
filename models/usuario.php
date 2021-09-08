<?php 
require_once './core/database.php';

class Usuario
{
    private $Conn;
    public $Id;
    public $Name;
    public $Email;
    public $Password;

    function __construct()
    {
        global $Conn;
        $this->Conn = $Conn;
    }

    public function GetUsuarios()
    {
        $Sql = 'Select * from usuarios';
        $Result = $this->Conn->query($Sql);
        while($Row = $Result->fetch_assoc()) {
            print_r($Row);
        }
    }

    public function Save()
    {
        $Name = $this->Name;
        $Email = $this->Email;
        $Password = sha1($this->Password);
        $Sql = "INSERT INTO usuarios (nombre, correo, password) VALUES ('{$Name}', '{$Email}', '{$Password}')";
        $Result = $this->Conn->query($Sql);
        if ($Result) {
            return $this->Conn->insert_id; // get of https://www.php.net/manual/es/mysqli.insert-id.php
        }
        return false;
    }

    public function Login()
    {
        $Email = $this->Email;
        $Password = sha1($this->Password);
        $Sql = "SELECT * FROM usuarios Where correo = '{$Email}' AND password = '{$Password}'";
        $Result = $this->Conn->query($Sql);
        if ($Result->num_rows > 0) {
            return $Result->fetch_assoc();
        }
        return false;
    }

    public function Update()
    {
        $Data = array();
        if (isset($this->Name) && !empty($this->Name)) {
            $Data[] = "nombre = '".$this->Name."'";
        }

        if (isset($this->Email) && !empty($this->Email)) {
            $Data[] = "correo = '".$this->Email."'";
        }

        if (isset($this->Password) && !empty($this->Password)) {
            $Data[] = "password = '".sha1($this->Password)."'";
        }

        if (count($Data)) {
            $Params = implode(', ', $Data);
            $Sql = "UPDATE usuarios SET {$Params} WHERE usuarioid = {$this->Id}";
            $Result = $this->Conn->query($Sql);
            if ($Result) {
                return true;
            }
        }

        return false;
    }
}