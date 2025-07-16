const id_carpeta = document.querySelector('#id_carpeta');
let tbl;
document.addEventListener('DOMContentLoaded', function () {
     tbl = $('#tblDetalle').DataTable({
        ajax: {
            url: base_url + 'files/listarDetalle/' + id_carpeta.value,
            dataSrc: ''
        },
        columns: [
            { data: 'acciones' },
            { data: 'nombre' },
            { data: 'username' },
            { data: 'estado' }
        ],
        lenguage: {
            url: 'https://cdn.datatables.net/plug-ins/1.13.1/i18n/es-ES.json'
        },
        responsive: true,
        "scolly": "200px",
        destroy: true,
        order: [[1, 'desc']],
    });
    return;
});

function eliminarDetalle (id) {
    const url   = base_url + 'archivos/eliminarCompartido/' + id;
    eliminarRegistro('¿Está seguro de eliminar este registro?', 'el registro se eliminara permanentemente', 'si, eliminar', url, tbl);
}