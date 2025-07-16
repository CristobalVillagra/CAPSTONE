<?php
class HomeModel extends Query
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getUsuario($username)
    {

        return $this->select("SELECT * FROM usuarios WHERE username = '$username' AND estado = 1");
    }
    
}
