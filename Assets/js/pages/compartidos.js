const emails = document.querySelectorAll('.email');

const contentInfo = document.getElementById('content-info');



document.addEventListener('DOMContentLoaded', () => {


  emails.forEach(row => {
    row.addEventListener('click', function (e) {
      console.log(e.target.id)
      let id_detalle = this.getAttribute('data-id');
      verDetalle(id_detalle);


    });
  });

  function verDetalle(id_detalle) {
    const http = new XMLHttpRequest();
    const url = base_url + 'Compartidos/verDetalle/' + id_detalle;
    http.open('GET', url, true);
    http.send();
    http.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        try {
          const res = JSON.parse(this.responseText);
          if (res.error) {
            contentInfo.innerHTML = `<p class="text-warning">${res.message}</p>`;
            return;
          }

          let html = `
        <div id="reader" class="p-1 position-relative d-none d-md-block">
          <div class="row email-info p-2">
            <div class="col-md-8 metadata">
              <div class="from">${res.nombre}</div>
              <div class="date">${res.fecha_add}</div>
            </div>
            <div class="col-md-3 actions">
              <div class="email-actions d-flex justify-content-between">
                <i class="fa-solid fa-trash"></i>
                <i class="fa-solid fa-reply"></i>
                <i class="fa-solid fa-share"></i>
                <i class="fa-solid fa-ellipsis"></i>
              </div>
            </div>
          </div>
          <div class="email-content p-3">
            <h5>Archivo compartido en la carpeta #${res.id_carpeta}</h5
          </div>
          <div class="attachments p-2 d-flex">
            <div class="attachment d-flex align-items-center">
              <span class="badge bg-secondary me-2">${res.tipo}</span>
              <i class="fa-solid fa-paperclip me-2"></i>
              <span>${res.nombre}</span>
              <a target="_blank" href="${base_url + 'Assets/archivos/' + res.id_carpeta + '/' + res.nombre}" download="${res.nombre}" >
                <i class="fa-solid fa-circle-down"></i>
              </a>
            </div>
            <div class="mailbox-opens-actions ms-auto">
              <i class="fa-solid fa-trash"><a href="#" class="btn-danger" onclick="eliminarCompartido(${res.id})"></a></i>
            </div>
          </div>
        </div>`;

          contentInfo.innerHTML = html;
        } catch (error) {
          console.error("Failed to parse JSON response:", error);
        }
      }
    };

  };
}); 

function eliminarCompartido(id) {
  const url = base_url + 'compartidos/eliminar/' + id;
  eliminarRegistro('Esta seguro de eliminar este correo?', 'El mail se eliminara permanentemente ', 'Si, eliminar', url, null);
}