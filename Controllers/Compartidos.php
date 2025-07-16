<?php
class Compartidos extends Controller
{
    public function __construct()
    {
        parent::__construct();
        session_start();
        
    }

    public function index()
    {
        $data['title'] = 'Archivo Compartidos';
        $data['script'] = 'compartidos.js';
        $username = $_SESSION['username'] ?? 'Usuario';
        $data['archivos'] = $this->model->getArchivosCompartidos($_SESSION['id']);
        $this->views->getView('admin', 'compartidos', $data);
    }

    public function verDetalle($id_detalle)
    {
        $id = intval($id_detalle);
        $data = $this->model->getDetalle($id);
        $data['fecha'] = time_ago(strtotime($data['fecha_add']));
        if (!$data) {
            // respuesta clara para JS
            echo json_encode([
                'error'   => true,
                'message' => "Detalle con ID {$id} no encontrado"
            ], JSON_UNESCAPED_UNICODE);
        } else {
            // datos válidos
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
        }
        die();
    }
    public function eliminar($id) {
        $data = $this->model->eliminarCompartido($id);
        if ($data) {
            $res = array('mensaje' => 'Archivo eliminado correctamente', 'tipo' => 'success');
        } else {
            $res = array('mensaje' => 'Error al eliminar el archivo', 'tipo' => 'error');
        }
        echo json_encode($res, JSON_UNESCAPED_UNICODE);
        die();
    }
}
