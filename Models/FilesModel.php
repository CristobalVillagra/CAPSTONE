<?php
class FilesModel extends Query
{
    public function __construct()
    {
        parent::__construct();
    }

    // ARCHIVOS
    public function subirarchivo($name, $tipo, $id_carpeta)
    {

        $sql = "INSERT INTO archivos (nombre, tipo, id_carpeta) VALUES (?, ?, ?)";
        $data = [$name, $tipo, $id_carpeta];
        return $this->insertar($sql, $data);
    }

    public function getArchivosRecientes($usuario_id)
    {
        $sql = "SELECT a.* FROM archivos a INNER JOIN carpetas c ON a.id_carpeta = c.id WHERE c.usuario_id  = $usuario_id AND a.estado = 1 ORDER BY a.id DESC LIMIT 10";
        return $this->selectAll($sql);
    }

    public function getArchivos($id_carpeta, $usuario_id)
    {
        $sql = "SELECT a.* FROM archivos a  INNER JOIN carpetas c ON a.id_carpeta = c.id WHERE a.id_carpeta = $id_carpeta AND c.usuario_id = $usuario_id  ORDER BY a.id DESC";
        return $this->selectAll($sql);
    }

    public function delete($id_archivo)
    {
        $sql = "UPDATE archivos SET estado = 0 WHERE id = ?";
        $datos = array($id_archivo);
        return $this->save($sql, $datos); // este debe retornar 1 si fue exitoso
    }


    // CARPETAS
    public function getCarpetas($usuario_id)
    {
        $sql = "SELECT * FROM carpetas WHERE usuario_id = $usuario_id AND estado = 1 ORDER BY id DESC LIMIT 9";
        return $this->selectAll($sql);
    }

    public function getVerificar($nombre, $item, $usuario_id, $id)
    {
        if ($id > 0) {
            $sql = "SELECT id FROM carpetas WHERE $item = '$nombre' AND usuario_id = $usuario_id AND id != $id AND estado = 1";
        } else {
            $sql = "SELECT id FROM carpetas WHERE $item = '$nombre' AND usuario_id = $usuario_id AND estado = 1";
        }
        return $this->select($sql);
    }

    public function crearcarpeta($nombre, $usuario_id)
    {
        $sql = "INSERT INTO carpetas (nombre, usuario_id) VALUES (?, ?)";
        $datos = array($nombre, $usuario_id);
        return $this->insertar($sql, $datos);
    }
      public function getArchivosCompartidos($id_carpeta)
    {
        $sql = "SELECT d.id, d.username, d.estado , d.eliminado, a.nombre 
                FROM detalle_archivos d 
                INNER JOIN archivos a ON d.id_archivo = a.id INNER JOIN carpetas c ON a.id_carpeta = c.id
                WHERE a.id_carpeta = $id_carpeta";
        return $this->selectAll($sql);
    }

    public function getCarpeta($id) {
        $sql = "SELECT * FROM carpetas WHERE id = $id ";
        return $this->select($sql);
    }
}
