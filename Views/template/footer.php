<footer class="column">

    <div class="footer-menu">
        <div class="container">
            <div class="footer1"><a href="">
                    <div class="footer-menu-title">Preguntas Frecuentes</div>
                    <div class="footer-menu-text">
                        <p>Lorem ipsum dolor sit amet. </p>
                    </div>
                </a>
            </div>
            <div class="footer2"><a href="">
                    <div class="footer-menu-title">Noticias</div>
                    <div class="footer-menu-text">
                        <p>Lorem ipsum dolor sit amet. </p>
                    </div>
                </a>
            </div>
            <div class="footer3"><a href="">
                    <div class="footer-menu-title">Solicitud</div>
                    <div class="footer-menu-text">
                        <p>Lorem ipsum dolor sit amet. </p>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="footer-area">
        <div id="contacto" class="container">

            <div class="footer-area-item">
                <div class="widget">
                    <div class="widget-title">
                        <div class="widget-title-text">
                            AVO1
                        </div>
                        <div class="widget-title-bar"></div>
                    </div>
                    <div class="widget-text">
                        <div class="widget-contact">E-mail: &nbsp<a href="">medicenter@mail.com</a></div>
                        <div class="widget-contact">33 Farlane Street. Keilor East.</div>
                    </div>
                    <div class="widget-callcenter">
                        <a href="tel:6006001414">
                            <span class="icon">
                                <i class=" fas fa-mobile-alt"></i>
                            </span>
                            <span class="info">
                                <small> Call Center </small>
                                600 600 1414
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="footer-area-item">
                <div class="widget">
                    <div class="widget-title">
                        <div class="widget-title-text">
                            Latest News
                        </div>
                        <div class="widget-title-bar"></div>
                    </div>
                    <div class="widget-news">
                        <a href="">
                            <div class="widget-text">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis accusamus qui nesciunt asperiores doloribus laudantium.</p>
                                <div class="widget-news-date">
                                    <span>3 days ago</span></br>
                                </div>
                            </div>
                        </a>
                        <a href="">
                            <div class="widget-text">
                                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Earum voluptatem laboriosam cumque laudantium blanditiis atque reprehenderit eos saepe excepturi officia.</p>
                                <div class="widget-news-date">
                                    <span>10 days ago</span></br>
                                </div>
                            </div>
                        </a>
                        <a href="">
                            <div class="widget-text">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis accusamus qui nesciunt asperiores doloribus laudantium.</p>
                                <div class="widget-news-date">
                                    <span>18 days ago</span></br>
                                </div>
                            </div>
                        </a>
                        <a href="">
                            <div class="widget-text">
                                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Earum voluptatem laboriosam cumque laudantium blanditiis atque reprehenderit eos saepe excepturi officia.</p>
                                <div class="widget-news-date">
                                    <span>24 days ago</span></br>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="footer-area-item">
                <div class="widget">
                    <div class="widget-title">
                        <div class="widget-title-text">
                            Sucursales
                        </div>
                        <div class="widget-title-bar"></div>
                    </div>
                    <div class="widget-text">
                        <a href="">
                            <div class="widget-department">Americo Vespucio Oriente/Los Turistas, Recoleta</div>
                        </a>
                        <a href="">
                            <div class="widget-department">Autopista Vespucio Oriente/ Av. Ossa, La Reina</div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <span>Desarrollado por Cristobal Villagra.</span>
        </div>
    </div>
    </div>
</footer>
<!-- Incluye jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Cargar DataTables y otros scripts que dependen de jQuery -->
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>

<!-- Incluye el plugin de Markdown -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-markdown@2.10.0/js/bootstrap-markdown.js"></script>

<!-- Incluye Bootstrap y DataTables -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>


<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>

<!-- Incluye los scripts específicos -->
<script src="<?php echo BASE_URL . 'Assets/js/main.min.js'; ?>"></script>
<script src="<?php echo BASE_URL . 'Assets/js/sweetalert2@11.js'; ?>"></script>
<script src="<?php echo BASE_URL . 'Assets/js/script.js'; ?>"></script>
<script type="text/javascript" src="<?php echo BASE_URL . 'Assets/plugins/DataTables/datatables.min.js'; ?>"></script>
<script src="<?php echo BASE_URL . 'Assets/js/custom.js'; ?>"></script>

<script src="<?php echo BASE_URL . 'Assets/js/select2.min.js';?>"></script>


<!-- Scripts específicos de la página -->
<?php if (!empty($data['script'])) { ?>
    <script src="<?php echo BASE_URL . 'Assets/js/pages/' . $data['script']; ?>"></script>
<?php } ?>
<?php if (!empty($data['usuarios'])) { ?>
    <script src="<?php echo BASE_URL . 'Assets/js/pages/' . $data['usuarios']; ?>"></script>
<?php } ?>

</body>

</html>