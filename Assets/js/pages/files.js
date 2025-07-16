// FORMULARIO
const btnNuevo = document.querySelector('#btnNuevo');
const modalRegistro = document.querySelector('#modalRegistro');
const modal = modalRegistro ? new bootstrap.Modal(modalRegistro) : null;

// ARCHIVOS
const btnNuevoArchivo = document.querySelector('#btnNuevoArchivo');
const modalArchivo = document.querySelector('#modalArchivo');
const modal2 = modalArchivo ? new bootstrap.Modal(modalArchivo) : null;
const frmArchivo = document.querySelector('#frmArchivo');
const archivo = document.querySelector('#archivo');

// CARPETAS
const carpetas = document.querySelectorAll('.carpetas');
const btnNuevaCarpeta = document.querySelector('#btnNuevaCarpeta');
const modalCarpeta = document.querySelector('#modalCarpeta');
const modal1 = modalCarpeta ? new bootstrap.Modal(modalCarpeta) : null;
const frmCarpeta = document.querySelector('#frmCarpeta');

// COMPARTIR
const compartir = document.querySelectorAll('.compartir');
const modalCompartir = document.querySelector('#modalCompartir');
const modal3 = modalCompartir ? new bootstrap.Modal(modalCompartir) : null;
const id_carpeta = document.querySelector('#id_carpeta');


const btnSubir = document.querySelector('#btnSubir');
const btnVer = document.querySelector('#btnVer');
const frmCompartir = document.querySelector('#frmCompartir');
const btnCompartir = document.querySelector('#btnCompartir');
const container_archivos = document.querySelector('#container-archivos');

const usuarios = document.querySelector('#usuarios');
const modalUsuario = document.querySelector('#modalUsuario');
const modalUser = modalUsuario ? new bootstrap.Modal(modalUsuario) : null;
    


// ELIMINAR ARCHIVO
const eliminar = document.querySelectorAll('.eliminar');

const btnVerDetalle = document.querySelector('#btnVerDetalle');

const content_acordeon = document.querySelector('#accordionFlushExample');


