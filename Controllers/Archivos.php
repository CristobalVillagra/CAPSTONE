<?php
class Archivos extends Controller
{
    private $usuario_id;

    public function __construct()
    {
        parent::__construct();
        session_start();
        if (!isset($_SESSION['id'])) {
            header("Location: index.php");
            exit;
        }
        $this->usuario_id = $_SESSION['id'];
    }

    public function index()
    {
        $data['title'] = 'Archivos';
        $data['active'] = 'todos';
        $data['script'] = 'files.js';
        $data['archivos'] = $this->model->getArchivosUsuario($this->usuario_id);

        $carpetas = $this->model->getCarpetas($this->usuario_id);
        foreach ($carpetas as &$carpeta) {
            $carpeta['color'] = substr(md5($carpeta['id']), 0, 6);
            $carpeta['fecha'] = time_ago(strtotime($carpeta['fecha_create']));
        }

        $data['carpetas'] = $carpetas;
        $this->views->getView('files', 'index', $data);
    }

    public function getUsuarios()
    {
        $valor = $_GET['q'] ?? '';
        $data = $this->model->getUsuarios($valor, $this->usuario_id);

        for ($i = 0; $i < count($data); $i++) {
            $data[$i]['text'] =  $data[$i]['username'];
        }

        echo json_encode($data);
        die();
    }

    public function compartir()
    {
        $id_archivo = $_POST['id_archivo']  ?? [];
        $usuarios = $_POST['username']  ?? [];
        $res = 0;
        for ($i = 0; $i < count($usuarios); $i++) {
            $dato = $this->model->getUsuario($usuarios[$i]);
            $result = $this->model->getDetalle($dato['username'], $id_archivo);
            if (empty($result)) {
                $res = $this->model->compartirArchivo($dato['username'], $id_archivo, $this->usuario_id);
            }
        }
        if ($res > 0) {
            $res = array('tipo' => 'success', 'mensaje' => 'Archivo compartido correctamente');
        } else {
            $res = array('tipo' => 'error', 'mensaje' => 'Error al compartir el archivo');
        }
        echo json_encode($res, JSON_UNESCAPED_UNICODE);
        exit;
    }
    public function buscarCarpeta($id)
    {
        $data = $this->model->getCarpeta($id);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function verArchivos($id_carpeta)
    {
        $data = $this->model->getArchivosCarpeta($id_carpeta);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        exit;
    }
    public function eliminar($id)
    {
        $fecha = date('Y-m-d H:i:s');
        $nueva = date("Y-m-d H:i:s", strtotime($fecha . ' + 1 month'));
        $data = $this->model->eliminar($nueva, $id);
        if ($data) {
            $res = array('tipo' => 'success', 'mensaje' => 'Archivo eliminado correctamente');
        } else {
            $res = array('tipo' => 'error', 'mensaje' => 'Error al eliminar el archivo compartido');
        }
        echo json_encode($res);
        die();
    }


    public function eliminarCompartido($id)
    {
        $fecha = date('Y-m-d H:i:s');
        $nueva = date("Y-m-d H:i:s", strtotime($fecha . ' + 1 month'));
        $data = $this->model->eliminarCompartido($nueva, $id);
        if ($data) {
            $res = array('tipo' => 'success', 'mensaje' => 'Archivo eliminado correctamente');
        } else {
            $res = array('tipo' => 'error', 'mensaje' => 'Error al eliminar el archivo compartido');
        }
        echo json_encode($res);
        die();
    }
    public function busqueda($valor)
    {
        $data = $this->model->getBusqueda($valor, $this->usuario_id);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
}
