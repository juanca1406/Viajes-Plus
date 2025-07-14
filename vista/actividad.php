<!DOCTYPE html>
<html lang="es" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ViajesPlus - Gestión de Alojamiento</title>
    <link href="https://cdn.replit.com/agent/bootstrap-agent-dark-theme.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <div class="d-flex flex-column flex-lg-row h-100">
        <!-- Sidebar -->
        <nav class="sidebar bg-dark text-white p-3">
            <div class="d-flex align-items-center mb-4 sidebar-header">
                <div class="logo-container">
                    <svg class="logo" viewBox="0 0 100 100" width="40" height="40">
                        <path d="M50,15 L85,45 L65,85 H35 L15,45 Z" fill="#0d6efd" />
                        <path d="M40,35 L60,35 L55,60 H45 Z" fill="#ffffff" />
                    </svg>
                </div>
                <span class="ms-2 fw-bold d-none d-lg-inline">TravelAdmin</span>
                <button class="btn btn-link text-white ms-auto d-lg-none" id="sidebarToggle">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
            <ul class="nav flex-column">
                <li class="nav-item mb-2">
                    <a class="nav-link" href="../vista/dashboard.php">
                        <i class="fas fa-tachometer-alt me-2"></i>
                        <span class="d-none d-lg-inline">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link" href="../modelo/modelo.php?opcion=13">
                        <i class="fa-solid fa-chart-line"></i>
                        <span class="d-none d-lg-inline">Actividades</span>
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link" href="../modelo/modelo.php?opcion=17">
                        <i class="fa-solid fa-location-pin"></i>
                        <span class="d-none d-lg-inline">Tour</span>
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link" href="../modelo/modelo.php?opcion=27">
                        <i class="fa-solid fa-bus"></i>
                        <span class="d-none d-lg-inline">Transporte</span>
                    </a>
                </li>
                <hr>
                <li class="nav-item mb-2">
                    <a class="nav-link" href="../index.php">
                        <i class="fa-solid fa-door-open"></i>
                        <span class="d-none d-lg-inline">Cerrar sesión</span>
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Main Content -->
        <div class="content-wrapper flex-grow-1 overflow-auto">
            <!-- Top Navbar -->
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top shadow-sm">
                <div class="container-fluid">
                    <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse"
                        data-bs-target="#topNavbar">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="topNavbar">
                        <ol class="breadcrumb my-2 ms-3">
                            <li class="breadcrumb-item"><a href="../vista/dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Actividad</li>
                        </ol>

                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="notificationsDropdown" role="button"
                                    data-bs-toggle="dropdown">
                                    <i class="fas fa-bell"></i>
                                    <span
                                        class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                        3
                                    </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <h6 class="dropdown-header">Notificaciones</h6>
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-user-plus me-2 text-success"></i>
                                            <div>
                                                <p class="mb-0">Nuevo cliente registrado</p>
                                                <small class="text-muted">Hace 5 minutos</small>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-calendar-check me-2 text-primary"></i>
                                            <div>
                                                <p class="mb-0">Nueva reserva confirmada</p>
                                                <small class="text-muted">Hace 1 hora</small>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-exclamation-triangle me-2 text-warning"></i>
                                            <div>
                                                <p class="mb-0">Alojamiento con baja disponibilidad</p>
                                                <small class="text-muted">Hace 3 horas</small>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-center" href="#">Ver todas</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" id="helpDropdown">
                                    <i class="fas fa-question-circle"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <!-- Main Content Area -->
            <div class="container-fluid py-4">
                <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
                    <h1 class="h3">Gestión de Actividades</h1>
                    <div class="d-flex">
                        <button class="btn btn-primary" id="addClientBtn" data-bs-toggle="modal"
                            data-bs-target="#productoModal">
                            <i class="fas fa-user-plus me-2"></i>Nueva Actividad
                        </button>
                    </div>
                </div>
                <?php if (isset($_GET['registro']) && $_GET['registro'] === 'registrar'): ?>
                    <div class="d-flex justify-content-center mt-4">
                        <div class="alert alert-success alert-dismissible fade show text-center shadow" role="alert"
                            style="max-width: 500px; width: 100%;">
                            ¡La actividad se registro!
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
                            ¡La actividad se actualizó correctamente!
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
                            ¡La actividad se eliminó exitosamente!
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
                <?php if (isset($_GET['registro']) && $_GET['registro'] === 'repetido'): ?>
                    <div class="alert alert-warning alert-dismissible fade show text-center shadow mb-3" role="alert">
                        ¡La actividad ya está registrada!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
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
                        }, 5000); // 10 segundos
                    </script>
                <?php endif; ?>
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="table-light text-center">
                                    <tr>
                                        <th>#</th>
                                        <th>Nombre</th>
                                        <th>Descripción</th>
                                        <th>Costo</th>
                                        <th>Disponibilidad</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody id="productosTableBody">
                                    <?php foreach ($arreglo as $producto): ?>
                                        <tr class="text-center">
                                            <td><strong><?php echo $producto->id; ?></strong></td>
                                            <td><?php echo $producto->nombre; ?></td>
                                            <td><?php echo $producto->descripcion; ?></td>
                                            <td><?php echo $producto->costo; ?></td>
                                            <td><?php echo $producto->disponibilidad; ?></td>
                                            <td>
                                                <button class="btn btn-sm btn-outline-primary"
                                                    onclick='cargarDatosEditar(<?php echo json_encode($producto); ?>)'>
                                                    <i class="bi bi-pencil-square"></i> Editar
                                                </button>
                                                <button class="btn btn-sm btn-outline-danger"
                                                    onclick="confirmarEliminar(<?php echo $producto->id; ?>)">
                                                    <i class="bi bi-trash"></i> Eliminar
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
            <footer class="footer mt-auto py-3 bg-dark text-white">
                <div class="container-fluid text-center">
                    <span class="text-muted">© 2025 ViajesPlus. Todos los derechos reservados.</span>
                </div>
            </footer>
        </div>
    </div>

    <!-- Client Modal -->
    <div class="modal fade" id="productoModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form id="productoForm" class="needs-validation" novalidate method="post"
                action="../modelo/modelo.php?opcion=14">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Agregar Nueva actividad</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Mensaje de advertencia si la actividad está repetida -->
                        <?php if (isset($_GET['registro']) && $_GET['registro'] === 'repetido'): ?>
                            <div class="alert alert-warning alert-dismissible fade show text-center shadow" role="alert">
                                ¡La actividad ya está registrada!
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Cerrar"></button>
                            </div>
                        <?php endif; ?>

                        <input type="hidden" name="id" id="producto_id">
                        <div class="row g-4">
                            <div class="col-md-6">
                                <label for="nombre" class="form-label fw-semibold">Nombre</label>
                                <input type="text" class="form-control shadow-sm" name="nombre" id="nombre" required
                                    maxlength="35">
                                <div class="invalid-feedback">Solo se permiten letras, espacios y signos básicos. No se
                                    permiten números.</div>
                            </div>
                            <div class="col-md-6">
                                <label for="costo" class="form-label fw-semibold">Costo</label>
                                <input type="number" class="form-control shadow-sm" name="costo" id="costo" min="0"
                                    step="0.01" required>
                                <div class="invalid-feedback">Ingrese un costo válido.</div>
                            </div>
                            <div class="col-md-12">
                                <label for="descripcion" class="form-label fw-semibold">Descripción</label>
                                <textarea class="form-control shadow-sm" name="descripcion" id="descripcion" rows="3"
                                    required></textarea>
                                <div class="invalid-feedback">Ingrese una descripción válida.</div>
                            </div>
                            <div class="col-md-6">
                                <label for="disponibilidad" class="form-label fw-semibold">Disponibilidad</label>
                                <select class="form-select shadow-sm" name="disponibilidad" id="disponibilidad"
                                    required>
                                    <option value="">Seleccione...</option>
                                    <option value="Disponible">Disponible</option>
                                    <option value="No disponible">No disponible</option>
                                </select>
                                <div class="invalid-feedback">Seleccione una opción válida.</div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Guardar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Editar Cliente -->
    <div class="modal fade" id="productoEdit" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form id="editForm" class="needs-validation" novalidate method="post"
                action="../modelo/modelo.php?opcion=15">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Editar Actividad</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="edit_id" name="id">
                        <div class="row g-4">
                            <div class="col-md-6">
                                <label for="edit_nombre" class="form-label fw-semibold">Nombre</label>
                                <input type="text" class="form-control shadow-sm" id="edit_nombre" name="nombre"
                                    required>
                                <div class="invalid-feedback">Solo letras. No se permiten números.</div>
                            </div>
                            <div class="col-md-6">
                                <label for="edit_costo" class="form-label fw-semibold">Costo</label>
                                <input type="number" class="form-control shadow-sm" id="edit_costo" name="costo" min="0"
                                    step="0.01" required>
                            </div>
                            <div class="col-md-12">
                                <label for="edit_descripcion" class="form-label fw-semibold">Descripción</label>
                                <textarea class="form-control shadow-sm" id="edit_descripcion" name="descripcion"
                                    rows="3" required></textarea>
                            </div>
                            <div class="col-md-6">
                                <label for="edit_disponibilidad" class="form-label fw-semibold">Disponibilidad</label>
                                <select class="form-select shadow-sm" id="edit_disponibilidad" name="disponibilidad"
                                    required>
                                    <option value="Disponible">Disponible</option>
                                    <option value="No disponible">No disponible</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Guardar Cambios
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="modalEliminar" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form id="formEliminar" method="post" action="../modelo/modelo.php?opcion=16">
                <input type="hidden" name="id" id="idEliminar">
                <div class="modal-content">
                    <div class="modal-header bg-danger text-white">
                        <h5 class="modal-title">Confirmar Eliminación</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                            aria-label="Cerrar"></button>
                    </div>
                    <div class="modal-body text-center">
                        <p>¿Estás seguro de que deseas eliminar la actvidad?</p>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-danger"><i
                                class="fas fa-trash-alt me-1"></i>Eliminar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('productoForm');
            const nombre = document.getElementById('nombre');
            const descripcion = document.getElementById('descripcion');
            const costo = document.getElementById('costo');
            const disponibilidad = document.getElementById('disponibilidad');

            // Validación en vivo para el campo nombre
            nombre.addEventListener('input', function () {
                const regex = /^[A-Za-zÁÉÍÓÚáéíóúÑñ\s.,()-]+$/;
                if (!regex.test(nombre.value.trim())) {
                    nombre.setCustomValidity("Solo letras. No se permiten números.");
                    nombre.classList.add('is-invalid');
                    nombre.classList.remove('is-valid');
                } else {
                    nombre.setCustomValidity("");
                    nombre.classList.remove('is-invalid');
                    nombre.classList.add('is-valid');
                }
            });

            form.addEventListener('submit', function (event) {
                let valid = true;

                const regexNombre = /^[A-Za-zÁÉÍÓÚáéíóúÑñ\s.,()-]+$/;
                if (!regexNombre.test(nombre.value.trim())) {
                    nombre.setCustomValidity("Solo letras. No se permiten números.");
                    nombre.classList.add('is-invalid');
                    nombre.classList.remove('is-valid');
                    valid = false;
                } else {
                    nombre.setCustomValidity("");
                    nombre.classList.remove('is-invalid');
                    nombre.classList.add('is-valid');
                }

                // Validar descripción
                if (descripcion.value.trim().length < 5) {
                    descripcion.classList.add('is-invalid');
                    valid = false;
                } else {
                    descripcion.classList.remove('is-invalid');
                }

                // Validar costo
                if (isNaN(costo.value) || parseFloat(costo.value) < 0) {
                    costo.classList.add('is-invalid');
                    valid = false;
                } else {
                    costo.classList.remove('is-invalid');
                }

                // Validar disponibilidad
                if (disponibilidad.value === '') {
                    disponibilidad.classList.add('is-invalid');
                    valid = false;
                } else {
                    disponibilidad.classList.remove('is-invalid');
                }

                if (!form.checkValidity() || !valid) {
                    event.preventDefault();
                    event.stopPropagation();
                }

                form.classList.add('was-validated');
            });
        });
    </script>

    <script>
        function confirmarEliminar(id) {
            document.getElementById('idEliminar').value = id;
            var modal = new bootstrap.Modal(document.getElementById('modalEliminar'));
            modal.show();
        }
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const editForm = document.getElementById('editForm');
            const nombre = document.getElementById('edit_nombre');
            const descripcion = document.getElementById('edit_descripcion');
            const costo = document.getElementById('edit_costo');
            const disponibilidad = document.getElementById('edit_disponibilidad');

            // Validar nombre en vivo (no permitir números)
            nombre.addEventListener('input', function () {
                const regex = /^[A-Za-zÁÉÍÓÚáéíóúÑñ\s.,()-]+$/;
                if (!regex.test(nombre.value.trim())) {
                    nombre.setCustomValidity("El nombre solo puede contener letras y signos básicos.");
                    nombre.classList.add('is-invalid');
                    nombre.classList.remove('is-valid');
                } else {
                    nombre.setCustomValidity("");
                    nombre.classList.remove('is-invalid');
                    nombre.classList.add('is-valid');
                }
            });

            editForm.addEventListener('submit', function (event) {
                let valid = true;

                // Validación nombre
                const regexNombre = /^[A-Za-zÁÉÍÓÚáéíóúÑñ\s.,()-]+$/;
                if (!regexNombre.test(nombre.value.trim())) {
                    nombre.setCustomValidity("El nombre solo puede contener letras y signos básicos.");
                    nombre.classList.add('is-invalid');
                    nombre.classList.remove('is-valid');
                    valid = false;
                } else {
                    nombre.setCustomValidity("");
                    nombre.classList.remove('is-invalid');
                    nombre.classList.add('is-valid');
                }

                // Validación descripción (mínimo 5 caracteres)
                if (descripcion.value.trim().length < 5) {
                    descripcion.setCustomValidity("La descripción debe tener al menos 5 caracteres.");
                    descripcion.classList.add('is-invalid');
                    valid = false;
                } else {
                    descripcion.setCustomValidity("");
                    descripcion.classList.remove('is-invalid');
                }

                // Validación costo (número positivo)
                if (isNaN(costo.value) || parseFloat(costo.value) < 0) {
                    costo.setCustomValidity("Ingrese un costo válido mayor o igual a 0.");
                    costo.classList.add('is-invalid');
                    valid = false;
                } else {
                    costo.setCustomValidity("");
                    costo.classList.remove('is-invalid');
                }

                // Validar disponibilidad
                if (disponibilidad.value === '') {
                    disponibilidad.setCustomValidity("Seleccione una opción.");
                    disponibilidad.classList.add('is-invalid');
                    valid = false;
                } else {
                    disponibilidad.setCustomValidity("");
                    disponibilidad.classList.remove('is-invalid');
                }

                if (!editForm.checkValidity() || !valid) {
                    event.preventDefault();
                    event.stopPropagation();
                }

                editForm.classList.add('was-validated');
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const editForm = document.getElementById('editForm');

            editForm.addEventListener('submit', function (event) {
                if (!editForm.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                editForm.classList.add('was-validated');
            });
        });
    </script>

    <script>
        function cargarDatosEditar(producto) {
            document.getElementById('edit_id').value = producto.id;
            document.getElementById('edit_nombre').value = producto.nombre;
            document.getElementById('edit_descripcion').value = producto.descripcion;
            document.getElementById('edit_costo').value = producto.costo;
            document.getElementById('edit_disponibilidad').value = producto.disponibilidad;

            // Limpiar validaciones anteriores
            document.querySelectorAll('#editForm input, #editForm textarea, #editForm select').forEach(el => {
                el.classList.remove('is-invalid');
            });

            // Mostrar modal
            const modal = new bootstrap.Modal(document.getElementById('productoEdit'));
            modal.show();
        }
    </script>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- App JavaScript -->
    <script src="/static/js/data.js"></script>
    <script src="/static/js/utils.js"></script>
    <script src="/static/js/clients.js"></script>
</body>

</html>