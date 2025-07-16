<?php
class UsuariosModel extends Query
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getUsuarios()
    {
        $sql = "SELECT id, nombre, apellido, username, telefono, password , rol, perfil, fecha  FROM usuarios WHERE estado = 1";
        return $this->selectAll($sql);
    }
    // Método para verificar si el usuario ya existe
    public function verificarUsuario($item, $nombre, $id)
    {
        if ($id > '') {
            $sql = "SELECT id FROM usuarios WHERE $item = '$nombre' AND id != $id AND estado = 1";
        } else {
            $sql = "SELECT id FROM usuarios WHERE $item = '$nombre' AND estado = 1";
        }
        
        return $this->select($sql, $item);
    }

    

    // Método para registrar usuario
    public function registrar($nombre, $apellido, $username, $telefono, $password, $rol)
    {
        $sql = "INSERT INTO usuarios (nombre, apellido, username, telefono, password, rol) VALUES (?,?,?,?,?,?)";

        $datos = array($nombre, $apellido, $username, $telefono, $password, $rol);

        return $this->insertar($sql, $datos);
    }

    public function delete($id)
    {
        $sql = "UPDATE usuarios SET estado = 0 WHERE id = ?";
        $datos = array($id);
        return $this->save($sql, $datos);
    }

    
    public function getUsuario($id)
    {
    $sql = "SELECT id, nombre, apellido, username, telefono, password, rol, perfil, fecha FROM usuarios WHERE id = ? AND estado = 1";
    return $this->select($sql, [$id]);
    }

    public function modificar($nombre, $apellido, $username, $telefono, $password, $rol, $id)
    {
        $sql = "UPDATE usuarios SET nombre=?, apellido=?, username=?, telefono=?, password=?, rol=? WHERE id=?";

        $datos = array($nombre, $apellido, $username, $telefono, $password, $rol, $id);

        return $this->save($sql, $datos);
    }

}