document.addEventListener('DOMContentLoaded', function () {
   

    if (btnNuevo) {
        btnNuevo.addEventListener('click', function () {
            if (modal) modal.show();
        });
    }




    btnNuevaCarpeta.addEventListener('click', function () {
        if (modal) modal.hide();
        if (modal1) modal1.show();
    });



    btnNuevoArchivo.addEventListener('click', function () {
        if (modal) modal.hide();
        if (modal2) modal2.show();
        if (archivo) archivo.click();
    });



    frmCarpeta.addEventListener('submit', function (e) {
        //e.preventDefault();
        if (frmCarpeta.nombre.value == '') {
            alertaPersonalizada('warning', 'El nombre de la carpeta no puede estar vacío');
        } else {
            const data = new FormData(frmCarpeta);
            const http = new XMLHttpRequest();
            const url = base_url + 'files/crearcarpeta';
            http.open("POST", url, true);
            http.send(data);
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    const res = JSON.parse(this.responseText);
                    alertaPersonalizada(res.tipo, res.mensaje);
                    if (res.tipo == 'success') {
                        setTimeout(() => {
                            window.location.reload();
                        }, 1500);
                    }
                }
            }
        }
    });



    archivo.addEventListener('change', function (e) {
        console.log(e.target.files[0]);
        const data = new FormData(frmArchivo);
        data.append('id_carpeta', id_carpeta.value);
        data.append('archivo', archivo.files[0]);
        const http = new XMLHttpRequest();
        const url = base_url + 'files/subirarchivo';
        http.open("POST", url, true);
        http.send(data);
        http.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                console.log(e.target.files[0]);
                const res = JSON.parse(this.responseText);
                alertaPersonalizada(res.tipo, res.mensaje);
                if (res.tipo == 'success') {
                    setTimeout(() => {
                        window.location.reload();
                    }, 1500);
                }
            }
        }
    });


    carpetas.forEach(carpeta => {
        carpeta.addEventListener('click', function (e) {
            const carpetaId = this.dataset.id || this.id || e.currentTarget.id;
            if (id_carpeta && carpetaId) {
                id_carpeta.value = carpetaId;
                if (modal3) modal3.show();
            }
        });
    });


    btnSubir.addEventListener('click', function () {
        if (modal3) modal3.hide();
        if (archivo) archivo.click();
    });



    btnVer.addEventListener('click', function () {
        if (id_carpeta) {
            window.location = base_url + 'files/ver/' + id_carpeta.value;
        }

    });


    $(".js-states").select2({
        
        placeholder: "Seleccionar usuarios",
        maximumSelectionLength: 10,
        minimumInputLength: 1,
        dropdownParent: $('#modalUsuario'),
        ajax: {
            url: base_url + 'archivos/getUsuarios',
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    q: params.term,
                };
            },
            processResults: function (data) {

                return {
                    results: data

                };
            },
            cache: true
        },

    });

    // Manejo de compartir
    compartir.forEach(enlace => {
        enlace.addEventListener('click', function (e) {
            //const archivoId = this.getAttribute('data-id');
            compartirArchivo(e.target.id);
        });
    });




    frmCompartir.addEventListener('submit', function (e) {
        e.preventDefault();
        if (usuarios.value == '') {
            console.log('No se seleccionó ningún usuario');
            alertaPersonalizada('warning', 'Debe seleccionar al menos un usuario para compartir');
        } else {
            console.log('Se seleccionó al menos un usuario');
            const data = new FormData(frmCompartir);
            const http = new XMLHttpRequest();
            const url = base_url + 'archivos/compartir';
            http.open("POST", url, true);
            http.send(data);
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);
                    const res = JSON.parse(this.responseText);
                    alertaPersonalizada(res.tipo, res.mensaje);
                    if (res.tipo == 'success') {

                        $('.js-states').val(null).trigger('change'); // Limpiar el select2
                        if (modalUser) modalUser.hide();
                    }
                }
            };
        }

    })

    btnCompartir.addEventListener('click', function () {
        verArchivos();

    });


    btnVerDetalle.addEventListener('click', function () {
        window.location.href = base_url + 'files/verDetalle/' + id_carpeta.value;
    });

    eliminar.forEach(enlace => {
        enlace.addEventListener('click', function (e) {
            let id = e.target.getAttribute('data-id');
            const url   = base_url + 'archivos/eliminar/' + id;
            eliminarRegistro('¿Está seguro de eliminar este registro?', 'el registro se eliminara permanentemente', 'si, eliminar', url, null);
        })
    });
});



function compartirArchivo(id) {
    const http = new XMLHttpRequest();
    const url = base_url + 'archivos/buscarCarpeta/' + id;
    http.open('GET', url, true);
    http.send();

    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);
            console.log(this.responseText);
            id_carpeta.value = res.id_carpeta;
            content_acordeon.classList.add('d-none');
            container_archivos.innerHTML = `<input type="hidden"  value="${res.id}" name="archivos[]">`; // Limpiar el contenedor de archivos
            modalUser.show();
        }
    }
}

function verArchivos() {
    const http = new XMLHttpRequest();
    const url = base_url + 'archivos/verArchivos/' + id_carpeta.value;
    http.open('GET', url, true);
    http.send();
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {

            const res = JSON.parse(this.responseText);
            console.log(this.responseText);
            let html = '';
            if (res.length > 0) {
                content_acordeon.classList.remove('d-none');
                res.forEach(archivo => {
                    html += `<div class="checkbox">
                        <input type="checkbox" class="form-check-input" name="archivos[]" value="${archivo.id}" id="flexCheckDefault_${archivo.id}">
                        <label class="form-check-label" for="flexCheckDefault_${archivo.id}">${archivo.nombre}</label>
                    </div>`;
                });
                //cargarDetalle(id_carpeta.value);
            } else {
                html = `<div class="alert alert-info alert-indicator-right indicator-warning" role="alert">
                    <div clas="alert-content">
                        <span class="alert-title"></span>
                        <span class="alert-text">Carpeta vacia</span>
                    </div>
                </div>`;
            }
            container_archivos.innerHTML = html;
            if (modal3) modal3.hide();

            modalUser.show();
        }
    }
}

