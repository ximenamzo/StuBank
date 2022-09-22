<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="/index.php">
            <img src="/src/StuBank.png" width="100pc">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/index.php">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/view/info.php">Información</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/view/nosotros.php">Sobre nosotros</a>
                </li>
                <?php if($rol == 1):?>
                    <!-- Opciones del admin -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-gear"></i> Hola, <?php echo $nombre;?>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="../admin/admin.php">Administración</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="../view/logout.php">Cerrar sesion</a></li>
                        </ul>
                    </li>
                <?php elseif($rol == 2):?>
                    <!-- Opciones del ejecutivo -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-bank"></i> Hola, <?php echo $nombre;?>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="../ejecutivo/ejecutivo.php">Clientes y movimientos</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="../view/logout.php">Cerrar sesion</a></li>
                        </ul>
                    </li>
                <?php elseif($rol == 3):?>
                    <!-- Opciones del cliente -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-coin"></i> Hola, <?php echo $nombre;?>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Administrar cuenta</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="../view/logout.php">Cerrar sesion</a></li>
                        </ul>
                    </li>
                <?php else: ?>
                    <!-- Opciones del visitante -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="../view/decision.php">Iniciar sesion</a></li>
                            <li><a class="dropdown-item" href="../view/decision_re.php">Registrarse</a></li>
                        </ul>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>