<?php include_once 'Views/template/header.php'; ?>

<div class="container-fluid">
  
    <!-- Encabezado -->
    <div class="row mb-4">
        <div class="col">
            <div class="page-header d-flex justify-content-between align-items-center">
                <h1 class="h2"><?php echo $data['title']; ?></h1>
                <div class="d-flex align-items-center">
                    <span class="user-info me-3"><?php echo isset($_SESSION['username']) ? $_SESSION['username'] : 'Usuario'; ?><span class="user-state"></span></span>
                    <button class="btn btn-primary" type="button" id="btnNuevo">
                        <i class="fas fa-plus"></i> Nuevo
                    </button>
                    <div class="serach">
                        <form>
                            <input type="text" class="form-control" id="search" placeholder="Buscar Archivos...">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Contenido Principal -->
    <div class="row">
        <!-- Lista de Carpetas -->
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Carpetas</h5>
                </div>
                <?php foreach ($data['carpetas'] as $carpeta) { ?>
                    <div class="card-body">
                        <div class="file-manager">
                            <i class="fa-solid fa-folder" style="color: #<?php echo $carpeta['color']; ?>;"></i>
                            <a href="#" data-id="<?php echo $carpeta['id']; ?>" class="carpetas"><?php echo $carpeta['nombre']; ?></a>
                            <span class="carpeta-about"><?php echo $carpeta['fecha_create']; ?></span>
                        </div>
                    </div>
                <?php } ?>
                
            </div>
        </div>

        <!-- Lista de Archivos -->
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Archivos</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="tblArchivos">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Tipo</th>
                                    <th>Carpeta</th>
                                    <th>Fecha</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data['archivos'] as $archivo) { ?>
                                    <tr>
                                        <td><?php echo $archivo['nombre']; ?></td>
                                        <td><?php echo $archivo['tipo']; ?></td>
                                        <td><?php echo $archivo['id_carpeta']; ?></td>
                                        <td><?php echo date('d/m/Y H:i', strtotime($archivo['fecha_create'])); ?></td>
                                        <td>
                                           <button class="btn btn-sm btn-success" href="<?php echo BASE_URL . 'Assets/archivos/' . $archivo['id_carpeta'] . '/' . $archivo['nombre']; ?>" download="<?php echo $archivo['nombre']; ?>">
                                                <i class="fas fa-download"></i>
                                            </button>
                                            <button class="btn btn-sm btn-primary" onclick="editarArchivo(<?php echo $archivo['id']; ?>)">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-danger btn-sm eliminar" href="#" data-id="<?php echo $archivo['id']; ?>">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>

                                            <button class="btn btn-sm btn-secondary compartir" id="<?php echo $archivo['id']; ?>">
                                                <i class="fa-solid fa-share-from-square"></i>
                                            </button>

                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>


</div>

<?php
include_once 'Views/components/modal.php';
include_once 'Views/template/footer.php';
?>