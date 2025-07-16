<?php
class ArchivosModel extends Query
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getArchivosCarpeta($id_carpeta)
    {
        $sql = "SELECT * FROM archivos WHERE id_carpeta = $id_carpeta";
        return $this->selectAll($sql);
    }

    
    public function compartirArchivo($username, $id_archivo, $usuario_id)
    {
        $sql = "INSERT INTO detalle_archivos (username, id_archivo, usuario_id) VALUES (?,?,?)";
        $array = [$username, $id_archivo, $usuario_id];
        return $this->insertar($sql, $array);
    }

  
    public function getCarpetas($usuario_id)
    {
        $sql = "SELECT * FROM carpetas WHERE usuario_id = $usuario_id AND estado = 1 ORDER BY id DESC";
        return $this->selectAll($sql);
    }

    public function getUsuarios($valor, $usuario_id)
    {
        $sql = "SELECT * FROM usuarios WHERE username LIKE '%" . $valor . "%' AND id != $usuario_id AND estado = 1 LIMIT 10";
        return $this->selectAll($sql);
    }


    public function getUsuario($usuario_id)
    {
        $sql = "SELECT username FROM usuarios WHERE id = $usuario_id";
        return $this->select($sql);
    }

    public function getDetalle($username, $id_archivo)
    {
        $sql = "SELECT id FROM detalle_archivos WHERE username = '$username' AND id_archivo = $id_archivo";
        return $this->select($sql);
    }

    public function eliminarCompartido($fecha, $id) {
        $sql = "UPDATE detalle_archivos SET estado = ?, eliminado = ? WHERE id = ?";
        $array = [0, $fecha, $id];
        return $this->save($sql, $array); // este debe retornar 1 si fue exitoso
    }

    public function getCarpeta($id_archivo)
    {
        $sql = "SELECT id, id_carpeta FROM archivos WHERE id = $id_archivo ";
        return $this->select($sql);
    }
    

    public function getArchivos($usuario_id) {
        $sql= "SELECT a.* FROM archivos a INNER JOIN carpetas c ON a.id_carpeta
        = c.id WHERE c.usuario_id = $usuario_id ORDER BY a.id DESC";
        return $this->selectAll($sql);
    }
    public function eliminar($fecha, $id) {
        $sql = "UPDATE archivos SET estado = ?, eliminado = ? WHERE id = ?";
        $array = [0, $fecha, $id];
        return $this->save($sql, $array); // este debe retornar 1 si fue exitoso
    }
    
    public function getBusqueda($valor, $usuario_id) {
        $sql = "SELECT * FROM archivos WHERE nombre LIKE '%". $valor . "%' AND usuario_id = $usuario_id AND estado = 1 LIMIT 10";
        return $this->selectAll($sql);
    }
}
?>