const frmUsuario = document.querySelector('#frmUsuarios');
const btnNuevo = document.querySelector('#btnNuevo');
const appContent = document.getElementById('app-content');
const modalUsuario = document.querySelector('#modalUsuario');
const myModal = new bootstrap.Modal(modalUsuario);

let tblUsuarios;

document.addEventListener('DOMContentLoaded', function () {
    // Inicialización de DataTable
    tblUsuarios = $('#tblUsuarios').DataTable({
        ajax: {
            url: base_url + 'usuarios/listar',
            dataSrc: ""
        },
        columns: [
            { data: 'acciones' },
            { data: 'id' },
            { data: 'nombre' },
            { data: 'apellido' },
            { data: 'username' },
            { data: 'telefono' },
            { data: 'perfil' },
            { data: 'fecha' },
        ],
        language: {
            url: '//cdn.datatables.net/plug-ins/2.2.2/i18n/es-ES.json',
        },
        responsive: true
    });


    btnNuevo.addEventListener('click', function () {

        //if (frm.id_usuario) {
        //    frm.id_usuario.value = '';
        //}

        frmUsuario.reset();
        frmUsuario.password.removeAttribute('readonly');
        myModal.show();
    });

    // Envío del formulario para registrar o editar usuario vía AJAX
    if (frmUsuario) {
        frmUsuario.addEventListener('submit', function (e) {
            e.preventDefault();

            if (
                frmUsuario.nombre.value.trim() === '' ||
                frmUsuario.apellido.value.trim() === '' ||
                frmUsuario.username.value.trim() === '' ||
                frmUsuario.telefono.value.trim() === '' ||
                frmUsuario.password.value.trim() === '' ||
                frmUsuario.rol.value.trim() === ''
            ) {
                alertaPersonalizada('warning', 'Todos los campos son obligatorios');
                return;
            }

            const data = new FormData(frmUsuario);
            const http = new XMLHttpRequest();
            const url = base_url + 'usuarios/registrar';

            http.open('POST', url, true);
            http.send(data);

            http.onreadystatechange = function () {
                if (this.readyState === 4 && this.status === 200) {
                    console.log(this.responseText);
                    try {
                        const res = JSON.parse(this.responseText);
                        alertaPersonalizada(res.tipo, res.mensaje);
                        if (res.tipo === 'success') {
                            frmUsuario.reset();
                            if (myModal) myModal.hide();
                            if (typeof tblUsuarios !== 'undefined') {
                                tblUsuarios.ajax.reload();
                            }
                        }
                    } catch (err) {
                        alertaPersonalizada('error', 'Respuesta inválida del servidor');
                        console.error('Error al parsear JSON:', err);
                    }
                }
            };
        });
    }
});

// Función para eliminar un usuario
function eliminar(id) {
    const url = base_url + 'usuarios/delete/' + id;
    console.log('URL generada:', url); // Verifica que la URL sea correcta
    eliminarRegistro(
        'Esta seguro de eliminar',
        'El usuario se eliminara permanentemente',
        'Si, eliminar',
        url,
        tblUsuarios
    );
}

// Función para editar un usuario
function editar(id) {
    myModal.show();
    console.log('Editando usuario con ID:', id);
    const http = new XMLHttpRequest();
    const url = base_url + 'usuarios/editar/' + id;
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            const res = JSON.parse(this.responseText);

            if (frmUsuario.usuario_id) {
                frmUsuario.usuario_id.value = res.id;
            }
            frmUsuario.nombre.value = res.nombre;
            frmUsuario.apellido.value = res.apellido;
            frmUsuario.username.value = res.username;
            frmUsuario.telefono.value = res.telefono;
            frmUsuario.password.value = '000000000000';
            frmUsuario.password.setAttribute('readonly', 'readonly');
            frmUsuario.rol.value = res.rol;
            myModal.show();
        }
    };
}
