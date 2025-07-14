<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TravelWorld - Reservar Viaje</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
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
                    <h5 class="fw-bold">ViajesPlus</h5>
                    <p class="small">Panel de usuario</p>
                </div>
                <div class="p-3 border-top border-secondary">
                    <div class="d-flex align-items-center mb-3">
                        <img src="https://randomuser.me/api/portraits/men/32.jpg" class="rounded-circle me-2" width="40"
                            height="40" alt="Profile">
                        <div>
                            <p class="mb-0 fw-bold">Carlos Rodríguez</p>
                            <small class="text-muted">Premium</small>
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
                    <a href="../../viajesplus/vista/login.php"
                        class="d-flex align-items-center text-secondary text-decoration-none">
                        <i class="fas fa-sign-out-alt me-2"></i>
                        Cerrar sesión
                    </a>
                </div>
            </nav>

            <!-- Main Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
                <?php
                $alojamiento = $arreglo[0];
                ?>
                <div class="row mb-2">
                    <div class="col-12">
                        <h2 class="fw-bold">Reservar Viaje</h2>
                        <p class="text-muted">Complete los detalles para reservar su viaje a
                            <strong>
                                <?php echo $alojamiento->zona; ?>
                            </strong>.
                        </p>
                    </div>
                </div>
                <form action="../modelo/modelo.php?opcion=24" method="POST">
                    <div class="row">
                        <!-- Detalles del viaje -->
                        <div class="col-md-4 mb-4">
                            <div class="card border-0 shadow-lg h-100">
                                <div class="card-header bg-gradient text-white bg-primary">
                                    <h5 class="mb-0 text-center text-uppercase">
                                        <?php echo $alojamiento->zona; ?>
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <!-- Información del alojamiento -->
                                    <div class="mb-3">
                                        <p><i class="fas fa-star text-warning me-2"></i><strong>Categoría:</strong>
                                            <?php echo $alojamiento->categoria; ?>
                                        </p>
                                        <p><i class="far fa-calendar-alt text-info me-2"></i><strong>Duración:</strong>
                                            7
                                            días</p>
                                        <p class="mb-0 d-flex align-items-center">
                                            <i class="fas fa-dollar-sign text-success me-2"></i>
                                            <strong>Precio:</strong>
                                            <span class="ms-2 me-4 text-primary fw-bold">$60.000</span><small
                                                class="text-muted me-3">/adulto</small>
                                            <i class="fas fa-child text-warning me-2"></i>
                                            <strong>Niño:</strong>
                                            <span class="ms-2 text-primary fw-bold">$50.000</span><small
                                                class="text-muted">/niño</small>
                                        </p>
                                    </div>

                                    <!-- Incluye -->
                                    <hr>
                                    <h6 class="fw-bold mb-2">Incluye:</h6>
                                    <ul class="list-unstyled ps-3">
                                        <li><i class="fas fa-check-circle text-success me-2"></i>Vuelos ida y vuelta
                                        </li>
                                        <li><i class="fas fa-check-circle text-success me-2"></i>Alojamiento
                                            seleccionado
                                        </li>
                                        <li><i class="fas fa-check-circle text-success me-2"></i>Traslados
                                            aeropuerto-hotel
                                        </li>
                                        <li><i class="fas fa-check-circle text-success me-2"></i>Seguro de viaje básico
                                        </li>
                                    </ul>

                                    <hr>
                                    <h6 class="fw-bold mb-2 d-flex justify-content-between align-items-center">
                                        Actividades disponibles:
                                        <button type="button" class="btn btn-sm btn-outline-danger"
                                            onclick="limpiarActividades()">
                                            Quitar selección
                                        </button>
                                    </h6>

                                    <?php foreach ($arreglo2 as $actividad): ?>
                                        <?php if ($actividad->disponibilidad === 'Disponible'): ?>
                                            <div class="form-check mb-1">
                                                <input class="form-check-input" type="radio" name="id_actividad"
                                                    value="<?php echo $actividad->id; ?>"
                                                    id="actividad_<?php echo $actividad->id; ?>"
                                                    data-costo="<?php echo floatval($actividad->costo); ?>">
                                                <label class="form-check-label small ms-1"
                                                    for="actividad_<?php echo $actividad->id; ?>">
                                                    <strong><?php echo $actividad->nombre; ?></strong> –
                                                    $<?php echo number_format($actividad->costo, 0, ',', '.'); ?><br>
                                                    <span class="text-muted"><?php echo $actividad->descripcion; ?></span>
                                                </label>
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; ?>

                                    <hr>
                                    <h6 class="fw-bold mb-2 d-flex justify-content-between align-items-center">
                                        Opcionesde transporte:
                                        <button type="button" class="btn btn-sm btn-outline-danger"
                                            onclick="limpiarTransporte()">
                                            Quitar selección
                                        </button>
                                    </h6>
                                    <?php foreach ($arreglo3 as $index => $transporte): ?>
                                        <div class="form-check mb-1">
                                            <input class="form-check-input" type="radio" name="id_transporte"
                                                id="transporte_<?php echo $index; ?>" value="<?php echo $transporte->id; ?>"
                                                data-costo="<?php echo $transporte->costo_transporte; ?>" <?php echo $index === 0 ? 'required' : ''; ?>>
                                            <label class="form-check-label" for="transporte_<?php echo $index; ?>">
                                                <strong>
                                                    <?php echo $transporte->transporte; ?>
                                                </strong> -
                                                $<?php echo number_format($transporte->costo_transporte, 0, ',', '.'); ?><br>
                                            </label>
                                        </div>
                                    <?php endforeach; ?>

                                    <hr>
                                    <h6 class="fw-bold mb-2 d-flex justify-content-between align-items-center">
                                        Toursdisponibles:
                                        <button type="button" class="btn btn-sm btn-outline-danger"
                                            onclick="limpiaTour()">
                                            Quitar selección
                                        </button>
                                    </h6>
                                    <!-- Tours -->
                                    <?php foreach ($arregl4 as $tour): ?>
                                        <div class="form-check mb-1">
                                            <input class="form-check-input" type="radio" name="id_tour"
                                                value="<?php echo $tour->id; ?>" id="tour_<?php echo $tour->id; ?>"
                                                data-costo="<?php echo $tour->costo; ?>">

                                            <label class="form-check-label" for="tour_<?php echo $tour->id; ?>">
                                                <strong>
                                                    <?php echo $tour->nombre; ?>
                                                </strong> -
                                                $<?php echo number_format($tour->costo, 0, ',', '.'); ?><br>
                                                <span class="text-muted">
                                                    <?php echo $tour->descripcion; ?>
                                                </span>
                                            </label>
                                        </div>
                                    <?php endforeach; ?>

                                </div>
                            </div>
                        </div>

                        <!-- Formulario de reserva -->
                        <div class="col-md-8 mb-4">
                            <div class="card border-0 shadow-sm">
                                <div class="card-header bg-light">
                                    <h5 class="mb-0">Información de Reserva</h5>
                                </div>
                                <div class="card-body">
                                    <input type="hidden" name="id_cliente" value="<?php echo $_SESSION['id']; ?>">
                                    <input type="hidden" name="id_alojamiento" value="<?php echo $alojamiento->id; ?>">
                                    <input type="hidden" name="total" id="input_total">

                                    <h6 class="fw-bold mb-4"><i
                                            class="fas fa-suitcase-rolling me-2 text-primary"></i>Detalles del Viaje
                                    </h6>
                                    <div class="row g-3 mb-4">
                                        <div class="col-md-6">
                                            <label for="start_date" class="form-label"><i
                                                    class="fas fa-user me-2 text-secondary"></i>Nombre</label>
                                            <input type="text" class="form-control shadow-sm" id="start_date"
                                                name="start_date" required value="<?php echo $_SESSION["nombre"]; ?>"
                                                readonly>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="start_date" class="form-label"><i
                                                    class="fas fa-user me-2 text-secondary"></i>Apellido</label>
                                            <input type="text" class="form-control shadow-sm" id="start_date"
                                                name="start_date" required value="<?php echo $_SESSION["apellido"]; ?>"
                                                readonly>
                                        </div>
                                    </div>
                                    <div class="row g-3 mb-4">
                                        <div class="col-md-6">
                                            <label for="start_date" class="form-label"><i
                                                    class="far fa-calendar-alt me-2 text-secondary"></i>Fecha de
                                                Inicio</label>
                                            <input type="date" class="form-control shadow-sm" id="fecha_reserva"
                                                name="fecha_reserva" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="end_date" class="form-label"><i
                                                    class="far fa-calendar-alt me-2 text-secondary"></i>Fecha de
                                                Fin</label>
                                            <input type="date" class="form-control shadow-sm" id="fecha_salida"
                                                name="fecha_salida" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="adults" class="form-label"><i
                                                    class="fas fa-user me-2 text-secondary"></i>Adultos</label>
                                            <select class="form-select shadow-sm" id="adults" name="adults" required>
                                                <option value="1" selected>1 adulto</option>
                                                <option value="2">2 adultos</option>
                                                <option value="3">3 adultos</option>
                                                <option value="4">4 adultos</option>
                                                <option value="5">5 adultos</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="children" class="form-label"><i
                                                    class="fas fa-child me-2 text-secondary"></i>Niños (0-12
                                                años)</label>
                                            <select class="form-select shadow-sm" id="children" name="children">
                                                <option value="0" selected>0 niños</option>
                                                <option value="1">1 niño</option>
                                                <option value="2">2 niños</option>
                                                <option value="3">3 niños</option>
                                                <option value="4">4 niños</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Total a pagar -->
                                    <div class="mb-4">
                                        <label class="form-label fw-bold"><i
                                                class="fas fa-money-bill-wave me-2 text-success"></i>Total a
                                            pagar:</label>
                                        <div class="fs-4 text-success bg-light p-2 rounded shadow-sm" id="total">$0
                                        </div>
                                    </div>

                                    <!-- Método de Pago -->
                                    <h6 class="fw-bold mb-3"><i class="fas fa-credit-card me-2 text-primary"></i>Método
                                        de Pago</h6>
                                    <div class="mb-4">
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="radio" name="payment_method"
                                                id="credit_card" value="credit_card" checked>
                                            <label class="form-check-label" for="credit_card">
                                                <i class="fas fa-credit-card me-2 text-primary"></i>Tarjeta de Crédito
                                            </label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="radio" name="payment_method"
                                                id="paypal" value="paypal">
                                            <label class="form-check-label" for="paypal">
                                                <i class="fab fa-paypal me-2 text-info"></i>PayPal
                                            </label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="radio" name="payment_method"
                                                id="bank_transfer" value="bank_transfer">
                                            <label class="form-check-label" for="bank_transfer">
                                                <i class="fas fa-university me-2 text-secondary"></i>Transferencia
                                                Bancaria
                                            </label>
                                        </div>
                                    </div>

                                    <!-- Términos y condiciones -->
                                    <div class="mb-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="terms" name="terms"
                                                required>
                                            <label class="form-check-label" for="terms">
                                                Acepto los <a href="#" class="text-decoration-none">términos y
                                                    condiciones</a> y la <a href="#"
                                                    class="text-decoration-none">política
                                                    de privacidad</a>.
                                            </label>
                                        </div>
                                    </div>

                                    <!-- Botón de reserva -->
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary btn-lg">Completar Reserva</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Información adicional -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card border-0 shadow-sm mb-4">
                                <div class="card-header bg-light">
                                    <h5 class="mb-0">Información Importante</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row g-4">
                                        <div class="col-md-4">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0">
                                                    <i class="fas fa-plane-departure text-primary fs-4 me-3"></i>
                                                </div>
                                                <div>
                                                    <h6 class="fw-bold">Viaje Flexible</h6>
                                                    <p class="small text-muted">Cancelación gratuita hasta 7 días antes
                                                        de
                                                        la fecha de salida.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0">
                                                    <i class="fas fa-shield-alt text-primary fs-4 me-3"></i>
                                                </div>
                                                <div>
                                                    <h6 class="fw-bold">Viaje Seguro</h6>
                                                    <p class="small text-muted">Seguro básico incluido en todos nuestros
                                                        paquetes.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0">
                                                    <i class="fas fa-headset text-primary fs-4 me-3"></i>
                                                </div>
                                                <div>
                                                    <h6 class="fw-bold">Atención 24/7</h6>
                                                    <p class="small text-muted">Soporte al cliente disponible durante
                                                        todo
                                                        tu viaje.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </main>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function limpiarActividades() {
            const radios = document.querySelectorAll('input[name="id_actividad"]');
            radios.forEach(radio => {
                if (radio.checked) {
                    radio.checked = false;
                    radio.dispatchEvent(new Event('change'));
                }
            });

            if (typeof actualizarTotal === "function") {
                actualizarTotal();
            }
        }
        function limpiarTransporte() {
            const radios = document.querySelectorAll('input[name="id_transporte"]');
            radios.forEach(radio => {
                if (radio.checked) {
                    radio.checked = false;
                    radio.dispatchEvent(new Event('change'));
                }
            });

            if (typeof actualizarTotal === "function") {
                actualizarTotal();
            }
        }
        function limpiaTour() {
            const radios = document.querySelectorAll('input[name="id_tour"]');
            radios.forEach(radio => {
                if (radio.checked) {
                    radio.checked = false;
                    radio.dispatchEvent(new Event('change'));
                }
            });

            if (typeof actualizarTotal === "function") {
                actualizarTotal();
            }
        }
    </script>

    <script>
        window.addEventListener("DOMContentLoaded", function () {
            const fechaInicio = document.getElementById("fecha_reserva");
            const fechaFin = document.getElementById("fecha_salida");
            const form = document.querySelector("form");

            const hoy = new Date();
            const yyyy = hoy.getFullYear();
            const mm = String(hoy.getMonth() + 1).padStart(2, '0');
            const dd = String(hoy.getDate()).padStart(2, '0');
            const fechaHoy = `${yyyy}-${mm}-${dd}`;

            fechaInicio.min = fechaHoy;
            fechaFin.min = fechaHoy;
            fechaInicio.value = fechaHoy;

            fechaInicio.addEventListener("change", function () {
                const seleccionada = new Date(fechaInicio.value);
                const siguienteDia = new Date(seleccionada);
                siguienteDia.setDate(siguienteDia.getDate() + 1);

                const yyyyF = siguienteDia.getFullYear();
                const mmF = String(siguienteDia.getMonth() + 1).padStart(2, '0');
                const ddF = String(siguienteDia.getDate()).padStart(2, '0');
                const minFin = `${yyyyF}-${mmF}-${ddF}`;

                fechaFin.min = minFin;

                // Si fecha fin ya no es válida, corregirla
                if (new Date(fechaFin.value) <= seleccionada) {
                    fechaFin.value = minFin;
                }
            });

            form.addEventListener("submit", function (e) {
                const inicio = new Date(fechaInicio.value);
                const fin = new Date(fechaFin.value);

                if (inicio.getTime() === fin.getTime()) {
                    e.preventDefault();
                    alert("La fecha de fin debe ser posterior a la fecha de inicio.");
                    fechaFin.focus();
                }
            });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const adultSelect = document.getElementById("adults");
            const childSelect = document.getElementById("children");
            const totalDisplay = document.getElementById("total");
            const inputTotal = document.getElementById("input_total");

            // Precios base
            const precioAdulto = 60000;
            const precioNino = 50000;

            // Función para obtener el costo del input seleccionado
            function obtenerCosto(name) {
                const seleccionado = document.querySelector(`input[name="${name}"]:checked`);
                return seleccionado ? parseFloat(seleccionado.dataset.costo) || 0 : 0;
            }

            function actualizarTotal() {
                const adultos = parseInt(adultSelect.value) || 0;
                const ninos = parseInt(childSelect.value) || 0;
                const costoAdultos = adultos * precioAdulto;
                const costoNinos = ninos * precioNino;

                const costoActividad = obtenerCosto("id_actividad");
                const costoTransporte = obtenerCosto("id_transporte");
                const costoTour = obtenerCosto("id_tour");

                const total = costoAdultos + costoNinos + costoActividad + costoTransporte + costoTour;

                totalDisplay.textContent = `$${total.toLocaleString()}`;
                inputTotal.value = total;
            }

            // Eventos que disparan el cálculo
            adultSelect.addEventListener("change", actualizarTotal);
            childSelect.addEventListener("change", actualizarTotal);

            document.querySelectorAll('input[name="id_actividad"]').forEach(input => {
                input.addEventListener("change", actualizarTotal);
            });

            document.querySelectorAll('input[name="id_transporte"]').forEach(input => {
                input.addEventListener("change", actualizarTotal);
            });

            document.querySelectorAll('input[name="id_tour"]').forEach(input => {
                input.addEventListener("change", actualizarTotal);
            });

            // Cálculo inicial
            actualizarTotal();
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const form = document.querySelector("form");
            const inputTotal = document.getElementById("input_total");
            const inputTransporte = document.getElementById("input_transporte");
            const inputTour = document.getElementById("input_tour");
            const totalDisplay = document.getElementById("total");

            const transporteRadios = document.querySelectorAll("input[name='transporte']");
            const tourCheckboxes = document.querySelectorAll("input[id^='tour_']");

            form.addEventListener("submit", () => {
                // Total sin símbolo $
                inputTotal.value = totalDisplay.textContent.replace(/\D/g, '');

                // Transporte seleccionado
                transporteRadios.forEach((radio, index) => {
                    if (radio.checked) {
                        inputTransporte.value = index + 1; // o usa un atributo data-id si tienes IDs reales
                    }
                });

                // Tours seleccionados
                const tours = [];
                tourCheckboxes.forEach(cb => {
                    if (cb.checked) {
                        const id = cb.id.split("_")[1]; // tour_3 => 3
                        tours.push(id);
                    }
                });
                inputTour.value = tours.join(",");
            });
        });
    </script>
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