<?php include_once 'Views/template/header.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL . 'Assets/css/aside-carousel.css' ?>" />
<section id="general">
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
						<a href="<?php echo BASE_URL . 'organigrama'; ?>">
							<div class="news-thumbnail">
								<img src="<?php echo BASE_URL . 'Assets/img/office.jpg'; ?>" alt="Oficina">
							</div>
							<div class="news-title">
								Conoce tu área
							</div>
							<div class="news-preview">
								<p>Aqui podras conocer la estructura de cada area en la empresa.</p>
							</div>
						</a>
					</article>

					<article>
						<a href="<?php echo BASE_URL . 'compartidos'; ?>">

							<div class="news-thumbnail">
								<img src="<?php echo BASE_URL . 'Assets/img/files.jpg' ?>" />
							</div>
							<div class="news-title">
								Compartidos
							</div>
							<div class="news-preview">
								<p>Aqui podras ver los archivos compartidos entre los usuarios. </p>
							</div>
						</a>
					</article>
					<article>
						<a href="https://www.avo.cl/canal-de-denuncias" target="_blank" rel="noopener noreferrer">

							<div class="news-thumbnail">
								<img src="<?php echo BASE_URL . 'Assets/img/solicitud-linea.jpeg' ?>" />
							</div>
							<div class="news-title">
								Realiza una solicitud en linea
							</div>
							<div class="news-preview">
								<p>Aqui podras realizar tus solicitudes con Nosotros.</p>
							</div>
						</a>
					</article>
					<article>
						<a href="">

							<div class="news-thumbnail">
								<img src="<?php echo BASE_URL . 'Assets/img/solicitud-linea.jpeg' ?>" />
							</div>
							<div class="news-title">
								Oficina Virtual
							</div>
							<div class="news-preview">
								<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam pariatur dolores aperiam quos placeat fugiat aut id vero minus corrupti, amet recusandae aliquid, eos doloribus quae at ea tempore! Pariatur.</p>
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
</section>
<div class="carousel-wrapper">
	<div class="carousel-container">
		<div class="carousel-slide">
			<img src="Assets/img/solicitud-linea.jpeg" alt="Imagen 1">
		</div>
		<div class="carousel-slide">
			<img src="Assets/img/img3.jfif" alt="Imagen 2">
		</div>
		<div class="carousel-slide">
			<img src="Assets/img/inaguracion_AVO.jpg" alt="Imagen 3">
		</div>
		<div class="carousel-slide">
			<img src="Assets/img/solicitud-linea.jpeg" alt="Imagen 4">
		</div>
	</div>
</div>
<script src="<?php echo BASE_URL . 'Assets/js/aside.js'; ?>"></script>

<?php include_once 'Views/template/footer.php'; ?>