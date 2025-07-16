<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL . 'Assets/css/menu.css' ?>" />

<div class="content-menu">
    <?php $active = isset($data['active']) ? $data['active'] : ''; ?>
    <ul class="content-menu">
        <li><a href="<?php echo BASE_URL . 'archivos';?>" class="<?php echo ($data['active'] == 'todos') ? 'active' : ''; ?>">Todos</a></li>
        <li><a href="<?php echo BASE_URL . 'files';?>" class="<?php echo ($data['active'] == 'recent') ? 'active' : ''; ?>">Recientes</a></li>
        <li><a href="#" class="<?php echo ($data['active'] == 'deleted') ? 'active' : ''; ?>">Eliminados</a></li>
        <li><a href="#" class="<?php echo ($data['active'] == 'share') ? 'active' : ''; ?>">Compartidos</a></li>
    </ul>
</div>