<!DOCTYPE html>
<html lang="es" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ViajesPlus - Gestión de Clientes</title>
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
                    <a class="nav-link d-flex align-items-center rounded-pill px-3 py-2 text-white bg-primary bg-opacity-75 active"
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
                            <li class="breadcrumb-item active text-white">Clientes</li>
                        </ol>
                    </div>
                </div>
            </nav>

            <!-- Main Content Area -->
            <div class="container-fluid py-4 flex-grow-1">
                <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
                    <h1 class="h3 mb-0">Gestión de Clientes</h1>
                    <button class="btn btn-primary rounded-pill shadow-sm" id="addClientBtn" data-bs-toggle="modal"
                        data-bs-target="#clientModal">
                        <i class="fas fa-user-plus me-2"></i>Nuevo Cliente
                    </button>
                </div>
                <?php if (isset($_GET['registro']) && $_GET['registro'] === 'registrar'): ?>
                    <div class="d-flex justify-content-center mt-4">
                        <div class="alert alert-success alert-dismissible fade show text-center shadow" role="alert"
                            style="max-width: 500px; width: 100%;">
                            ¡El cliente se registro!
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
                            ¡El cliente se actualizó correctamente!
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
                            ¡Cliente eliminado exitosamente!
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
                <?php if (isset($_GET['registro']) && $_GET['registro'] === 'correo'): ?>
                    <div class="alert alert-warning alert-dismissible fade show text-center shadow mb-3" role="alert">
                        ¡El Correo ya está registrado!
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
                <?php if (isset($_GET['registro']) && $_GET['registro'] === 'documento'): ?>
                    <div class="alert alert-warning alert-dismissible fade show text-center shadow mb-3" role="alert">
                        ¡El Numero del documento ya está registrado!
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
                <!-- Clients Table -->
                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="table-light text-center">
                                    <tr>
                                        <th>#</th>
                                        <th>Usuario</th>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Correo</th>
                                        <th>Celular</th>
                                        <th>Rol</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody id="clientsTableBody">
                                    <?php foreach ($arreglo as $cliente): ?>
                                        <tr class="text-center">
                                            <td><strong><?php echo $cliente->id; ?></strong></td>
                                            <td><?php echo $cliente->nombre_usuario; ?></td>
                                            <td><?php echo $cliente->nombre; ?></td>
                                            <td><?php echo $cliente->apellido; ?></td>
                                            <td><?php echo $cliente->correo; ?></td>
                                            <td><?php echo $cliente->celular; ?></td>
                                            <td><?php echo $cliente->rol; ?></td>
                                            <td>
                                                <?php if ($cliente->estado == 'A'): ?>
                                                    <span class="badge bg-success">Activo</span>
                                                <?php else: ?>
                                                    <span class="badge bg-secondary">Inactivo</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-outline-primary rounded-pill"
                                                    onclick='cargarDatosEditar(<?php echo json_encode($cliente); ?>)'>
                                                    <i class="fas fa-pen"></i>
                                                </button>
                                                <?php if ($cliente->estado == 'A'): ?>
                                                    <button class="btn btn-sm btn-outline-danger rounded-pill"
                                                        onclick="confirmarEliminar(<?php echo $cliente->id; ?>)">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                <?php else: ?>
                                                    <button class="btn btn-sm btn-outline-danger rounded-pill"
                                                        onclick="confirmarEliminar(<?php echo $cliente->id; ?>)" disabled>
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                <?php endif; ?>
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

    <!-- Client Modal -->
    <div class="modal fade" id="clientModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form id="clientForm" class="needs-validation" novalidate method="post"
                action="../modelo/modelo.php?opcion=10">
                <div class="modal-content rounded-4">
                    <div class="modal-header">
                        <h5 class="modal-title">Agregar Nuevo Cliente</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row g-4">
                            <input type="hidden" id="cliente_id" name="id">
                            <div class="col-md-6">
                                <label for="nombre_usuario" class="form-label fw-semibold">Nombre de Usuario <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control shadow-sm" name="nombre_usuario" required>
                                <div class="invalid-feedback nombre-error">Solo se permiten letras y espacios.</div>
                            </div>
                            <div class="col-md-6">
                                <label for="fecha_nacimiento" class="form-label fw-semibold">Fecha de Nacimiento <span
                                        class="text-danger">*</span></label>
                                <input type="date" class="form-control shadow-sm" id="fecha_nacimiento"
                                    name="fecha_nacimiento" required>
                                <div class="invalid-feedback" id="fecha-error">Debe ser mayor de 18 años.</div>
                            </div>
                            <div class="col-md-6">
                                <label for="tipo_documento" class="form-label fw-semibold">Tipo de Documento <span
                                        class="text-danger">*</span></label>
                                <select class="form-select shadow-sm" id="tipo_documento" name="tipo_documento"
                                    required>
                                    <option selected disabled value="">Seleccione...</option>
                                    <option value="CC">Cédula de Ciudadanía</option>
                                    <option value="TI">Tarjeta de Identidad</option>
                                    <option value="CE">Cédula de Extranjería</option>
                                    <option value="PA">Pasaporte</option>
                                </select>
                                <div class="invalid-feedback">Ingrese un número válido según el tipo de documento.</div>
                            </div>
                            <div class="col-md-6">
                                <label for="numero_documento" class="form-label fw-semibold">Número de Documento <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control shadow-sm" id="numero_documento"
                                    name="numero_documento" required maxlength="10" placeholder="Ej: 1012345678">
                                <div class="invalid-feedback" id="documento-error">Ingrese un número de documento
                                    válido.</div>
                            </div>
                            <div class="col-md-6">
                                <label for="nombre" class="form-label fw-semibold">Nombre <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control shadow-sm" name="nombre"
                                    pattern="^[A-Za-z\u00C0-\u00FF\s]+$" title="Solo se permiten letras y espacios"
                                    required>
                                <div class="invalid-feedback nombre-error">Solo se permiten letras y espacios.</div>
                            </div>
                            <div class="col-md-6">
                                <label for="apellido" class="form-label fw-semibold">Apellido <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control shadow-sm" name="apellido"
                                    pattern="^[A-Za-z\u00C0-\u00FF\s]+$" title="Solo se permiten letras y espacios"
                                    required>
                                <div class="invalid-feedback nombre-error">Solo se permiten letras y espacios.</div>
                            </div>
                            <div class="col-md-6">
                                <label for="correo" class="form-label fw-semibold">Correo <span
                                        class="text-danger">*</span></label>
                                <input type="email" class="form-control shadow-sm" id="correo" name="correo" required>
                                <div class="invalid-feedback">Ingrese un correo válido.</div>
                            </div>
                            <div class="col-md-6">
                                <label for="celular" class="form-label fw-semibold">Celular <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control shadow-sm" name="celular"
                                    title="Ingrese un número válido de 10 dígitos sin letras" required maxlength="10">
                                <div class="invalid-feedback nombre-error">Debe contener exactamente 10 dígitos
                                    numéricos.</div>
                            </div>
                            <div class="col-md-6">
                                <label for="rol" class="form-label fw-semibold">Rol <span
                                        class="text-danger">*</span></label>
                                <select class="form-select shadow-sm" id="rol" name="rol" required>
                                    <option selected disabled value="">Seleccione el rol</option>
                                    <option value="cliente">Usuario</option>
                                    <option value="admin">Admin</option>
                                </select>
                                <div class="invalid-feedback">Seleccione un rol.</div>
                            </div>
                            <div class="col-sm-6">
                                <label for="contra" class="form-label">Contraseña</label>
                                <input type="password" class="form-control" id="contra" name="contra" minlength="6"
                                    maxlength="8" required placeholder="Mínimo 8 caracteres" max>
                                <div class="invalid-feedback">La contraseña debe tener al menos 6 caracteres.</div>
                            </div>
                            <input type="text" name="estado" value="A" hidden>
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

    <!-- Modal Editar Cliente -->
    <div class="modal fade" id="alojamientoEdit" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form id="editForm" class="needs-validation" novalidate method="post"
                action="../modelo/modelo.php?opcion=11">
                <div class="modal-content rounded-4">
                    <div class="modal-header">
                        <h5 class="modal-title">Editar Cliente</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="edit_id" name="id">
                        <div class="row g-4">
                            <div class="col-md-6">
                                <label for="edit_nombre_usuario" class="form-label fw-semibold">Nombre de
                                    Usuario</label>
                                <input type="text" class="form-control shadow-sm" id="edit_nombre_usuario"
                                    name="nombre_usuario" required>
                                <div class="invalid-feedback nombre-error">Solo se permiten letras y espacios.</div>
                            </div>
                            <div class="col-md-6">
                                <label for="edit_fecha_nacimiento" class="form-label fw-semibold">Fecha de
                                    Nacimiento</label>
                                <input type="date" class="form-control shadow-sm" id="edit_fecha_nacimiento"
                                    name="fecha_nacimiento" required>
                                <div class="invalid-feedback" id="fecha-error">Debe ser mayor de 18 años.</div>
                            </div>
                            <div class="col-md-6">
                                <label for="edit_tipo_documento" class="form-label fw-semibold">Tipo de
                                    Documento</label>
                                <select class="form-select shadow-sm" id="edit_tipo_documento" name="tipo_documento"
                                    required>
                                    <option selected disabled value="">Seleccione...</option>
                                    <option value="CC">Cédula de Ciudadanía</option>
                                    <option value="TI">Tarjeta de Identidad</option>
                                    <option value="CE">Cédula de Extranjería</option>
                                    <option value="PA">Pasaporte</option>
                                </select>
                                <div class="invalid-feedback">Seleccione un tipo de documento válido.</div>
                            </div>
                            <div class="col-md-6">
                                <label for="edit_numero_documento" class="form-label fw-semibold">Número de
                                    Documento</label>
                                <input type="text" class="form-control shadow-sm" id="edit_numero_documento"
                                    name="numero_documento" maxlength="10" required>
                                <div class="invalid-feedback" id="documento-error">Ingrese un número de documento
                                    válido.</div>
                            </div>
                            <div class="col-md-6">
                                <label for="edit_nombre" class="form-label fw-semibold">Nombre</label>
                                <input type="text" class="form-control shadow-sm" id="edit_nombre" name="nombre"
                                    required>
                                <div class="invalid-feedback nombre-error">Solo se permiten letras y espacios.</div>
                            </div>
                            <div class="col-md-6">
                                <label for="edit_apellido" class="form-label fw-semibold">Apellido</label>
                                <input type="text" class="form-control shadow-sm" id="edit_apellido" name="apellido"
                                    required>
                                <div class="invalid-feedback nombre-error">Solo se permiten letras y espacios.</div>
                            </div>
                            <div class="col-md-6">
                                <label for="edit_correo" class="form-label fw-semibold">Correo</label>
                                <input type="email" class="form-control shadow-sm" id="edit_correo" name="correo"
                                    required>
                                <div class="invalid-feedback">Ingrese un correo válido.</div>
                            </div>
                            <div class="col-md-6">
                                <label for="edit_celular" class="form-label fw-semibold">Celular</label>
                                <input type="text" class="form-control shadow-sm" id="edit_celular" name="celular"
                                    required maxlength="10">
                                <div class="invalid-feedback nombre-error">Debe contener exactamente 10 dígitos
                                    numéricos.</div>
                            </div>
                            <div class="col-md-6">
                                <label for="edit_rol" class="form-label fw-semibold">Rol</label>
                                <select class="form-select shadow-sm" id="edit_rol" name="rol" required>
                                    <option selected disabled value="">Seleccione el rol</option>
                                    <option value="usuario">Usuario</option>
                                    <option value="admin">Admin</option>
                                </select>
                                <div class="invalid-feedback">Seleccione un rol.</div>
                            </div>

                            <div class="col-md-6 mx-auto justify-content-center">
                                <label for="edit_activo" class="form-label fw-semibold">Estado</label>
                                <select class="form-select shadow-sm" id="edit_activo" name="estado" required>
                                    <option value="A">Activo</option>
                                    <option value="I">Inactivo</option>
                                </select>
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

    <!-- Modal Eliminar Cliente -->
    <div class="modal fade" id="modalEliminar" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form id="formEliminar" method="post" action="../modelo/modelo.php?opcion=12">
                <input type="hidden" name="id" id="idEliminar">
                <div class="modal-content rounded-4">
                    <div class="modal-header bg-danger text-white">
                        <h5 class="modal-title">Confirmar Eliminación</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                            aria-label="Cerrar"></button>
                    </div>
                    <div class="modal-body text-center">
                        <p>¿Estás seguro de que deseas eliminar este cliente?</p>
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
    <!-- Tu JS de validación y utilidades aquí -->

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const form = document.getElementById("clientForm");

            const campos = {
                nombre_usuario: {
                    input: form["nombre_usuario"],
                    validar: (valor) => valor.trim() !== '',
                    mensaje: "El nombre de usuario es obligatorio."
                },
                nombre: {
                    input: form["nombre"],
                    validar: (valor) => /^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/.test(valor),
                    mensaje: "Solo se permiten letras y espacios."
                },
                apellido: {
                    input: form["apellido"],
                    validar: (valor) => /^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/.test(valor),
                    mensaje: "Solo se permiten letras y espacios."
                },
                correo: {
                    input: form["correo"],
                    validar: (valor) => /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(valor),
                    mensaje: "Ingrese un correo válido."
                },
                contra: {
                    input: form["contra"],
                    validar: (valor) => /^[A-Z][A-Za-z0-9]{5,39}$/.test(valor),
                    mensaje: "Debe comenzar con mayúscula y tener al menos 8 caracteres."
                },
                celular: {
                    input: form["celular"],
                    validar: (valor) => /^\d{10}$/.test(valor),
                    mensaje: "Debe contener exactamente 10 dígitos numéricos."
                },
                fecha_nacimiento: {
                    input: form["fecha_nacimiento"],
                    validar: (valor) => {
                        const fecha = new Date(valor);
                        const hoy = new Date();
                        const edad = hoy.getFullYear() - fecha.getFullYear();
                        const mes = hoy.getMonth() - fecha.getMonth();
                        const dia = hoy.getDate() - fecha.getDate();
                        return (
                            valor &&
                            (edad > 18 || (edad === 18 && (mes > 0 || (mes === 0 && dia >= 0))))
                        );
                    },
                    mensaje: "Debe ser mayor de 18 años."
                },
                tipo_documento: {
                    input: form["tipo_documento"],
                    validar: (valor) => valor !== '',
                    mensaje: "Seleccione un tipo de documento."
                },
                numero_documento: {
                    input: form["numero_documento"],
                    validar: () => true, // se valida más abajo según tipo
                    mensaje: "Ingrese un número de documento válido."
                },
                rol: {
                    input: form["rol"],
                    validar: (valor) => valor !== '',
                    mensaje: "Seleccione un rol."
                }
            };

            // Asignar eventos en tiempo real a los campos
            Object.entries(campos).forEach(([key, { input, validar, mensaje }]) => {
                input.addEventListener("input", () => {
                    const valor = input.value.trim();
                    if (!validar(valor)) {
                        input.classList.add("is-invalid");
                        input.nextElementSibling.textContent = mensaje;
                    } else {
                        input.classList.remove("is-invalid");
                    }
                });

                if (input.tagName === "SELECT" || input.type === "date") {
                    input.addEventListener("change", () => {
                        const valor = input.value.trim();
                        if (!validar(valor)) {
                            input.classList.add("is-invalid");
                            input.nextElementSibling.textContent = mensaje;
                        } else {
                            input.classList.remove("is-invalid");
                        }
                    });
                }
            });

            // Validación dinámica del campo número_documento según tipo_documento
            const tipoDoc = form["tipo_documento"];
            const numDoc = form["numero_documento"];

            tipoDoc.addEventListener("change", () => {
                const tipo = tipoDoc.value;
                numDoc.value = '';
                numDoc.classList.remove("is-invalid");

                switch (tipo) {
                    case "CC":
                    case "TI":
                    case "CE":
                        numDoc.setAttribute("maxlength", "10");
                        numDoc.setAttribute("pattern", "\\d{6,10}");
                        numDoc.setAttribute("placeholder", "Ej: 1012345678");
                        break;
                    case "PA":
                        numDoc.setAttribute("maxlength", "12");
                        numDoc.setAttribute("pattern", "[A-Za-z0-9]{6,12}");
                        numDoc.setAttribute("placeholder", "Ej: A123456B78");
                        break;
                    default:
                        numDoc.removeAttribute("maxlength");
                        numDoc.removeAttribute("pattern");
                        numDoc.removeAttribute("placeholder");
                }
            });

            numDoc.addEventListener("input", () => {
                const tipo = tipoDoc.value;
                const valor = numDoc.value.trim();
                let valido = true;
                let mensaje = "";

                if (tipo === "CC" || tipo === "TI" || tipo === "CE") {
                    valido = /^\d{6,10}$/.test(valor);
                    mensaje = "Debe tener entre 6 y 10 dígitos numéricos.";
                } else if (tipo === "PA") {
                    valido = /^[A-Za-z0-9]{6,12}$/.test(valor);
                    mensaje = "Debe tener entre 6 y 12 caracteres alfanuméricos.";
                } else {
                    valido = false;
                    mensaje = "Seleccione un tipo de documento.";
                }

                if (!valido) {
                    numDoc.classList.add("is-invalid");
                    document.getElementById("documento-error").textContent = mensaje;
                } else {
                    numDoc.classList.remove("is-invalid");
                }
            });

            // Validación final antes de enviar
            form.addEventListener("submit", function (event) {
                let valid = true;

                Object.entries(campos).forEach(([key, { input, validar, mensaje }]) => {
                    const valor = input.value.trim();
                    if (!validar(valor)) {
                        input.classList.add("is-invalid");
                        input.nextElementSibling.textContent = mensaje;
                        valid = false;
                    }
                });

                // Número de documento según tipo
                const tipo = tipoDoc.value;
                const valorDoc = numDoc.value.trim();
                if ((tipo === "CC" || tipo === "TI" || tipo === "CE") && !/^\d{6,10}$/.test(valorDoc)) {
                    numDoc.classList.add("is-invalid");
                    document.getElementById("documento-error").textContent = "Debe tener entre 6 y 10 dígitos numéricos.";
                    valid = false;
                } else if (tipo === "PA" && !/^[A-Za-z0-9]{6,12}$/.test(valorDoc)) {
                    numDoc.classList.add("is-invalid");
                    document.getElementById("documento-error").textContent = "Debe tener entre 6 y 12 caracteres alfanuméricos.";
                    valid = false;
                }

                if (!valid) {
                    event.preventDefault();
                    event.stopPropagation();
                }
            });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const form = document.getElementById("editForm");

            const campos = {
                nombre_usuario: {
                    input: form["nombre_usuario"],
                    validar: (valor) => valor.trim() !== '',
                    mensaje: "El nombre de usuario es obligatorio."
                },
                nombre: {
                    input: form["nombre"],
                    validar: (valor) => /^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/.test(valor),
                    mensaje: "Solo se permiten letras y espacios."
                },
                apellido: {
                    input: form["apellido"],
                    validar: (valor) => /^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/.test(valor),
                    mensaje: "Solo se permiten letras y espacios."
                },
                correo: {
                    input: form["correo"],
                    validar: (valor) => /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(valor),
                    mensaje: "Ingrese un correo válido."
                },
                celular: {
                    input: form["celular"],
                    validar: (valor) => /^\d{10}$/.test(valor),
                    mensaje: "Debe contener exactamente 10 dígitos numéricos."
                },
                fecha_nacimiento: {
                    input: form["fecha_nacimiento"],
                    validar: (valor) => {
                        const fecha = new Date(valor);
                        const hoy = new Date();
                        const edad = hoy.getFullYear() - fecha.getFullYear();
                        const mes = hoy.getMonth() - fecha.getMonth();
                        const dia = hoy.getDate() - fecha.getDate();
                        return (
                            valor &&
                            (edad > 18 || (edad === 18 && (mes > 0 || (mes === 0 && dia >= 0))))
                        );
                    },
                    mensaje: "Debe ser mayor de 18 años."
                },
                tipo_documento: {
                    input: form["tipo_documento"],
                    validar: (valor) => valor !== '',
                    mensaje: "Seleccione un tipo de documento."
                },
                numero_documento: {
                    input: form["numero_documento"],
                    validar: () => true, // validado dinámicamente
                    mensaje: "Ingrese un número de documento válido."
                },
                rol: {
                    input: form["rol"],
                    validar: (valor) => valor !== '',
                    mensaje: "Seleccione un rol."
                }
            };

            Object.entries(campos).forEach(([key, { input, validar, mensaje }]) => {
                input.addEventListener("input", () => {
                    const valor = input.value.trim();
                    if (!validar(valor)) {
                        input.classList.add("is-invalid");
                        input.nextElementSibling.textContent = mensaje;
                    } else {
                        input.classList.remove("is-invalid");
                    }
                });

                if (input.tagName === "SELECT" || input.type === "date") {
                    input.addEventListener("change", () => {
                        const valor = input.value.trim();
                        if (!validar(valor)) {
                            input.classList.add("is-invalid");
                            input.nextElementSibling.textContent = mensaje;
                        } else {
                            input.classList.remove("is-invalid");
                        }
                    });
                }
            });

            const tipoDoc = form["tipo_documento"];
            const numDoc = form["numero_documento"];

            tipoDoc.addEventListener("change", () => {
                const tipo = tipoDoc.value;
                numDoc.value = '';
                numDoc.classList.remove("is-invalid");

                switch (tipo) {
                    case "CC":
                    case "TI":
                    case "CE":
                        numDoc.setAttribute("maxlength", "10");
                        numDoc.setAttribute("pattern", "\\d{6,10}");
                        numDoc.setAttribute("placeholder", "Ej: 1012345678");
                        break;
                    case "PA":
                        numDoc.setAttribute("maxlength", "12");
                        numDoc.setAttribute("pattern", "[A-Za-z0-9]{6,12}");
                        numDoc.setAttribute("placeholder", "Ej: A123456B78");
                        break;
                    default:
                        numDoc.removeAttribute("maxlength");
                        numDoc.removeAttribute("pattern");
                        numDoc.removeAttribute("placeholder");
                }
            });

            numDoc.addEventListener("input", () => {
                const tipo = tipoDoc.value;
                const valor = numDoc.value.trim();
                let valido = true;
                let mensaje = "";

                if (tipo === "CC" || tipo === "TI" || tipo === "CE") {
                    valido = /^\d{6,10}$/.test(valor);
                    mensaje = "Debe tener entre 6 y 10 dígitos numéricos.";
                } else if (tipo === "PA") {
                    valido = /^[A-Za-z0-9]{6,12}$/.test(valor);
                    mensaje = "Debe tener entre 6 y 12 caracteres alfanuméricos.";
                } else {
                    valido = false;
                    mensaje = "Seleccione un tipo de documento.";
                }

                if (!valido) {
                    numDoc.classList.add("is-invalid");
                    document.getElementById("documento-error").textContent = mensaje;
                } else {
                    numDoc.classList.remove("is-invalid");
                }
            });

            form.addEventListener("submit", function (event) {
                let valid = true;

                Object.entries(campos).forEach(([key, { input, validar, mensaje }]) => {
                    const valor = input.value.trim();
                    if (!validar(valor)) {
                        input.classList.add("is-invalid");
                        input.nextElementSibling.textContent = mensaje;
                        valid = false;
                    }
                });

                const tipo = tipoDoc.value;
                const valorDoc = numDoc.value.trim();
                if ((tipo === "CC" || tipo === "TI" || tipo === "CE") && !/^\d{6,10}$/.test(valorDoc)) {
                    numDoc.classList.add("is-invalid");
                    document.getElementById("documento-error").textContent = "Debe tener entre 6 y 10 dígitos numéricos.";
                    valid = false;
                } else if (tipo === "PA" && !/^[A-Za-z0-9]{6,12}$/.test(valorDoc)) {
                    numDoc.classList.add("is-invalid");
                    document.getElementById("documento-error").textContent = "Debe tener entre 6 y 12 caracteres alfanuméricos.";
                    valid = false;
                }

                if (!valid) {
                    event.preventDefault();
                    event.stopPropagation();
                }
            });
        });
    </script>

    <script>
        window.addEventListener("DOMContentLoaded", function () {
            const fechaNacimientoInput = document.getElementById("edit_fecha_nacimiento");
            const hoy = new Date();
            const fechaMaxima = new Date(hoy.getFullYear() - 18, hoy.getMonth(), hoy.getDate());
            const yyyy = fechaMaxima.getFullYear();
            const mm = String(fechaMaxima.getMonth() + 1).padStart(2, '0');
            const dd = String(fechaMaxima.getDate()).padStart(2, '0');
            const fechaFormateada = `${yyyy}-${mm}-${dd}`;
            fechaNacimientoInput.max = fechaFormateada;
        });
    </script>

    <script>
        window.addEventListener("DOMContentLoaded", function () {
            const fechaNacimientoInput = document.getElementById("fecha_nacimiento");
            const hoy = new Date();
            const fechaMaxima = new Date(hoy.getFullYear() - 18, hoy.getMonth(), hoy.getDate());
            const yyyy = fechaMaxima.getFullYear();
            const mm = String(fechaMaxima.getMonth() + 1).padStart(2, '0');
            const dd = String(fechaMaxima.getDate()).padStart(2, '0');
            const fechaFormateada = `${yyyy}-${mm}-${dd}`;
            fechaNacimientoInput.max = fechaFormateada;
        });
    </script>

    <script>
        function confirmarEliminar(id) {
            document.getElementById('idEliminar').value = id;
            var modal = new bootstrap.Modal(document.getElementById('modalEliminar'));
            modal.show();
        }
        function cargarDatosEditar(cliente) {
            document.getElementById('edit_id').value = cliente.id;
            document.getElementById('edit_nombre_usuario').value = cliente.nombre_usuario;
            document.getElementById('edit_fecha_nacimiento').value = cliente.fecha_nacimiento;
            document.getElementById('edit_tipo_documento').value = cliente.tipo_documento;
            document.getElementById('edit_numero_documento').value = cliente.numero_documento;
            document.getElementById('edit_nombre').value = cliente.nombre;
            document.getElementById('edit_apellido').value = cliente.apellido;
            document.getElementById('edit_correo').value = cliente.correo;
            document.getElementById('edit_celular').value = cliente.celular;
            document.getElementById('edit_rol').value = cliente.rol;
            document.getElementById('edit_activo').value = cliente.estado;
            document.querySelectorAll('#editForm input, #editForm textarea, #editForm select').forEach(el => {
                el.classList.remove('is-invalid');
            });
            new bootstrap.Modal(document.getElementById('alojamientoEdit')).show();
        }
    </script>
</body>

</html>