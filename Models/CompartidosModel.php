<?php
class CompartidosModel extends Query
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getArchivosCompartidos($usuario_id)
    {
        $sql = "SELECT d.id, d.username, a.nombre AS archivo, u.nombre FROM detalle_archivos d INNER JOIN archivos a ON d.id_archivo = a.id INNER JOIN usuarios u ON d.usuario_id = u.id WHERE d.usuario_id = $usuario_id AND d.estado != 0  ORDER BY d.id DESC";
        return $this->selectAll($sql);
    }   

    public function getDetalle($id_detalle)
    {
        $sql = "SELECT d.id, d.fecha_add, d.username, a.nombre, a.tipo, a.id_carpeta, u.username AS compartido, u.nombre AS usuario FROM detalle_archivos d INNER JOIN archivos a ON d.id_archivo = a.id INNER JOIN carpetas c ON a.id_carpeta = c.id INNER JOIN usuarios u ON d.usuario_id = u.id WHERE d.id = $id_detalle ";
        return $this->select($sql);
    } 
    
    public function eliminarCompartido($id)
    {
        $sql = "UPDATE detalle_archivos SET estado = ? WHERE id = ?";
        
        return $this->save($sql, [0, $id]);
    }
}