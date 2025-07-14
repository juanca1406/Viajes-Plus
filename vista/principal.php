<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit;
}
$id_cliente = $_SESSION['id'];
?>
<?php
include '../conexion/conexion.php';

$sql = "SELECT 
            r.id, 
            r.fecha_reserva,
            r.fecha_salida,
            r.total,
            a.nombre AS alojamiento,
            a.zona,
            a.servicio,
            a.img,
            t.transporte,
            t.costo_transporte,
            tr.nombre AS nombre_tour,
            tr.descripcion AS descripcion_tour
        FROM reserva r
        LEFT JOIN alojamiento a ON r.id_alojamiento = a.id
        LEFT JOIN transporte t ON r.id_transporte = t.id
        LEFT JOIN tour tr ON r.id_tour = tr.id
        WHERE r.id_cliente = '$id_cliente'
        ORDER BY r.id DESC
        LIMIT 1";



$resultado = mysqli_query($conexion, $sql);
$reserva = mysqli_fetch_assoc($resultado);

mysqli_close($conexion);
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Viajes Plus</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
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
                            <small class="">Premium</small>
                        </div>
                    </div>
                </div>

                <!-- ...resto del código... -->
                <ul class="nav flex-column mb-auto p-3">
                    <li class="nav-item mb-2">
                        <a href="#" class="nav-link active bg-primary text-white rounded">
                            <i class="fas fa-home me-2"></i>
                            Dashboard
                        </a>
                    </li>
                </ul>
                <div class="p-3 border-top border-secondary">
                    <a href="./login.php" class="d-flex align-items-center text-secondary text-decoration-none">
                        <i class="fas fa-sign-out-alt me-2"></i>
                        Cerrar sesión
                    </a>
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">

                <!-- Welcome Section -->
                <div class="row mb-4">
                    <div class="col-md-8">
                        <h2 class="fw-bold">¡Bienvenido de nuevo, Carlos!</h2>
                        <p class="text-muted">Explora tus próximos viajes y descubre nuevas aventuras.</p>
                    </div>
                </div>
                <button id="toggleMode" class="btn btn-outline-dark m-2">
                    <i id="modeIcon" class="fas fa-moon"></i>
                </button>

                <!-- Stats Cards -->
                <div class="row g-4 mb-4">
                    <div class="col-md-6 col-lg-3">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="bg-primary bg-opacity-10 p-3 rounded me-3">
                                        <i class="fas fa-suitcase text-primary fs-4"></i>
                                    </div>
                                    <div>
                                        <p class="text-muted mb-0">Viajes Activos</p>
                                        <h3 class="fw-bold mb-0">2</h3>
                                    </div>
                                </div>
                                <p class="small text-muted mb-0">Próximo: <span class="text-dark fw-medium">París, 15
                                        Mayo</span></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="bg-success bg-opacity-10 p-3 rounded me-3">
                                        <i class="fas fa-star text-success fs-4"></i>
                                    </div>
                                    <div>
                                        <p class="text-muted mb-0">Puntos</p>
                                        <h3 class="fw-bold mb-0">2,540</h3>
                                    </div>
                                </div>
                                <p class="small text-muted mb-0">Aumentaste: <span class="text-success fw-medium">+340
                                        este mes</span></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="bg-warning bg-opacity-10 p-3 rounded me-3">
                                        <i class="fas fa-bookmark text-warning fs-4"></i>
                                    </div>
                                    <div>
                                        <p class="text-muted mb-0">Favoritos</p>
                                        <h3 class="fw-bold mb-0">7</h3>
                                    </div>
                                </div>
                                <p class="small text-muted mb-0">Nuevos: <span class="text-dark fw-medium">3 esta
                                        semana</span></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="bg-danger bg-opacity-10 p-3 rounded me-3">
                                        <i class="fas fa-tags text-danger fs-4"></i>
                                    </div>
                                    <div>
                                        <p class="text-muted mb-0">Ofertas</p>
                                        <h3 class="fw-bold mb-0">12</h3>
                                    </div>
                                </div>
                                <p class="small text-muted mb-0">Expiran: <span class="text-danger fw-medium">4 en 3
                                        días</span></p>
                            </div>
                        </div>
                    </div>
                </div>

                <?php if (isset($_GET['registro']) && $_GET['registro'] === 'registrar'): ?>
                    <div class="d-flex justify-content-center mt-4">
                        <div class="alert alert-success alert-dismissible fade show text-center shadow" role="alert"
                            style="max-width: 500px; width: 100%;">
                            ¡Viaje reservado!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
                        </div>
                    </div>
                    <script>
                        // Eliminar el parámetro 'registro' de la URL
                        if (window.history.replaceState) {
                            const url = new URL(window.location.href);
                            url.searchParams.delete('registro');
                            window.history.replaceState({}, document.title, url.toString());
                        }

                        // Ocultar el mensaje automáticamente después de 10 segundos
                        setTimeout(() => {
                            const alerta = document.querySelector('.alert');
                            if (alerta) {
                                alerta.classList.remove('show');
                                alerta.classList.add('fade');
                                alerta.style.display = 'none';
                            }
                        }, 10000); // 10 segundos
                    </script>
                <?php endif; ?>
                <?php if (isset($_GET['registro']) && $_GET['registro'] === 'eliminado'): ?>
                    <div class="d-flex justify-content-center mt-4">
                        <div class="alert alert-danger alert-dismissible fade show text-center shadow" role="alert"
                            style="max-width: 500px; width: 100%;">
                            ¡Reserva eliminado exitosamente!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
                        </div>
                    </div>
                    <script>
                        if (window.history.replaceState) {
                            const url = new URL(window.location.href);
                            url.searchParams.delete('registro');
                            window.history.replaceState({}, document.title, url.toString());
                        }
                        setTimeout(() => {
                            const alerta = document.querySelector('.alert');
                            if (alerta) {
                                alerta.classList.remove('show');
                                alerta.classList.add('fade');
                                alerta.style.display = 'none';
                            }
                        }, 10000);
                    </script>
                <?php endif; ?>
                <!-- Next Trip -->
                <?php if ($reserva): ?>
                    <div class="card border-0 shadow-sm mb-4 bg-primary bg-opacity-10">
                        <div class="card-body p-4">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <h4 class="fw-bold text-primary mb-1">Próximo Viaje</h4>
                                    <h3 class="fw-bold mb-2"><?php echo $reserva['zona']; ?></h3>
                                    <p class="mb-3"><i
                                            class="far fa-calendar-alt me-2"></i><?php echo date('d', strtotime($reserva['fecha_reserva'])); ?>
                                        - <?php echo date('d M, Y', strtotime($reserva['fecha_salida'])); ?>
                                    </p>
                                    <div class="d-flex align-items-center mb-3">
                                        <span class="badge bg-success me-2">Confirmado</span>
                                    </div>
                                    <!-- Botón para abrir el modal -->
                                    <button type="button" class="btn btn-danger btn-sm"
                                        onclick="abrirModalEliminar(<?php echo $reserva['id']; ?>)">
                                        Cancelar Reserva
                                    </button>
                                </div>
                                <div class="col-md-6 mt-4 mt-md-0">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="card border-0 shadow-sm mb-3">
                                                <div class="card-body p-3">
                                                    <div class="d-flex align-items-center">
                                                        <i class="fas fa-plane-departure text-primary me-3 fs-4"></i>
                                                        <div>
                                                            <small class="text-muted d-block">Vuelo Ida</small>
                                                            <p class="mb-0 fw-medium">
                                                                <?php echo date('d M, h:m', strtotime($reserva['fecha_reserva'])); ?>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="card border-0 shadow-sm mb-3">
                                                <div class="card-body p-3">
                                                    <div class="d-flex align-items-center">
                                                        <i class="fas fa-plane-arrival text-primary me-3 fs-4"></i>
                                                        <div>
                                                            <small class="text-muted d-block">Vuelo Vuelta</small>
                                                            <p class="mb-0 fw-medium">
                                                                <?php echo date('d M, h:m', strtotime($reserva['fecha_salida'])); ?>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="card border-0 shadow-sm">
                                                <div class="card-body p-3">
                                                    <div class="d-flex align-items-center">
                                                        <i class="fas fa-hotel text-primary me-3 fs-4"></i>
                                                        <div>
                                                            <small class="text-muted d-block">Hotel</small>
                                                            <p class="mb-0 fw-medium"><?php echo $reserva['alojamiento']; ?>
                                                            </p>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="card border-0 shadow-sm">
                                                <div class="card-body p-3">
                                                    <div class="d-flex align-items-center">
                                                        <i class="fas fa-utensils text-primary me-3 fs-4"></i>
                                                        <div>
                                                            <small class="text-muted d-block">Comidas</small>
                                                            <p class="mb-0 fw-medium">Desayuno incluido</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="alert alert-warning">No tienes reservas registradas aún.</div>
                <?php endif; ?>
                <!-- Popular Destinations -->
                <div class="mb-4">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h3 class="fw-bold">Destinos Populares</h3>
                        <a href="{{ url_for('show_categories') }}" class="btn btn-sm btn-outline-primary">Ver todos</a>
                    </div>

                    <div class="row g-4">
                        <div class="col-md-4">
                            <div class="card border-0 shadow-sm">
                                <div class="trip-image-placeholder">
                                    <img src="../img/cancun.jpg" alt="Cancún" class="img-fluid rounded-top w-100"
                                        style="height: 200px; object-fit: cover;">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title fw-bold">Cancún, México</h5>
                                    <p class="card-text text-muted">Playas paradisíacas y resort all-inclusive.</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="fw-bold text-primary">€1,250</span>
                                        <a href="../modelo/modelo.php?opcion=3"
                                            class="btn btn-sm btn-primary">Reservar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card border-0 shadow-sm">
                                <div class="trip-image-placeholder cultural-rome">
                                    <img src="../img/Guadalajara.webp" alt="Cancún" class="img-fluid rounded-top w-100"
                                        style="height: 200px; object-fit: cover;">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title fw-bold">Guadalajara, México</h5>
                                    <p class="card-text text-muted">Historia, cultura y gastronomía italiana.</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="fw-bold text-primary">€1,100</span>
                                        <a href="../modelo/modelo.php?opcion=3"
                                            class="btn btn-sm btn-primary">Reservar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card border-0 shadow-sm">
                                <div class="trip-image-placeholder adventure-iceland">
                                    <img src="../img/PlayadelCarme.jpg" alt="Cancún" class="img-fluid rounded-top w-100"
                                        style="height: 200px; object-fit: cover;">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title fw-bold">Playa del carmen</h5>
                                    <p class="card-text text-muted">Auroras boreales y paisajes volcánicos.</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="fw-bold text-primary">€1,500</span>
                                        <a href="../modelo/modelo.php?opcion=3"
                                            class="btn btn-sm btn-primary">Reservar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Travel Tips -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body p-4">
                        <h4 class="fw-bold mb-3">Consejos de Viaje</h4>
                        <div class="row g-3">
                            <div class="col-md-4">
                                <div class="d-flex align-items-start">
                                    <div class="bg-info bg-opacity-10 p-3 rounded me-3">
                                        <i class="fas fa-passport text-info fs-4"></i>
                                    </div>
                                    <div>
                                        <h5 class="fw-bold mb-1">Documentación</h5>
                                        <p class="small text-muted">Verifica siempre la validez de tu pasaporte y los
                                            requisitos de visa.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="d-flex align-items-start">
                                    <div class="bg-warning bg-opacity-10 p-3 rounded me-3">
                                        <i class="fas fa-money-bill-wave text-warning fs-4"></i>
                                    </div>
                                    <div>
                                        <h5 class="fw-bold mb-1">Moneda Local</h5>
                                        <p class="small text-muted">Lleva siempre algo de efectivo en la moneda local de
                                            tu destino.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="d-flex align-items-start">
                                    <div class="bg-success bg-opacity-10 p-3 rounded me-3">
                                        <i class="fas fa-medkit text-success fs-4"></i>
                                    </div>
                                    <div>
                                        <h5 class="fw-bold mb-1">Seguro de Viaje</h5>
                                        <p class="small text-muted">No olvides contratar un buen seguro que cubra
                                            emergencias médicas.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Eliminar Reserva -->
                <div class="modal fade" id="modalEliminar" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <form id="formEliminar" method="post" action="../modelo/modelo.php?opcion=35">
                            <input type="hidden" name="id" id="idEliminar">
                            <div class="modal-content rounded-4">
                                <div class="modal-header bg-danger text-white">
                                    <h5 class="modal-title">Confirmar Eliminación</h5>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                        aria-label="Cerrar"></button>
                                </div>
                                <div class="modal-body text-center">
                                    <p>¿Estás seguro de que deseas eliminar esta reserva?</p>
                                </div>
                                <div class="modal-footer justify-content-center">
                                    <button type="button" class="btn btn-secondary rounded-pill"
                                        data-bs-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-danger rounded-pill"><i
                                            class="fas fa-trash-alt me-1"></i>Eliminar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Footer -->
                <footer class="pt-4 pb-2 mt-5 border-top text-center">
                    <p class="text-muted small">© 2023 TravelWorld. Todos los derechos reservados.</p>
                </footer>
            </main>
        </div>
    </div>

    <script>
        function abrirModalEliminar(idReserva) {
            document.getElementById('idEliminar').value = idReserva;
            const modal = new bootstrap.Modal(document.getElementById('modalEliminar'));
            modal.show();
        }
    </script>

    <script>
        let timerDuration = 1 * 60; // 1 minuto en segundos
        let timerDisplay = document.getElementById('session-timer');

        function updateTimer() {
            let minutes = Math.floor(timerDuration / 60);
            let seconds = timerDuration % 60;
            timerDisplay.textContent =
                ${ minutes.toString().padStart(2, '0') }:${ seconds.toString().padStart(2, '0') };
            if (timerDuration > 0) {
                timerDuration--;
            } else {
                clearInterval(timerInterval);
                window.location.href = './login.php';
            }
        }

        updateTimer();
        let timerInterval = setInterval(updateTimer, 1000);

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

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // JavaScript básico para inicializar componentes
        document.addEventListener('DOMContentLoaded', function () {
            // Inicializar sidebar para móviles
            var sidebar = document.getElementById('sidebar');

            // Expandir/colapsar sidebar en pantallas pequeñas
            if (window.innerWidth < 768) {
                sidebar.classList.remove('show');
            } else {
                sidebar.classList.add('show');
            }

            // Mantener la barra lateral visible en pantallas grandes
            window.addEventListener('resize', function () {
                if (window.innerWidth >= 768) {
                    sidebar.classList.add('show');
                }
            });
        });
    </script>
</body>

</html>