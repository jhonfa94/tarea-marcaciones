<?php
$rutaActiveClass = isset($_GET['ruta']) ? $_GET['ruta'] : '';
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container">
        <a class="navbar-brand" href="">
            <img src="https://img2.freepng.es/20180403/hlq/kisspng-computer-icons-laborer-construction-worker-industrial-worker-5ac4152a02a430.4379636115227999140108.jpg" alt="..." height="36">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link  <?= $rutaActiveClass == 'dashboard' ? 'active' : '' ?>" aria-current="page" href="index.php?ruta=dashboard">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  <?= $rutaActiveClass == 'empleados' ? 'active' : '' ?>" aria-current="page" href="index.php?ruta=empleados">Empleados</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $rutaActiveClass == 'usuarios' ? 'active' : '' ?>" href="index.php?ruta=usuarios">Usuarios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $rutaActiveClass == 'marcaciones' ? 'active' : '' ?>" href="index.php?ruta=marcaciones">Marcaciones</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?= $_SESSION['nombre']; ?>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="index.php?ruta=salir">Salir del sistema</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>