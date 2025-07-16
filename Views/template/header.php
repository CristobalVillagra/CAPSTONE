<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<script>
		const base_url = '<?php echo BASE_URL; ?>';
	</script>


	<!-- Cargar jQuery desde el CDN -->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

	<!-- Cargar CSS -->
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
	<link href="<?php echo BASE_URL . 'Assets/plugins/DataTables/datatables.min.css'; ?>" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL . 'Assets/css/style.css' ?>" />
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo BASE_URL . 'Assets/img/favicon.ico'; ?>">
	<link rel="stylesheet" href="<?php echo BASE_URL . 'Assets/css/select2.min.css'; ?>">



	<title><?php echo $data['title']; ?></title>
</head>

<body>
	<header class="header">
		<img class="logo" src="Assets/img/logo-AVO1.png" alt="logo-AVO">
		<div class="container">
			<div class="logo">
			</div>
			<div class="menu">
				<nav>
					<div class="menu-mobile">
						<div class="mm-line"></div>
						<div class="mm-line"></div>
						<div class="mm-line"></div>
					</div>
					<ul>

						<li><a href="<?php echo BASE_URL . 'admin'; ?>" class="seleccionado" onclick="seleccionar(this)">MENU</a></li>
						<li class="dropdown">
							<a href="#servicios" onclick="seleccionar(this)">Servicios</a>
							<div class="dropdown-content">
								<div class="dropdown-grid">

									<a href="<?php echo BASE_URL . 'sistemas'; ?>">Sistemas y Tecnologia</a>
									<a href="<?php echo BASE_URL . 'its'; ?>">TI / ITS</a>
									<a href="<?php echo BASE_URL . 'prevencion'; ?>">Prevención de Riesgos</a>
									<a href="<?php echo BASE_URL . 'calidad'; ?>">Calidad</a>
								</div>
							</div>

						</li>
						<li class="dropdown">
							<a href="#solicitud" onclick="seleccionar(this)">Administración</a>
							<div class="dropdown-content">
								<a href="<?php echo BASE_URL . 'files'; ?>" class="submenu-trigger">Archivos</a>
								<a href="<?php echo BASE_URL . 'usuarios'; ?>">Usuarios</a>
							</div>
						</li>

						<li class="dropdown">
							<a href="#solicitud" onclick="seleccionar(this)">Solicitud</a>
							<div class="dropdown-content">
								<a href="https://app.ctrlit.cl/ctrl/portal/entrar/7324" target="_blank" rel="noopener noreferrer">Agendar Vacaciones</a>
								<a href="#opcion2">Politica de Seguridad</a>
								<a href="https://www.avo.cl/canal-de-denuncias" target="_blank" rel="noopener noreferrer">Canal Etico</a>
							</div>
						</li>
						<li><a href="#contacto" onclick="seleccionar(this)">Contacto</a></li>
						<li class="dropdown">
							<a href="#perfil" onclick="seleccionar(this)">Hola <?php echo $_SESSION['nombre']; ?>!</a>
							<div class="dropdown-content">
								<a href="#">Configuracion</a>
								<a href="<?php echo BASE_URL . 'home/logout'; ?>">Salir</a>
							</div>
						</li>
					</ul>

				</nav>
			</div>

		</div>
	</header>
	<section id="banner">
		<div class="container column">
			<div class="banner-text">
				<h1></h1>
			</div>
			<div class="banner-menu">
				<div class="banner1">
					<div class="banner-menu-title">Prevencion de Riesgos</div>
					<div class="banner-menu-text">
						<p>En AVO1 la seguridad y bienestar de todos nuestros colaboradores es una prioridad fundamental. Te invitamos a informarte y participar activamente en la seguridad!.</p>
						<a href="<?php echo BASE_URL . 'prevencion'; ?>">Ver mas</a>
					</div>
				</div>
				<div class="banner2">
					<div class="banner-menu-title">Horarios de Oficina</div>
					<div class="opening-hours">
						<span>Lunes a Jueves</span>
						<span>8:30 - 18:30</span>
					</div>
					<div class="opening-hours">
						<span>Viernes</span>
						<span>8:30 - 14:30</span>
					</div>
				</div>
			</div>
		</div>
	</section>