<?php
include '../conexion/conexion.php';

// Consulta completa con todos los ID necesarios para editar
$sql = "SELECT 
    r.id,
    r.id_cliente,
    r.id_transporte,
    r.id_alojamiento,
    r.id_tour,
    r.id_actividad,
    r.fecha_reserva,
    r.fecha_salida,
    r.total,
    c.nombre AS cliente_nombre,
    c.apellido AS cliente_apellido,
    a.nombre AS alojamiento_nombre,
    t.transporte AS transporte_nombre,
    ac.nombre AS actividad_nombre,
    tr.nombre AS tour_nombre
FROM reserva r
LEFT JOIN clientes c ON r.id_cliente = c.id
LEFT JOIN alojamiento a ON r.id_alojamiento = a.id
LEFT JOIN transporte t ON r.id_transporte = t.id
LEFT JOIN actividades ac ON r.id_actividad = ac.id
LEFT JOIN tour tr ON r.id_tour = tr.id";

$resultado = mysqli_query($conexion, $sql);

$arreglo = [];
while ($fila = mysqli_fetch_object($resultado)) {
    $arreglo[] = $fila;
}
mysqli_close($conexion);
?>

<!DOCTYPE html>
<html lang="es" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ViajesPlus - Gestión de Reservas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
                <span class="ms-2 fw-bold fs-5 d-none d-lg-inline">TravelAdmin</span>
                <button class="btn btn-link text-white ms-auto d-lg-none" id="sidebarToggle">
                    <i class="fas fa-bars fs-4"></i>
                </button>
            </div>
            <ul class="nav flex-column gap-1">
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center rounded-pill px-3 py-2 text-white"
                        href="../vista/dashboard.php">
                        <i class="fas fa-tachometer-alt me-2"></i>
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
                    <a class="nav-link d-flex align-items-center rounded-pill px-3 py-2 text-white bg-primary bg-opacity-75 active"
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
                        <i class="fa-solid fa-door-open me-2"></i>
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
                            <li class="breadcrumb-item"><a href="../vista/dashboard.php"
                                    class="text-decoration-none text-primary">Dashboard</a></li>
                            <li class="breadcrumb-item active text-white">Reservas</li>
                        </ol>
                    </div>
                </div>
            </nav>

            <!-- Main Content Area -->
            <div class="container-fluid py-4 flex-grow-1">
                <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
                    <h1 class="h3 mb-0">Gestión de Reservas</h1>
                    <button class="btn btn-primary rounded-pill shadow-sm" id="addReservaBtn" data-bs-toggle="modal"
                        data-bs-target="#reservaModal">
                        <i class="fas fa-calendar-plus me-2"></i>Nueva Reserva
                    </button>
                </div>
                <?php if (isset($_GET['registro']) && $_GET['registro'] === 'registrar'): ?>
                    <div class="d-flex justify-content-center mt-4">
                        <div class="alert alert-success alert-dismissible fade show text-center shadow" role="alert"
                            style="max-width: 500px; width: 100%;">
                            ¡La reserva se registro!
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
                <?php if (isset($_GET['registro']) && $_GET['registro'] === 'actualizado'): ?>
                    <div class="d-flex justify-content-center mt-4">
                        <div class="alert alert-success alert-dismissible fade show text-center shadow" role="alert"
                            style="max-width: 500px; width: 100%;">
                            ¡La reserva se actualizó correctamente!
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
                <!-- Reservas Table -->
                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered align-middle text-center">
                                <thead class="table-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Cliente</th>
                                        <th>Transporte</th>
                                        <th>Alojamiento</th>
                                        <th>Tour</th>
                                        <th>Actividad</th>
                                        <th>Fecha Reserva</th>
                                        <th>Fecha Salida</th>
                                        <th>Total</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($arreglo as $reserva): ?>
                                        <tr>
                                            <td><strong><?php echo $reserva->id; ?></strong></td>
                                            <td><?php echo $reserva->cliente_nombre . ' ' . $reserva->cliente_apellido; ?>
                                            </td>
                                            <td><?php echo $reserva->transporte_nombre ?: 'Sin transporte'; ?></td>
                                            <td><?php echo $reserva->alojamiento_nombre ?: 'Sin alojamiento'; ?></td>
                                            <td><?php echo $reserva->tour_nombre ?: 'Sin tour'; ?></td>
                                            <td><?php echo $reserva->actividad_nombre ?: 'Sin actividad'; ?></td>
                                            <td><?php echo $reserva->fecha_reserva; ?></td>
                                            <td><?php echo $reserva->fecha_salida; ?></td>
                                            <td>$<?php echo number_format($reserva->total, 0, ',', '.'); ?></td>
                                            <td>
                                                <button class="btn btn-sm btn-outline-primary rounded-pill"
                                                    onclick='editarReserva(<?php echo json_encode($reserva); ?>)'>
                                                    <i class="fas fa-pen"></i>
                                                </button>
                                                <button class="btn btn-sm btn-outline-danger rounded-pill"
                                                    onclick="confirmarEliminar(<?php echo $reserva->id; ?>)">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
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

    <!-- Modal Nueva Reserva -->
    <div class="modal fade" id="reservaModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form id="reservaForm" class="needs-validation" novalidate method="post"
                action="../modelo/modelo.php?opcion=32">
                <div class="modal-content rounded-4">
                    <div class="modal-header">
                        <h5 class="modal-title">Agregar Nueva Reserva</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row g-4">
                            <div class="col-md-6">
                                <label for="id_cliente" class="form-label fw-semibold">Cliente<span
                                        class="text-danger">*</span></label>
                                <select class="form-select shadow-sm" id="id_cliente" name="id_cliente" required>
                                    <option selected disabled value="">Seleccione un cliente</option>
                                    <?php foreach ($arreglo2 as $cliente): ?>
                                        <option value="<?php echo $cliente->id; ?>"><?php echo $cliente->nombre; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback">Seleccione una categoría válida.</div>
                            </div>
                            <div class="col-md-6">
                                <label for="id_transporte" class="form-label fw-semibold">Transporte <span
                                        class="text-danger">*</span></label>
                                <select class="form-select shadow-sm" id="id_transporte" name="id_transporte" required>
                                    <option selected disabled value="">Seleccione un transporte</option>
                                    <?php foreach ($arreglo3 as $transporte): ?>
                                        <option value="<?php echo $transporte->id; ?>"
                                            data-costo="<?php echo $transporte->costo_transporte; ?>">
                                            <?php echo $transporte->transporte; ?> -
                                            $<?php echo number_format($transporte->costo_transporte, 0, ',', '.'); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback">Ingrese el transporte.</div>
                            </div>
                            <div class="col-md-6">
                                <label for="id_alojamiento" class="form-label fw-semibold">Alojamiento</label>
                                <select class="form-select shadow-sm" id="id_alojamiento" name="id_alojamiento"
                                    required>
                                    <option selected disabled value="">Seleccione un alojamiento</option>
                                    <?php foreach ($arreglo4 as $alojamiento): ?>
                                        <option value="<?php echo $alojamiento->id; ?>"
                                            data-costo="<?php echo $alojamiento->costo_noche; ?>">
                                            <?php echo $alojamiento->nombre; ?> -
                                            $<?php echo number_format($alojamiento->costo_noche, 0, ',', '.'); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback">Ingrese el alojamiento.</div>
                            </div>
                            <div class="col-md-6">
                                <label for="id_tour" class="form-label fw-semibold">Tour</label>
                                <select class="form-select shadow-sm" id="id_tour" name="id_tour">
                                    <option selected disabled value="">Seleccione un tour</option>
                                    <?php foreach ($arreglo5 as $tour): ?>
                                        <option value="<?php echo $tour->id; ?>" data-costo="<?php echo $tour->costo; ?>">
                                            <?php echo $tour->nombre; ?> -
                                            $<?php echo number_format($tour->costo, 0, ',', '.'); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback">Ingrese el tour.</div>
                            </div>
                            <div class="col-md-6">
                                <label for="id_actividad" class="form-label fw-semibold">Actividad</label>
                                <select class="form-select shadow-sm" id="id_actividad" name="id_actividad">
                                    <option selected disabled value="">Seleccione un actividad</option>
                                    <?php foreach ($arreglo6 as $actividad): ?>
                                        <option value="<?php echo $actividad->id; ?>"
                                            data-costo="<?php echo $actividad->costo; ?>">
                                            <?php echo $actividad->nombre; ?> -
                                            $<?php echo number_format($actividad->costo, 0, ',', '.'); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback">Ingrese el tour.</div>
                            </div>
                            <div class="col-md-6">
                                <label for="fecha_reserva" class="form-label fw-semibold">Fecha Reserva <span
                                        class="text-danger">*</span></label>
                                <input type="date" class="form-control shadow-sm" id="fecha_reserva"
                                    name="fecha_reserva" required>
                                <div class="invalid-feedback">Ingrese la fecha de reserva.</div>
                            </div>
                            <div class="col-md-6">
                                <label for="fecha_salida" class="form-label fw-semibold">Fecha Salida <span
                                        class="text-danger">*</span></label>
                                <input type="date" class="form-control shadow-sm" id="fecha_salida" name="fecha_salida"
                                    required>
                                <div class="invalid-feedback">Ingrese la fecha de salida.</div>
                            </div>
                            <div class="col-md-6">
                                <label for="total" class="form-label fw-semibold">Total <span
                                        class="text-danger">*</span></label>
                                <input type="number" class="form-control shadow-sm" id="total" name="total" readonly>
                                <div class="invalid-feedback">Ingrese el total.</div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary rounded-pill"
                            data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary rounded-pill">
                            <i class="fas fa-save me-2"></i>Guardar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Editar Reserva -->
    <!-- Modal Editar Reserva -->
    <div class="modal fade" id="reservaEditModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form id="editReservaForm" class="needs-validation" novalidate method="post"
                action="../modelo/modelo.php?opcion=33">
                <div class="modal-content rounded-4">
                    <div class="modal-header">
                        <h5 class="modal-title">Editar Reserva</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="edit_id" name="id">
                        <div class="row g-4">

                            <!-- Cliente -->
                            <div class="col-md-6">
                                <label for="edit_id_cliente" class="form-label fw-semibold">Cliente<span
                                        class="text-danger">*</span></label>
                                <select class="form-select shadow-sm" id="edit_id_cliente" name="id_cliente" required>
                                    <option selected disabled value="">Seleccione un cliente</option>
                                    <?php foreach ($arreglo2 as $cliente): ?>
                                        <option value="<?php echo $cliente->id; ?>"><?php echo $cliente->nombre; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback">Seleccione un cliente válido.</div>
                            </div>

                            <!-- Transporte -->
                            <div class="col-md-6">
                                <label for="edit_id_transporte" class="form-label fw-semibold">Transporte <span
                                        class="text-danger">*</span></label>
                                <select class="form-select shadow-sm" id="edit_id_transporte" name="id_transporte"
                                    required>
                                    <option selected disabled value="">Seleccione un transporte</option>
                                    <?php foreach ($arreglo3 as $transporte): ?>
                                        <option value="<?php echo $transporte->id; ?>"
                                            data-costo="<?php echo $transporte->costo_transporte; ?>">
                                            <?php echo $transporte->transporte; ?> -
                                            $<?php echo number_format($transporte->costo_transporte, 0, ',', '.'); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback">Ingrese el transporte.</div>
                            </div>

                            <!-- Alojamiento -->
                            <div class="col-md-6">
                                <label for="edit_id_alojamiento" class="form-label fw-semibold">Alojamiento</label>
                                <select class="form-select shadow-sm" id="edit_id_alojamiento" name="id_alojamiento">
                                    <option selected disabled value="">Seleccione un alojamiento</option>
                                    <?php foreach ($arreglo4 as $alojamiento): ?>
                                        <option value="<?php echo $alojamiento->id; ?>"
                                            data-costo="<?php echo $alojamiento->costo_noche; ?>">
                                            <?php echo $alojamiento->nombre; ?> -
                                            $<?php echo number_format($alojamiento->costo_noche, 0, ',', '.'); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <!-- Tour -->
                            <div class="col-md-6">
                                <label for="edit_id_tour" class="form-label fw-semibold">Tour</label>
                                <select class="form-select shadow-sm" id="edit_id_tour" name="id_tour">
                                    <option selected disabled value="">Seleccione un tour</option>
                                    <?php foreach ($arreglo5 as $tour): ?>
                                        <option value="<?php echo $tour->id; ?>" data-costo="<?php echo $tour->costo; ?>">
                                            <?php echo $tour->nombre; ?> -
                                            $<?php echo number_format($tour->costo, 0, ',', '.'); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <!-- Actividad -->
                            <div class="col-md-6">
                                <label for="edit_id_actividad" class="form-label fw-semibold">Actividad</label>
                                <select class="form-select shadow-sm" id="edit_id_actividad" name="id_actividad">
                                    <option selected disabled value="">Seleccione una actividad</option>
                                    <?php foreach ($arreglo6 as $actividad): ?>
                                        <option value="<?php echo $actividad->id; ?>"
                                            data-costo="<?php echo $actividad->costo; ?>">
                                            <?php echo $actividad->nombre; ?> -
                                            $<?php echo number_format($actividad->costo, 0, ',', '.'); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <!-- Fecha Reserva -->
                            <div class="col-md-6">
                                <label for="edit_fecha_reserva" class="form-label fw-semibold">Fecha Reserva <span
                                        class="text-danger">*</span></label>
                                <input type="date" class="form-control shadow-sm" id="edit_fecha_reserva"
                                    name="fecha_reserva" required>
                                <div class="invalid-feedback">Ingrese la fecha de reserva.</div>
                            </div>

                            <!-- Fecha Salida -->
                            <div class="col-md-6">
                                <label for="edit_fecha_salida" class="form-label fw-semibold">Fecha Salida <span
                                        class="text-danger">*</span></label>
                                <input type="date" class="form-control shadow-sm" id="edit_fecha_salida"
                                    name="fecha_salida" required>
                                <div class="invalid-feedback">Ingrese la fecha de salida.</div>
                            </div>

                            <!-- Total (visual) -->
                            <div class="col-md-6">
                                <label for="edit_total" class="form-label fw-semibold">Total</label>
                                <input type="number" class="form-control" id="edit_total" readonly>
                                <input type="hidden" id="edit_total_hidden" name="total">
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary rounded-pill"
                            data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary rounded-pill">
                            <i class="fas fa-save me-2"></i>Guardar Cambios
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Eliminar Reserva -->
    <div class="modal fade" id="modalEliminar" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form id="formEliminar" method="post" action="../modelo/modelo.php?opcion=34">
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

    <!-- Bootstrap Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function confirmarEliminar(id) {
            document.getElementById('idEliminar').value = id;
            var modal = new bootstrap.Modal(document.getElementById('modalEliminar'));
            modal.show();
        }
        function editarReserva(reserva) {
            document.getElementById('edit_id').value = reserva.id;
            document.getElementById('edit_id_cliente').value = reserva.id_cliente;
            document.getElementById('edit_id_transporte').value = reserva.id_transporte;
            document.getElementById('edit_id_alojamiento').value = reserva.id_alojamiento;
            document.getElementById('edit_id_tour').value = reserva.id_tour;
            document.getElementById('edit_fecha_reserva').value = reserva.fecha_reserva;
            document.getElementById('edit_fecha_salida').value = reserva.fecha_salida;
            document.getElementById('edit_total').value = reserva.total;
            document.querySelectorAll('#editReservaForm input').forEach(el => {
                el.classList.remove('is-invalid');
            });
            new bootstrap.Modal(document.getElementById('reservaEditModal')).show();
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
        document.addEventListener('DOMContentLoaded', () => {
            const totalInput = document.getElementById('total');
            const selects = ['id_transporte', 'id_alojamiento', 'id_tour', 'id_actividad'];

            function calcularTotal() {
                let total = 0;

                selects.forEach(id => {
                    const select = document.getElementById(id);
                    const selectedOption = select.options[select.selectedIndex];

                    if (selectedOption && selectedOption.dataset.costo) {
                        const costo = parseFloat(selectedOption.dataset.costo);
                        if (!isNaN(costo)) {
                            total += costo;
                        }
                    }
                });

                totalInput.value = total.toFixed(0); // puedes usar toFixed(2) si quieres decimales
            }

            // Escucha los cambios en cada select
            selects.forEach(id => {
                const select = document.getElementById(id);
                select.addEventListener('change', calcularTotal);
            });

            // Calcular una vez al cargar por si hay valores seleccionados
            calcularTotal();
        });
    </script>

    <script>
        // Script para validación Bootstrap personalizada
        (function () {
            'use strict';

            // Esperar a que el DOM esté cargado
            window.addEventListener('load', function () {
                // Obtener todos los formularios que deben ser validados
                var forms = document.querySelectorAll('.needs-validation');

                // Iterar sobre los formularios y evitar el envío si no son válidos
                Array.prototype.slice.call(forms).forEach(function (form) {
                    form.addEventListener('submit', function (event) {
                        if (!form.checkValidity()) {
                            event.preventDefault();
                            event.stopPropagation();
                        }

                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const totalInputEdit = document.getElementById('edit_total');
            const totalHiddenEdit = document.getElementById('edit_total_hidden');
            const selectsEdit = ['edit_id_transporte', 'edit_id_alojamiento', 'edit_id_tour', 'edit_id_actividad'];

            function calcularTotalEdicion() {
                let total = 0;

                selectsEdit.forEach(id => {
                    const select = document.getElementById(id);
                    const selectedOption = select.options[select.selectedIndex];

                    if (selectedOption && selectedOption.dataset.costo) {
                        const costo = parseFloat(selectedOption.dataset.costo);
                        if (!isNaN(costo)) {
                            total += costo;
                        }
                    }
                });

                totalInputEdit.value = total.toFixed(0);
                totalHiddenEdit.value = total.toFixed(0);
            }

            // Escuchar cambios en los selects del formulario de edición
            selectsEdit.forEach(id => {
                const select = document.getElementById(id);
                select.addEventListener('change', calcularTotalEdicion);
            });

            // Recalcular cuando se muestre el modal (por si ya hay datos precargados)
            const editModal = document.getElementById('reservaEditModal');
            editModal.addEventListener('shown.bs.modal', calcularTotalEdicion);
        });
    </script>

    <script>
        function editarReserva(reserva) {
            document.getElementById('edit_id').value = reserva.id;
            document.getElementById('edit_id_cliente').value = reserva.id_cliente;
            document.getElementById('edit_id_transporte').value = reserva.id_transporte;
            document.getElementById('edit_id_alojamiento').value = reserva.id_alojamiento ?? '';
            document.getElementById('edit_id_tour').value = reserva.id_tour ?? '';
            document.getElementById('edit_id_actividad').value = reserva.id_actividad ?? '';
            document.getElementById('edit_fecha_reserva').value = reserva.fecha_reserva;
            document.getElementById('edit_fecha_salida').value = reserva.fecha_salida;

            // Mostrar total y enviar al backend
            document.getElementById('edit_total').value = reserva.total;
            document.getElementById('edit_total_hidden').value = reserva.total;

            // Mostrar modal
            const modal = new bootstrap.Modal(document.getElementById('reservaEditModal'));
            modal.show();
        }
    </script>


</body>

</html>