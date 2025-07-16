<?php
class Files extends Controller
{
    private $usuario_id;

    public function __construct()
    {
        parent::__construct();
        session_start();
        if (isset($_SESSION['id'])) {         //modificar la verificacion de id de la sesion
            $this->usuario_id = $_SESSION['id'];
        } else {

            header("Location: index.php");
            exit;
        }
    }


    public function index()
    {
        $data['title'] = 'Administración de Archivos';
        $data['script'] = 'files.js';
        $data['active'] = 'recent';
        $carpetas = $this->model->getCarpetas($this->usuario_id);
        $data['archivos'] = $this->model->getArchivosRecientes($this->usuario_id) ?? [];
        for ($i = 0; $i < count($carpetas); $i++) {
            $carpetas[$i]['color'] = substr(md5($carpetas[$i]['id']), 0, 6);
            $carpetas[$i]['fecha'] = time_ago(strtotime($carpetas[$i]['fecha_create']));
        }
        $data['carpetas'] = $carpetas;
        $this->views->getView('files', 'files', $data);
    }

    public function crearcarpeta()
    {
        $nombre = $_POST['nombre'];
        if (empty($nombre)) {
            $res = array('tipo' => 'warning', 'mensaje' => 'El nombre es obligatorio');
        } else {
            // Comprobar Nombre
            $verificarNom = $this->model->getVerificar('nombre', $nombre, 0, 0);
            if (empty($verificarNom)) {
                $data = $this->model->crearcarpeta($nombre, $this->usuario_id);
                if ($data > 0) {
                    $res = array('tipo' => 'success', 'mensaje' => 'Carpeta creada con éxito');
                } else {
                    $res = array('tipo' => 'error', 'mensaje' => 'Error al crear carpeta');
                }
            } else {
                $res = array('tipo' => 'warning', 'mensaje' => 'la carpeta ya existe');
            }
        }
        echo json_encode($res, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function subirarchivo()
    {

        $id_carpeta = (empty($_POST['id_carpeta'])) ? 1 : $_POST['id_carpeta'];
        $archivo = $_FILES['archivo'];
        $name = $archivo['name'];
        $tmp = $archivo['tmp_name'];
        $tipo = $archivo['type'];
        $data = $this->model->subirarchivo($name, $tipo, $id_carpeta);

        if ($data > 0) {
            $destino = 'Assets/archivos';
            if (!file_exists($destino)) {
                mkdir($destino);
            }
            $carpetas = $destino . '/' . $id_carpeta;
            if (!file_exists($carpetas)) {
                mkdir($carpetas);
            }
            move_uploaded_file($tmp, $carpetas . '/' . $name);
            $res = array('tipo' => 'success', 'mensaje' => 'Archivo subido con éxito');
        } else {
            $res = ['tipo' => 'error', 'mensaje' => 'Error al registrar archivo en la base de datos'];
        }

        echo json_encode($res, JSON_UNESCAPED_UNICODE);
        die();
    }




    public function ver($id_carpeta)
    {
        $data['title'] = 'Listado de archivos';
        $data['script'] = 'files.js';
        $data['active'] = 'detail';
        $data['archivos'] = $this->model->getArchivos($id_carpeta, $this->usuario_id) ?? [];
        $this->views->getView('files', 'archivos', $data);
    }


    public function verDetalle($id_carpeta)
    {

        $data['title'] = 'Archivos compartidos';
        $data['id_carpeta'] = $id_carpeta;
        $data['script'] = 'details.js';
        $data['carpeta'] = $this->model->getCarpeta($id_carpeta);
        if (empty($data['carpeta'])) {
            echo 'Pagina no encontrada';
            exit;
        }
        $this->views->getView('admin', 'detalle', $data);
    }
    public function listarDetalle($id_carpeta)
    {
        $data = $this->model->getArchivosCompartidos($id_carpeta);
        for ($i = 0; $i < count($data); $i++) {
            if ($data[$i]['estado'] == 0) {
                $data[$i]['estado'] = '<span class="badge bg-danger">Se Rechazo y Elimino ' . $data[$i]['eliminado'] . '</span>';
                $data[$i]['acciones'] = '';
            } else {

                $data[$i]['estado'] = '<span class="badge bg-success">Compartido</span>';
                $data[$i]['acciones'] = '<button class="btn btn-danger btn-sm" onclick="eliminarDetalle(' .
                    $data[$i]['id'] . ')">Eliminar</button>';
            }
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
}
