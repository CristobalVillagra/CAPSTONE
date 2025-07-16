<?php
class Home extends Controller
{
    public function __construct()
    {
        parent::__construct();
        session_start();
    }

    public function index()
    {
        $data['title'] = 'Iniciar Sesión';
        $this->views->getView('home', 'index', $data);
    }

    public function validar()
    {
        if (isset($_POST['username']) && isset($_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Verificar si los valores no están vacíos
            if (!empty($username) && !empty($password)) {
                // Obtener los datos del usuario
                $data = $this->model->getUsuario($username);

                // Verificar si se encontraron datos del usuario
                if ($data) {
                    // Verificar la contraseña
                   
                    if ($password == $data['password']) {
                        // Iniciar sesión
                        $_SESSION['id'] = $data['id'];
                        $_SESSION['username'] = $data['username'];
                        $_SESSION['nombre'] = $data['nombre'];
                        $res = array('tipo' => 'success', 'mensaje' => 'Bienvenido a la plataforma');
                    } else {
                        // Contraseña incorrecta
                        $res = array('tipo' => 'warning', 'mensaje' => 'Contraseña incorrecta');
                    }
                } else {
                    // Usuario no encontrado
                    $res = array('tipo' => 'warning', 'mensaje' => 'El usuario no existe');
                }
            } else {
                // Campos vacíos en $_POST
                $res = array('tipo' => 'warning', 'mensaje' => 'Todos los campos son obligatorios');
            }
        } else {
            // Campos faltantes en $_POST
            $res = array('tipo' => 'warning', 'mensaje' => 'Todos los campos son obligatorios');
        }

        // Devolver la respuesta como JSON
        echo json_encode($res, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function logout()
    {
        session_destroy();
        header('Location: ' . BASE_URL);
    }


   

}
