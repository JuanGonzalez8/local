<?php
	session_start();
	require 'conexion.php';
	
	if(!isset($_SESSION['id'])){
		header("Location: index.php");
	}
	
	// $nombres = $_SESSION['nombres'];
	
	$sql = "SELECT * FROM reclutamiento";
	$resultado = $mysqli->query($sql);
	
	
?>

<!DOCTYPE html>
<html lang="en">
    <head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<meta name="description" content="" />
		<meta name="author" content="" />
		<title>Tables - SB Admin</title>
		<link href="css/styles.css" rel="stylesheet" />
		<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
		<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
	</head>
	<body class="sb-nav-fixed">
		<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
			<a class="navbar-brand" href="principal.php"><img src="assets/img/svm_logo.png" class="logonav"alt=""> Grupo SVM</a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button
			><!-- Navbar Search-->
			<form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
				<div class="input-group">
					<input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
					<div class="input-group-append">
						<button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
					</div>
				</div>
			</form>
			<!-- Navbar-->
			<ul class="navbar-nav ml-auto ml-md-0">
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
						<a class="dropdown-item" href="index.php">Cerrar sesión</a>
					</div>
				</li>
			</ul>
		</nav>
		<div id="layoutSidenav">
			<div id="layoutSidenav_nav">
				<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
					<div class="sb-sidenav-menu">
						<div class="nav">
							<div class="sb-sidenav-menu-heading">Core</div>
							<a class="nav-link" href="principal.php"
							><div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
								Dashboard</a
							>
							<div class="sb-sidenav-menu-heading">Módulo de registros</div>
                            <a class="nav-link" href="registro_reclutamiento.php"
								><div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
								Módulo de registro</a
								>
                            <a class="nav-link" href="candidatos.php"
							><div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
							Candidatos</a
							    >
                            <div class="sb-sidenav-menu-heading">Módulo de información</div>
							<a class="nav-link" href="tabla.php"
							><div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
								Usuarios</a
								>
						</div>
					</div>
					<div class="sb-sidenav-footer">
						<div class="small">Sesión iniciada como:</div>
						Usuario
					</div>
				</nav>
			</div>
			<div id="layoutSidenav_content">
				<main>
					<div class="container-fluid"><br>
						<h1 class="mt-0">Módulo de registro</h1>
						<ol class="breadcrumb mb-4">
							<li class="breadcrumb-item"><a href="principal.php">Dashboard</a></li>
							<li class="breadcrumb-item active">Módulo de reclutamiento</li>
						</ol>
						<div class="card mb-4">
                            <div class="card">
                                <div class="card-body">
                                <form method="POST" action="guardar_informacion.php">
                                    <div class="row">
                                        <div class="col">
                                            <label for="nombres">Nombres</label>
                                            <input class="form-control inputwidth" type="text" name="nombres" required>
                                        </div>
                                        <div class="col">
                                            <label for="primer_apellido">Primer Apellido</label>
                                            <input class="form-control" type="text" name="primer_apellido" required>
                                        </div>
                                        <div class="col">
                                            <label for="segundo_apellido">Segundo Apellido</label>
                                            <input class="form-control" type="text" name="segundo_apellido" required>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col">
                                            <label for="telefono">Teléfono</label>
                                            <input class="form-control" type="text" name="telefono" required>
                                        </div>
                                        <div class="col">
                                            <label for="edad">Edad</label>
                                             <input class="form-control" type="text" name="edad" required>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="moto">¿Cuenta con moto?</label>
                                                    <select name="moto" id="moto" class="form-control" required>
                                                        <option selected disabled>Elige una opción</option>
                                                        <option value="Sí">Sí</option>
                                                        <option value="No">No</option>
                                                    </select>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <label for="ultimo_empleo">Último Empleo</label>
                                            <input class="form-control" type="text" name="ultimo_empleo" required>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-2">
                                            <label for="antiguedad">Antigüedad</label>
                                            <input class="form-control" type="text" name="antiguedad" required>
                                        </div>
                                        <div class="col">
                                            <label for="motivo_salida">Motivo de Salida</label>
                                            <input class="form-control" type="text" name="motivo_salida" required>
                                        </div>
                                        <div class="col">
                                            <label for="puesto_aplicado">Puesto Aplicado</label>
                                            <input class="form-control" type="text" name="puesto_aplicado" required>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col">
                                            <label for="comentarios">Comentarios</label>
                                            <textarea class="form-control texta" name="comentarios" required rows="5"></textarea>
                                        </div>
                                        <div class="col">
                                        <div class="form-group">
                                            <label for="estats">Estatus</label>
                                                <select name="estats" id="estats" class="form-control" required>
                                                    <option selected disabled>Elige una opción</option>
                                                    <option value="Aprobado">Aprobado</option>
                                                    <option value="Denegado">Denegado</option>
                                                    <option value="Pendiente">Pendiente</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div id="liveAlertPlaceholder"></div>
                                    <input type="submit" value="Guardar" class="btn btn-primary col-2 submitbutton" id="liveAlertBtn">
                                </form>
                                </div>
                            </div>
						</div>
					</div>
					</main>
					<footer class="py-4 bg-light mt-auto">
						<div class="container-fluid">
						<div class="d-flex align-items-center justify-content-between small">
					<div class="text-muted">Copyright &copy; Your Website 2019</div>
					<div>
						<a href="#">Privacy Policy</a>
						&middot;
						<a href="#">Terms &amp; Conditions</a>
					</div>
					</div>
					</div>
				</footer>
			</div>
		</div>
		<script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
		<script src="js/scripts.js"></script>
		<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
		<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
		<script src="assets/demo/datatables-demo.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	</body>
</html>
