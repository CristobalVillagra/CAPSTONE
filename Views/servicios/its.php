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
                        <a href="http://10.133.50.38:8090/openits/login.html"  target="_blank" rel="noopener noreferrer">
                            <div class="news-thumbnail">
                                <img src="<?php echo BASE_URL . 'Assets/img/AVO1.png'; ?>" alt="Oficina">
                            </div>
                            <div class="news-title">
                                Open ITS
                            </div>
                        </a>
                    </article>

                    <article>
                        <a href="https://tcmn.avo1.cl/GIMWeb/PC/Inici.aspx" target="_blank" rel="noopener noreferrer">
                            <div class="news-thumbnail">
                                <img src="<?php echo BASE_URL . 'Assets/img/AVO1.png' ?>" alt="Oficina">
                            </div>
                            <div class="news-title">
                                TCMAN
                            </div>
                        </a>
                    </article>
                    <article>
                        <a href="http://10.133.50.40/avogip/fuel/login" target="_blank" rel="noopener noreferrer">

                            <div class="news-thumbnail">
                                <img src="<?php echo BASE_URL . 'Assets/img/files.jpg' ?>" />
                            </div>
                            <div class="news-title">
                                WEBGIP
                            </div>
                        </a>
                    </article>
                </div>
            </div>
        </section>
    </div>
   
</section>

<?php include_once 'Views/template/footer.php'; ?>