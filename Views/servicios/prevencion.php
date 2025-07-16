<?php include_once 'Views/template/header.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL . 'Assets/css/aside-carousel.css' ?>" />
<section id="general">
    <div>
        <!-- Título -->
        <div class="title-container">
            <h1><?php echo $data['title']; ?></h1>
        </div>
        <div class="container">
            <section>
                <article>
                    <a>
                        <div class="news-thumbnail">
                            <img src="<?php echo BASE_URL . 'Assets/img/Consejos.png'; ?>" alt="Oficina">
                        </div>
                        <div class="news-title">
                            Consejos para tu Seguridad.
                        </div>
                    </a>
                </article>
                <article>
                    <a>
                        <div class="news-thumbnail">
                            <img src="<?php echo BASE_URL . 'Assets/img/CPHS.jpg'; ?>" alt="Oficina">
                        </div>
                        <div class="news-title">
                            Nuevo email de contacto.
                        </div>
                    </a>
                </article>
                <article>
                    <a>
                        <div class="news-thumbnail">
                            <img src="<?php echo BASE_URL . 'Assets/img/Buzon CPHS.png'; ?>" alt="Oficina">
                        </div>
                        <div class="news-title">
                            Nuevo buzón de consultas y sugerencias.
                        </div>
                    </a>
                </article>
                <article>
                    <a>
                        <div class="news-thumbnail">
                            <img src="<?php echo BASE_URL . 'Assets/img/Medidas.png'; ?>" alt="Oficina">
                        </div>
                        <div class="news-title">
                            Medidas de seguridad en Escaleras.
                        </div>
                    </a>
                </article>
                <article>
                    <a>
                        <div class="news-thumbnail">
                            <img src="<?php echo BASE_URL . 'Assets/img/Rampa.png'; ?>" alt="Oficina">
                        </div>
                        <div class="news-title">
                            Rampa de estacionamiento.
                        </div>
                    </a>
                </article>
          
            </section>
            <aside>
                <div class="widget">
                    <div class="widget-title">
                        <div class="widget-title-text">
                            Bloque Informativo
                        </div>
                        <div class="widget-title-bar"></div>
                    </div>
                    <div class="aside-carousel">
                        <div class="aside-carousel-container">
                            <div class="aside-carousel-slide">
                                <img src="<?php echo BASE_URL; ?>Assets/img/Altas temperaturas.png" alt="Imagen 1">
                            </div>
                            <div class="aside-carousel-slide">
                                <img src="<?php echo BASE_URL; ?>Assets/img/Altas temperaturas2.png" alt="Imagen 2">
                            </div>
                            <div class="aside-carousel-slide">
                                <img src="<?php echo BASE_URL; ?>Assets/img/Hanta virus.png" alt="Imagen 3">
                            </div>
                            <div class="aside-carousel-slide">
                                <img src="<?php echo BASE_URL; ?>Assets/img/EPP.jpg" alt="Imagen 4">
                            </div>
                            <div class="aside-carousel-slide">
                                <img src="<?php echo BASE_URL; ?>Assets/img/AVA.png" alt="Imagen 5">
                            </div>
                            <div class="aside-carousel-slide">
                                <img src="<?php echo BASE_URL; ?>Assets/img/Trabajos en la vía.png" alt="Imagen 6">
                            </div>
                            <div class="aside-carousel-slide">
                                <img src="<?php echo BASE_URL; ?>Assets/img/Trabajos en la via2.jpg" alt="Imagen 7">
                            </div>

                        </div>
                    </div>
                </div>
            </aside>
        </div>

    </div>
</section>
<script src="<?php echo BASE_URL . 'Assets/js/aside.js'; ?>"></script>

<?php include_once 'Views/template/footer.php'; ?>