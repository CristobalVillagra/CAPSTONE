<?php include_once 'Views/template/header.php'; ?>
<section id="general">
    <div>
        <!-- Título -->
        <div class="title-container">
            <h1><?php echo $data['title']; ?></h1>
        </div>
        <div class="container">
            <section>
                <div class="widget">
                    <div class="widget-title">
                        <div class="widget-title-text">
                            Servicios Disponibles
                        </div>
                        <div class="widget-title-bar"></div>
                    </div>
                    <div id="servicios" class="widget-body">
                        <article>
                            <a href="" target="_blank" rel="noopener noreferrer">
                                <div class="news-thumbnail">
                                    <img src="<?php echo BASE_URL . 'Assets/img/SAP fiori.jpg'; ?>" alt="Oficina">
                                </div>
                                <div class="news-title">
                                    Aprobación via Fiori (Ordenes de Compras)
                                </div>
                            </a>
                        </article>
                    </div>
                </div>
            </section>
            <aside>
                <div class="widget">
                    <div class="widget-title">
                        <div class="widget-title-text">
                            Documentos de Calidad
                        </div>
                        <div class="widget-title-bar"></div>
                    </div>
                    <div class="box-container">
                        <a href="http://10.131.21.101/gestion/files/ver/7">
                            <div class="box">
                                <img class="img-box" src="<?php echo BASE_URL . 'Assets/img/icons8-folder-48.png' ?>">
                                <p class="text">Politicas</p>
                            </div>
                        </a>

                        <div class="box">
                            <img class="img-box" src="<?php echo BASE_URL . 'Assets/img/icons8-folder-48.png' ?>">
                            <p class="text">Planes de negocio y estrategia</p>
                        </div>
                        <div class="box">
                            <img class="img-box" src="<?php echo BASE_URL . 'Assets/img/icons8-folder-48.png' ?>">
                            <p class="text">Objetivos</p>
                        </div>
                        <div class="box">
                            <img class="img-box" src="<?php echo BASE_URL . 'Assets/img/icons8-folder-48.png' ?>">
                            <p class="text">Mapa de Procesos</p>
                        </div>
                        <div class="box">
                            <img class="img-box" src="<?php echo BASE_URL . 'Assets/img/icons8-folder-48.png' ?>">
                            <p class="text">Procesos Operativos</p>
                        </div>
                        <div class="box">
                            <img class="img-box" src="<?php echo BASE_URL . 'Assets/img/icons8-folder-48.png' ?>">
                            <p class="text">Procesos de apoyo</p>
                        </div>
                        <div class="box">
                            <img class="img-box" src="<?php echo BASE_URL . 'Assets/img/icons8-folder-48.png' ?>">
                            <p class="text">Normas ISO</p>
                        </div>
                        <div class="box">
                            <img class="img-box" src="<?php echo BASE_URL . 'Assets/img/icons8-folder-48.png' ?>">
                            <p class="text">Normas (aleatica-sacyr)</p>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
</section>

<?php include_once 'Views/template/footer.php'; ?>