<!-- Modal de Opciones -->
<div class="modal fade" id="modalRegistro" tabindex="-1" aria-labelledby="modalRegistroLabel">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalRegistroLabel">Nuevo Registro</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <div class="d-grid gap-2">
                    <button type="button" id="btnNuevaCarpeta" class="btn btn-outline-primary">
                        <i class="fas fa-folder-plus"></i> Nueva Carpeta
                    </button>

                    <button type="button" id="btnNuevoArchivo" class="btn btn-outline-success">
                        <i class="fas fa-file-upload"></i> Nuevo Archivo
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal de Nueva Carpeta -->
<div class="modal fade" id="modalCarpeta" tabindex="-1" role="dialog" aria-labelledby="modalCarpetaLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCarpetaLabel">
                    <i class="fas fa-folder"></i> Nueva Carpeta
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <form id="frmCarpeta" autocomplete="off">
                <div class="modal-body">
                    <div class="form-label">Nombre de la Carpeta</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="fas fa-folder-open"></i>
                            </span>
                            <input type="text"
                                class="form-control"
                                name="nombre"
                                minlength="3"
                                maxlength="50"
                                id="nombre">

                        </div>
                        <div class="form-text">El nombre debe tener entre 3 y 50 caracteres</div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Crear Carpeta</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modalCompartir" tabindex="-1" role="dialog" aria-labelledby="modalCarpetaLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="title-compartir">
                    <i class="fas fa-folder"></i> Nueva Carpeta
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>

            <div class="modal-body">
                <input type="hidden" id="id_carpeta">
                <div class="form-label">
                    <a href="#" id="btnVer" class="btn btn-outline-info"> <i class="fa-solid fa-eye"></i> Ver archivos</a>
                    <hr>
                    <button type="button" id="btnSubir" class="btn btn-outline-primary"> <i class="fas fa-file-upload"></i> Subir archivo</button>
                    <hr>
                    <button type="button" id="btnCompartir" class="btn btn-outline-success ">
                        <i class="fa-solid fa-share-nodes"></i> Compartir
                    </button>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal de Nuevo Archivo -->
<div class="modal fade" id="modalArchivo" tabindex="-1" aria-labelledby="modalArchivoLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalArchivoLabel">
                    <i class="fas fa-file"></i> Nuevo Archivo
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <form id="frmArchivo" autocomplete="off" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nombreArchivo" class="form-label">Nombre del Archivo</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="fas fa-file-alt"></i>
                            </span>
                            <input type="text"
                                class="form-control"
                                id="nombreArchivo"
                                name="nombre"
                                required
                                minlength="3"
                                maxlength="100">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="tipoArchivo" class="form-label">Tipo de Archivo</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="fas fa-file-code"></i>
                            </span>
                            <select class="form-select" id="tipoArchivo" name="tipo" required>
                                <option value="">Seleccione un tipo</option>
                                <option value="documento">Documento</option>
                                <option value="imagen">Imagen</option>
                                <option value="pdf">PDF</option>
                                <option value="hoja_calculo">Hoja de Cálculo</option>
                                <option value="otro">Otro</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="archivo" class="form-label">Seleccionar Archivo</label>
                        <input type="file"
                            class="form-control"
                            id="archivo"
                            name="archivo"
                            required
                            accept=".pdf,.doc,.docx,.xls,.xlsx,.jpg,.jpeg,.png">
                        <div class="form-text">Formatos permitidos: PDF, DOC, DOCX, XLS, XLSX, JPG, PNG</div>
                    </div>
                    <input type="hidden" name="id_carpeta" id="id_carpeta">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Subir Archivo</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modalUsuario" tabindex="-1" role="dialog" aria-labelledby="title-usuarios">
    <div aria-labelledby="my-modal-title">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="title-usuarios">Compartir Archivo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <form id="frmCompartir">
                    <div class="modal-body">
                        
                        <select tabindex="-1" class="js-states form-control" style="display: none; width: 100%;" id="usuarios" name="usuarios[]" multiple="multiple">Selecciona a un Usuario</select>
                        <hr>
                        <div class="accordion accordion-flush mb-3" id="accordionFlushExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                        Seleccionar los Archivos a Compartir
                                    </button>
                                </h2>
                                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <div id="container-archivos">
                                           <!-- <input type="hidden" id="id_carpeta" name="id_carpeta"/> -->
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <hr>
                        <div class="text-center">
                            <a class="btn btn-primary" href="#" id="btnVerDetalle">Ver Detalles</a>
                        </div>
                        
                       
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Compartir</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>