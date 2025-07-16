<?php include_once 'Views/template/header.php'; ?>


<div class="container-fluid">
    <div class="row mb-4">
        <div class="col">
            <div class="page-header d-flex justify-content-between align-items-center">
                <h1 class="h2"><?php echo $data['title']; ?></h1>
            </div>
        </div>
    </div>

    <div class="row">


        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Archivos</h5>
            </div>
            <div class="card-body">
                <input type="hidden" id="id_carpeta">
                <div class="table-responsive">
                    <table class="table table-striped">
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
                            <?php if (!empty($data['archivos'])): ?>
                                <?php foreach ($data['archivos'] as $archivo): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($archivo['nombre']); ?></td>
                                        <td><?php echo htmlspecialchars($archivo['tipo']); ?></td>
                                        <td><?php echo htmlspecialchars($archivo['id_carpeta']); ?></td>
                                        <td><?php echo htmlspecialchars(date('d/m/Y H:i', strtotime($archivo['fecha_create']))); ?></td>
                                        <td>

                                            <button class="btn btn-sm btn-success" href="<?php echo BASE_URL . 'Assets/archivos/' . $archivo['id_carpeta'] . '/' . $archivo['nombre']; ?>">
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
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="5" class="text-center">No hay archivos disponibles</td>
                                </tr>
                            <?php endif; ?>
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