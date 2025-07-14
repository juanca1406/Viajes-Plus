<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Viajes Plus - Alojamientos</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/global.css">

</head>

<body class="bg-light">
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-dark text-white collapse"
                style="height: 100vh; position: sticky; top: 0;">
                <div class="pt-4 pb-3 px-3 text-center">
                    <i class="fas fa-paper-plane fs-1 text-primary mb-2"></i>
                    <h5 class="fw-bold">Viajes Plus</h5>
                    <p class="small">Panel de usuario</p>
                </div>
                <div class="p-3 border-top border-secondary">
                    <div class="d-flex align-items-center mb-3">
                        <img src="https://randomuser.me/api/portraits/men/32.jpg" class="rounded-circle me-2" width="40"
                            height="40" alt="Profile">
                        <div>
                            <p class="mb-0 fw-bold">Carlos Rodríguez</p>
                            <small>Premium</small>
                        </div>
                    </div>
                </div>
                <ul class="nav flex-column mb-auto p-3">
                    <li class="nav-item mb-2">
                        <a href="../vista/principal.php" class="nav-link text-secondary rounded">
                            <i class="fas fa-home me-2"></i>
                            Dashboard
                        </a>
                    </li>

                </ul>
                <div class="p-3 border-top border-secondary">
                    <a href="../../login.php" class="d-flex align-items-center text-secondary text-decoration-none">
                        <i class="fas fa-sign-out-alt me-2"></i>
                        Cerrar sesión
                    </a>
                </div>
            </nav>

            <!-- Main Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
                <!-- Header y filtros -->
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-4 border-bottom">
                    <h1 class="h2 fw-bold">Alojamientos Disponibles</h1>
                </div>
                <br>


                <!-- Alojamientos Cards (versión PHP) -->
                <div class="row g-4">
                    <div class="container">
                        <div class="row">
                            <?php foreach ($arreglo as $alojamiento) { ?>
                                <div class="col-md-6 col-lg-4 mb-4">
                                    <div class="card border-0 shadow-sm h-100 position-relative">
                                        <div class="position-relative">
                                            <img src="<?php echo $alojamiento->img; ?>" alt="Hotel Paraíso"
                                                class="img-fluid rounded-top w-100"
                                                style="height: 200px; object-fit: cover;">
                                        </div>
                                        <div class="card-body d-flex flex-column">
                                            <div class="d-flex justify-content-between align-items-start">
                                                <h5 class="card-title fw-bold mb-1">
                                                    <?php echo $alojamiento->nombre; ?>
                                                </h5>
                                                <span class="badge bg-info">Hotel</span>
                                            </div>
                                            <p class="card-text text-muted mb-2">
                                                <i class="fas fa-map-marker-alt me-1"></i>
                                                <?php echo $alojamiento->zona; ?>
                                            </p>
                                            <div class="text-warning fs-5 mb-2">
                                                <?php
                                                $calificacion = $alojamiento->calificacion;
                                                $llenas = floor($calificacion);
                                                $media = ($calificacion - $llenas) >= 0.5;
                                                $vacias = 5 - $llenas - ($media ? 1 : 0);

                                                for ($i = 0; $i < $llenas; $i++)
                                                    echo '<i class="bi bi-star-fill"></i>';
                                                if ($media)
                                                    echo '<i class="bi bi-star-half"></i>';
                                                for ($i = 0; $i < $vacias; $i++)
                                                    echo '<i class="bi bi-star"></i>';
                                                ?>
                                                (<?php echo $alojamiento->calificacion ?>)
                                            </div>
                                            <p class="text-muted mb-3">
                                                <?php echo $alojamiento->servicio; ?>
                                            </p>
                                            <div class="d-flex justify-content-between align-items-center mt-auto">
                                                <div>

                                                    <span class="fs-4 fw-bold text-primary">$
                                                        <?php echo $alojamiento->costo_noche; ?>
                                                    </span>
                                                    <span class="text-muted">/noche</span>
                                                </div>
                                                <a href="../../viajesplus/modelo/modelo.php?opcion=4&id=<?php echo $alojamiento->id; ?>"
                                                    class="btn btn-primary">Reservar</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>


                    <!-- Paginación -->
                    <nav aria-label="Page navigation example" class="mt-4 d-flex justify-content-center">
                        <ul class="pagination">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                                    <i class="fas fa-chevron-left"></i>
                                </a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">
                                    <i class="fas fa-chevron-right"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>
            </main>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const toggleButton = document.getElementById("toggleMode");
        const modeIcon = document.getElementById("modeIcon");

        // Verifica el estado guardado
        const savedMode = localStorage.getItem("darkMode") === "true";

        // Función para aplicar el modo
        function applyMode(isDark) {
            document.body.classList.toggle("dark-mode", isDark);
            modeIcon.className = isDark ? "fas fa-sun" : "fas fa-moon";
        }

        // Aplica el estado guardado al cargar
        applyMode(savedMode);

        // Cambia al hacer clic
        toggleButton.addEventListener("click", () => {
            const isDark = !document.body.classList.contains("dark-mode");
            localStorage.setItem("darkMode", isDark);
            applyMode(isDark);
        });
    });
</script>

</html>