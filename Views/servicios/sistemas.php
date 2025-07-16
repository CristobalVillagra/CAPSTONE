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
                        <a href="https://aleatica.asa.hec.ondemand.com/sap/bc/ui2/flp/FioriLaunchpad.html"  target="_blank" rel="noopener noreferrer">
                            <div class="news-thumbnail">
                                <img src="<?php echo BASE_URL . 'Assets/img/SAP fiori.jpg'; ?>" alt="Oficina">
                            </div>
                            <div class="news-title">
                                Aprobación via Fiori (Ordenes de Compras)
                            </div>
                        </a>
                    </article>

                    <article>
                        <a href="https://aleatica.asa.hec.ondemand.com/sap/bc/gui/sap/its/webgui#" target="_blank" rel="noopener noreferrer">
                            <div class="news-thumbnail">
                                <img src="<?php echo BASE_URL . 'Assets/img/SAP.png' ?>" alt="Oficina">
                            </div>
                            <div class="news-title">
                                SAP web
                            </div>
                        </a>
                    </article>
                    <article>
                        <a href="https://scd.avo.cl/Login" target="_blank" rel="noopener noreferrer">

                            <div class="news-thumbnail">
                                <img src="<?php echo BASE_URL . 'Assets/img/files.jpg' ?>" />
                            </div>
                            <div class="news-title">
                                Sistema de control documental
                            </div>
                        </a>
                    </article>
                    <article>
                        <a href="http://backoffice.avo1.cl/?signin" target="_blank" rel="noopener noreferrer">

                            <div class="news-thumbnail">
                                <img src="<?php echo BASE_URL . 'Assets/img/kapsch.png' ?>" />
                            </div>
                            <div class="news-title">
                                Acceso a BO(CAC)
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
                        Departments
                    </div>
                    <div class="widget-title-bar"></div>
                </div>

            </div>
        </aside>
    </div>

   
</section>

<?php include_once 'Views/template/footer.php'; ?>