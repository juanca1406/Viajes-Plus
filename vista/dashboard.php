<!DOCTYPE html>
<html lang="es" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administrador - ViajesPlus</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
</head>

<body>
    <div class="d-flex flex-column flex-lg-row min-vh-100">
        <!-- Sidebar Moderno -->
        <nav class="sidebar bg-dark bg-gradient shadow-lg text-white p-3">
            <div class="d-flex align-items-center mb-4">
                <svg class="logo" viewBox="0 0 100 100" width="40" height="40">
                    <path d="M50,15 L85,45 L65,85 H35 L15,45 Z" fill="#0d6efd" />
                    <path d="M40,35 L60,35 L55,60 H45 Z" fill="#ffffff" />
                </svg>
                <span class="ms-2 fw-bold fs-5 d-none d-lg-inline">ViajesPlus</span>
                <button class="btn btn-link text-white ms-auto d-lg-none" id="sidebarToggle">
                    <i class="fas fa-bars fs-4"></i>
                </button>
            </div>
            <ul class="nav flex-column gap-1">
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center rounded-pill px-3 py-2 text-white bg-secondary bg-opacity-75 active"
                        href="./dashboard.php">
                        <i class="fas fa-chart-line me-2"></i>
                        <span class="d-none d-lg-inline">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center rounded-pill px-3 py-2 text-white"
                        href="../modelo/modelo.php?opcion=9">
                        <i class="fas fa-users me-2"></i>
                        <span class="d-none d-lg-inline">Clientes</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center rounded-pill px-3 py-2 text-white"
                        href="../modelo/modelo.php?opcion=23">
                        <i class="fas fa-calendar-check me-2"></i>
                        <span class="d-none d-lg-inline">Reservas</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center rounded-pill px-3 py-2 text-white"
                        href="../modelo/modelo.php?opcion=6">
                        <i class="fas fa-hotel me-2"></i>
                        <span class="d-none d-lg-inline">Alojamientos</span>
                    </a>
                </li>
                <li class="nav-item mt-3">
                    <a class="nav-link d-flex align-items-center rounded-pill px-3 py-2 text-danger"
                        href="../index.php">
                        <i class="fas fa-sign-out-alt me-2"></i>
                        <span class="d-none d-lg-inline">Cerrar sesión</span>
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Main Content -->
        <div class="content-wrapper flex-grow-1 overflow-auto d-flex flex-column">
            <!-- Top Navbar -->
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm sticky-top">
                <div class="container-fluid">
                    <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse"
                        data-bs-target="#topNavbar">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="topNavbar">
                        <ol class="breadcrumb my-2 ms-3">
                            <li class="breadcrumb-item active text-white">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </nav>

            <!-- Main Content Area -->
            <div class="container-fluid py-4 flex-grow-1">
                <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
                    <div>
                        <h2 class="fw-bold mb-1">Bienvenido, Carlos</h2>
                        <p class="text-muted mb-0">Panel de control de administrador</p>
                    </div>
                </div>
                <div class="row g-4">
                    <div class="col-md-6 col-xl-3">
                        <div class="card shadow-sm border-0 rounded-4 h-100">
                            <div class="card-body d-flex align-items-center">
                                <div class="me-3 d-flex align-items-center justify-content-center rounded-circle bg-primary bg-opacity-10"
                                    style="width:56px; height:56px;">
                                    <i class="fas fa-suitcase text-primary fs-3"></i>
                                </div>
                                <div>
                                    <div class="text-secondary small mb-1">Viajes Activos</div>
                                    <h5 class="fw-bold mb-0">2</h5>
                                    <small class="text-muted">Próximo: París, 15 Mayo</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3">
                        <div class="card shadow-sm border-0 rounded-4 h-100">
                            <div class="card-body d-flex align-items-center">
                                <div class="me-3 d-flex align-items-center justify-content-center rounded-circle bg-success bg-opacity-10"
                                    style="width:56px; height:56px;">
                                    <i class="fas fa-star text-success fs-3"></i>
                                </div>
                                <div>
                                    <div class="text-secondary small mb-1">Puntos</div>
                                    <h5 class="fw-bold mb-0">2,540</h5>
                                    <small class="text-success">+340 este mes</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3">
                        <div class="card shadow-sm border-0 rounded-4 h-100">
                            <div class="card-body d-flex align-items-center">
                                <div class="me-3 d-flex align-items-center justify-content-center rounded-circle bg-warning bg-opacity-10"
                                    style="width:56px; height:56px;">
                                    <i class="fas fa-bookmark text-warning fs-3"></i>
                                </div>
                                <div>
                                    <div class="text-secondary small mb-1">Favoritos</div>
                                    <h5 class="fw-bold mb-0">7</h5>
                                    <small class="text-muted">3 esta semana</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3">
                        <div class="card shadow-sm border-0 rounded-4 h-100">
                            <div class="card-body d-flex align-items-center">
                                <div class="me-3 d-flex align-items-center justify-content-center rounded-circle bg-danger bg-opacity-10"
                                    style="width:56px; height:56px;">
                                    <i class="fas fa-tags text-danger fs-3"></i>
                                </div>
                                <div>
                                    <div class="text-secondary small mb-1">Ofertas</div>
                                    <h5 class="fw-bold mb-0">12</h5>
                                    <small class="text-danger">4 expiran en 3 días</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <footer class="footer mt-auto py-3 bg-dark text-white-50 shadow-sm">
                <div class="container-fluid text-center">
                    <span>© 2025 ViajesPlus. Todos los derechos reservados.</span>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>