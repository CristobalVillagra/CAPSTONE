<?php include_once 'Views/template/header.php'; ?>

<link rel="stylesheet" href="<?php echo BASE_URL . 'Assets/css/organigrama.css'; ?>">

<!-- Contenedor principal -->
<div class="main-container">
    <!-- Título -->
    <div class="title-container">
        <h1><?php echo $data['title']; ?></h1>
    </div>

    <!-- Carrusel -->
    <div class="carousel-wrapper">
        <div class="carousel-container">
            <div class="carousel-slide">
                <img src="<?php echo BASE_URL; ?>Assets/img/gcontrol.png" alt="Imagen 1">
            </div>
            <div class="carousel-slide">
                <img src="<?php echo BASE_URL; ?>Assets/img/gadmfin.png" alt="Imagen 3">
            </div>
            <div class="carousel-slide">
                <img src="<?php echo BASE_URL; ?>Assets/img/goperaciones.png" alt="Imagen 4">
            </div>
        </div>
    </div>
</div>

<?php include_once 'Views/template/footer.php'; ?>