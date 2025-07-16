<?php
class Usuarios extends Controller
{
    public function __construct()
    {
        parent::__construct();
        session_start();
    }

    public function index()
    { //cambiar metodo
        $data['title'] = 'Gestion de Usuarios';
        $data['usuarios'] = 'usuarios.js';
        $this->views->getView('admin', 'usuarios', $data);
    }


    public function listar()
    {
        $data = $this->model->getUsuarios();

        if (!empty($data)) {
            foreach ($data as $key => $usuario) {
                // Si el usuario es el super admin (id == 1)
                if ($usuario['id'] == 1) {
                    $data[$key]['acciones'] = 'SUPER ADMIN';
                } else {
                    // Para otros usuarios se muestra el HTML con botones de acción
                    $data[$key]['acciones'] = '<div>
                        <a class="btn btn-info btn-sm btnEditar" data-id="' . $usuario['id'] . '" onclick="editar(' . $usuario['id'] . ')"> 
                            <i class="fas fa-edit"></i>
                        </a>
                        <a class="btn btn-danger btn-sm btnEliminar" data-id="' . $usuario['id'] . '" onclick="eliminar(' . $usuario['id'] . ')"> 
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </div>';
                }
            }
        }

        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }


    public function registrar()
    {
        $nombre      = $_POST['nombre'] ?? '';
        $apellido    = $_POST['apellido'] ?? '';
        $username    = $_POST['username'] ?? '';
        $telefono    = $_POST['telefono'] ?? '';
        $password    = $_POST['password'] ?? '';
        $rol         = $_POST['rol'] ?? '';
        $usuario_id  = $_POST['usuario_id'] ?? '';


        if (empty($nombre) || empty($apellido) || empty($username) || empty($telefono) || empty($password) || empty($rol)) {
            $res = array('tipo' => 'warning', 'mensaje' => 'Todos los campos son obligatorios');
        } else {
            if ($usuario_id == '') {
                // Comprobar si el usuario (correo) ya existe
                $verificarCorreo = $this->model->verificarUsuario('username', $username, 0);
                if (empty($verificarCorreo)) {
                    // Comprobar si el teléfono ya existe
                    $verificarTel = $this->model->verificarUsuario('telefono', $telefono, 0);
                    if (empty($verificarTel)) {
                        $hash = password_hash($password, PASSWORD_DEFAULT);
                        $data = $this->model->registrar($nombre, $apellido, $username, $telefono, $hash, $rol);
                        if ($data > 0) {
                            $res = array('tipo' => 'success', 'mensaje' => 'Usuario registrado');
                        } else {
                            $res = array('tipo' => 'error', 'mensaje' => 'Error al registrar usuario');
                        }
                    } else {
                        $res = array('tipo' => 'warning', 'mensaje' => 'El teléfono ya existe');
                    }
                } else {
                    $res = array('tipo' => 'warning', 'mensaje' => 'El correo ya existe');
                }
            } else {
                // Comprobar si el usuario (correo) ya existe
                $verificarCorreo = $this->model->verificarUsuario('username', $username, $usuario_id);
                if (empty($verificarCorreo)) {
                    // Comprobar si el teléfono ya existe
                    $verificarTel = $this->model->verificarUsuario('telefono', $telefono, $usuario_id);
                    if (empty($verificarTel)) {
                        $hash = password_hash($password, PASSWORD_DEFAULT);
                        $data = $this->model->modificar($nombre, $apellido, $username, $telefono, $hash, $rol, $usuario_id);
                        if ($data == 1) {
                            $res = array('tipo' => 'success', 'mensaje' => 'Usuario modificado');
                        } else {
                            $res = array('tipo' => 'error', 'mensaje' => 'Error al modificar');
                        }
                    } else {
                        $res = array('tipo' => 'warning', 'mensaje' => 'El teléfono ya existe');
                    }
                } else {
                    $res = array('tipo' => 'warning', 'mensaje' => 'El correo ya existe');
                }
            }
        }
        echo json_encode($res, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function delete($id)
    {
        $data = $this->model->delete($id);
        if ($data == 1) {
            $res = array('tipo' => 'success', 'mensaje' => 'Usuario eliminado');
        } else {
            $res = array('tipo' => 'wwarning', 'mensaje' => 'Error al eliminar usuario');
        }
        echo json_encode($res, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function editar($id)
    {
        $data = $this->model->getUsuario($id);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
}
