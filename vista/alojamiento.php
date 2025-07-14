<!DOCTYPE html>
<html lang="es" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ViajesPlus - Gestión de Alojamientos</title>
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
                    <a class="nav-link d-flex align-items-center rounded-pill px-3 py-2 text-white"
                        href="../modelo/modelo.php?opcion=23">
                        <i class="fas fa-calendar-check me-2"></i>
                        <span class="d-none d-lg-inline">Reservas</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center rounded-pill px-3 py-2 text-white bg-primary bg-opacity-75 active"
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
                            <li class="breadcrumb-item active text-white">Alojamientos</li>
                        </ol>
                    </div>
                </div>
            </nav>

            <!-- Main Content Area -->
            <div class="container-fluid py-4 flex-grow-1">
                <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
                    <h1 class="h3 mb-0">Gestión de Alojamientos</h1>
                    <button class="btn btn-primary rounded-pill shadow-sm" id="addAlojamientoBtn" data-bs-toggle="modal"
                        data-bs-target="#alojamientoModal">
                        <i class="fas fa-hotel me-2"></i>Nuevo Alojamiento
                    </button>
                </div>
                <?php if (isset($_GET['registro']) && $_GET['registro'] === 'registrar'): ?>
                    <div class="d-flex justify-content-center mt-4">
                        <div class="alert alert-success alert-dismissible fade show text-center shadow" role="alert"
                            style="max-width: 500px; width: 100%;">
                            ¡El alojamiento se registro!
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
                            ¡Alojamiento eliminado exitosamente!
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
                <?php if (isset($_GET['registro']) && $_GET['registro'] === 'usuario'): ?>
                    <div class="alert alert-warning alert-dismissible fade show text-center shadow mb-3" role="alert">
                        ¡El alojamiento ya está registrado!
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
                <!-- Tabla de Alojamientos -->
                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="table-light text-center">
                                    <tr>
                                        <th>#</th>
                                        <th>Nombre</th>
                                        <th>Calificación</th>
                                        <th>Costo/Noche</th>
                                        <th>Servicio</th>
                                        <th>Zona</th>
                                        <th>Categoría</th>
                                        <th>Imagen</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody id="alojamientosTableBody">
                                    <?php foreach ($arreglo as $alojamiento): ?>
                                        <tr class="text-center">
                                            <td><strong><?php echo $alojamiento->id; ?></strong></td>
                                            <td>
                                                <span title="<?php echo $alojamiento->nombre; ?>">
                                                    <?php echo strlen($alojamiento->nombre) > 25 ? substr($alojamiento->nombre, 0, 25) . '...' : $alojamiento->nombre; ?>
                                                </span>
                                            </td>
                                            <td>
                                                <?php
                                                $estrellas = floor($alojamiento->calificacion);
                                                for ($i = 0; $i < $estrellas; $i++) {
                                                    echo '<i class="fas fa-star text-warning"></i>';
                                                }
                                                for ($i = $estrellas; $i < 5; $i++) {
                                                    echo '<i class="far fa-star text-muted"></i>';
                                                }
                                                ?>
                                                <small
                                                    class="text-muted d-block">(<?php echo $alojamiento->calificacion; ?>)</small>
                                            </td>
                                            <td>
                                                $<?php echo number_format($alojamiento->costo_noche, 0, ',', '.'); ?>
                                            </td>
                                            <td>
                                                <span title="<?php echo $alojamiento->servicio; ?>">
                                                    <?php echo strlen($alojamiento->servicio) > 20 ? substr($alojamiento->servicio, 0, 20) . '...' : $alojamiento->servicio; ?>
                                                </span>
                                            </td>
                                            <td><?php echo $alojamiento->zona; ?></td>
                                            <td><?php echo $alojamiento->categoria; ?></td>
                                            <td>
                                                <img src="<?php echo $alojamiento->img; ?>" alt="Imagen" width="80"
                                                    class="rounded shadow-sm">
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-outline-primary rounded-pill"
                                                    onclick='cargarDatosEditar(<?php echo json_encode($alojamiento); ?>)'>
                                                    <i class="fas fa-pen"></i>
                                                </button>
                                                <button class="btn btn-sm btn-outline-danger rounded-pill"
                                                    onclick="confirmarEliminar(<?php echo $alojamiento->id; ?>)">
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


    <!-- Modal Nuevo Alojamiento -->
    <div class="modal fade" id="alojamientoModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form id="alojamientoForm" class="needs-validation" novalidate method="post"
                action="../modelo/modelo.php?opcion=7" enctype="multipart/form-data">
                <div class="modal-content rounded-4">
                    <div class="modal-header">
                        <h5 class="modal-title">Agregar Nuevo Alojamiento</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row g-4">
                            <input type="hidden" id="alojamiento_id" name="id">
                            <div class="col-md-6">
                                <label for="nombre" class="form-label fw-semibold">Nombre del Alojamiento <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control shadow-sm" id="nombre" name="nombre" required
                                    minlength="3">
                                <div class="invalid-feedback">El nombre debe tener al menos 3 caracteres.</div>
                            </div>
                            <div class="col-md-6">
                                <label for="calificacion" class="form-label fw-semibold">Calificación (1.0 - 5.0) <span
                                        class="text-danger">*</span></label>
                                <input type="number" step="0.1" min="1" max="5" class="form-control shadow-sm"
                                    id="calificacion" name="calificacion" required>
                                <div class="invalid-feedback">La calificación debe estar entre 1.0 y 5.0.</div>
                            </div>
                            <div class="col-md-6">
                                <label for="costo_noche" class="form-label fw-semibold">Costo por Noche (COP) <span
                                        class="text-danger">*</span></label>
                                <input type="number" class="form-control shadow-sm" id="costo_noche" name="costo_noche"
                                    required min="1">
                                <div class="invalid-feedback">El costo debe ser mayor a 0.</div>
                            </div>
                            <div class="col-md-6">
                                <label for="servicio" class="form-label fw-semibold">Servicio <span
                                        class="text-danger">*</span></label>
                                <textarea class="form-control shadow-sm" id="servicio" name="servicio" rows="2" required
                                    minlength="5"></textarea>
                                <div class="invalid-feedback">Describe mejor el servicio ofrecido.</div>
                            </div>
                            <div class="col-md-6">
                                <label for="zona" class="form-label fw-semibold">Zona <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control shadow-sm" id="zona" name="zona" required>
                                <div class="invalid-feedback">La zona es obligatoria.</div>
                            </div>
                            <div class="col-md-6">
                                <label for="categoria" class="form-label fw-semibold">Categoría</label>
                                <select class="form-select shadow-sm" id="categoria" name="categoria" required>
                                    <option selected disabled value="">Seleccione una categoría</option>
                                    <option value="Playa">Playa</option>
                                    <option value="Cultural">Cultural</option>
                                    <option value="Aventura">Aventura</option>
                                    <option value="Relax">Relax</option>
                                    <option value="Ciudad">Ciudad</option>
                                    <option value="Montana">Montana</option>
                                </select>
                                <div class="invalid-feedback">Seleccione una categoría válida.</div>
                            </div>
                            <div class="col-md-6">
                                <label for="img" class="form-label fw-semibold">Imagen del Alojamiento <span
                                        class="text-danger">*</span></label>
                                <input type="file" class="form-control shadow-sm" id="img" name="img" required>
                                <div class="invalid-feedback">Debe seleccionar una imagen del alojamiento.</div>
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

    <!-- Modal Editar Alojamiento -->
    <div class="modal fade" id="alojamientoEdit" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form id="editForm" class="needs-validation" novalidate method="post" action="../modelo/modelo.php?opcion=8"
                enctype="multipart/form-data">
                <div class="modal-content rounded-4">
                    <div class="modal-header">
                        <h5 class="modal-title">Editar Alojamiento</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="edit_id" name="id">
                        <div class="row g-4">
                            <div class="col-md-6">
                                <label for="edit_nombre" class="form-label fw-semibold">Nombre del Alojamiento <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control shadow-sm" id="edit_nombre" name="nombre"
                                    required minlength="3">
                                <div class="invalid-feedback">El nombre debe tener al menos 3 caracteres.</div>
                            </div>
                            <div class="col-md-6">
                                <label for="edit_calificacion" class="form-label fw-semibold">Calificación (1.0 - 5.0)
                                    <span class="text-danger">*</span></label>
                                <input type="number" step="0.1" min="1" max="5" class="form-control shadow-sm"
                                    id="edit_calificacion" name="calificacion" required>
                                <div class="invalid-feedback">La calificación debe estar entre 1.0 y 5.0.</div>
                            </div>
                            <div class="col-md-6">
                                <label for="edit_costo_noche" class="form-label fw-semibold">Costo por Noche (COP) <span
                                        class="text-danger">*</span></label>
                                <input type="number" class="form-control shadow-sm" id="edit_costo_noche"
                                    name="costo_noche" required min="1">
                                <div class="invalid-feedback">El costo debe ser mayor a 0.</div>
                            </div>
                            <div class="col-md-6">
                                <label for="edit_servicio" class="form-label fw-semibold">Servicio <span
                                        class="text-danger">*</span></label>
                                <textarea class="form-control shadow-sm" id="edit_servicio" name="servicio" rows="2"
                                    required minlength="5"></textarea>
                                <div class="invalid-feedback">Describe mejor el servicio ofrecido.</div>
                            </div>
                            <div class="col-md-6">
                                <label for="edit_zona" class="form-label fw-semibold">Zona <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control shadow-sm" id="edit_zona" name="zona" required>
                                <div class="invalid-feedback">La zona es obligatoria.</div>
                            </div>
                            <div class="col-md-6">
                                <label for="edit_categoria" class="form-label fw-semibold">Categoría</label>
                                <select class="form-select shadow-sm" id="edit_categoria" name="categoria" required>
                                    <option selected disabled value="">Seleccione una categoría</option>
                                    <option value="Playa">Playa</option>
                                    <option value="Cultural">Cultural</option>
                                    <option value="Aventura">Aventura</option>
                                    <option value="Relax">Relax</option>
                                    <option value="Ciudad">Ciudad</option>
                                    <option value="Montana">Montana</option>
                                </select>
                                <div class="invalid-feedback">Seleccione una categoría válida.</div>
                            </div>
                            <div class="col-md-6">
                                <label for="edit_img" class="form-label fw-semibold">Imagen del Alojamiento <span
                                        class="text-danger">*</span></label>
                                <input type="file" class="form-control shadow-sm" id="edit_img" name="img">
                                <div class="invalid-feedback">Debe seleccionar una imagen del alojamiento.</div>

                                <div class="mt-2">
                                    <img id="imagen_actual" src="" alt="Imagen actual del alojamiento"
                                        class="img-thumbnail" style="max-height: 200px;">
                                </div>
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

    <div class="modal fade" id="modalEliminar" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form id="formEliminar" method="post" action="../modelo/modelo.php?opcion=31">
                <input type="hidden" name="id" id="idEliminar">
                <div class="modal-content rounded-4">
                    <div class="modal-header bg-danger text-white">
                        <h5 class="modal-title">Confirmar Eliminación</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                            aria-label="Cerrar"></button>
                    </div>
                    <div class="modal-body text-center">
                        <p>¿Estás seguro de que deseas eliminar este alojamiento?</p>
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

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const form = document.getElementById("alojamientoForm");

            const campos = {
                nombre: {
                    input: form["nombre"],
                    validar: (valor) => /^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]{3,}$/.test(valor),
                    mensaje: "El nombre solo debe contener letras y al menos 3 caracteres."
                },
                calificacion: {
                    input: form["calificacion"],
                    validar: (valor) => /^\d+(\.\d)?$/.test(valor) && valor >= 1 && valor <= 5,
                    mensaje: "Ingrese un número entre 1.0 y 5.0 (máximo un decimal)."
                },
                costo_noche: {
                    input: form["costo_noche"],
                    validar: (valor) => /^\d+$/.test(valor) && valor > 0,
                    mensaje: "Ingrese un costo válido mayor a 0."
                },
                servicio: {
                    input: form["servicio"],
                    validar: (valor) => valor.trim().length >= 5,
                    mensaje: "Describe mejor el servicio (mínimo 5 caracteres)."
                },
                zona: {
                    input: form["zona"],
                    validar: (valor) => /^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]{3,}$/.test(valor),
                    mensaje: "La zona solo debe contener letras y tener al menos 3 caracteres."
                },
                categoria: {
                    input: form["categoria"],
                    validar: (valor) => valor !== '',
                    mensaje: "Seleccione una categoría."
                },
                img: {
                    input: form["img"],
                    validar: (valor) => valor !== '',
                    mensaje: "Debe seleccionar una imagen del alojamiento."
                }
            };

            Object.entries(campos).forEach(([key, { input, validar, mensaje }]) => {
                const validarCampo = () => {
                    const valor = input.value.trim();
                    if (!validar(valor)) {
                        input.classList.add("is-invalid");
                        input.nextElementSibling.textContent = mensaje;
                    } else {
                        input.classList.remove("is-invalid");
                    }
                };

                input.addEventListener("input", validarCampo);
                if (input.tagName === "SELECT" || input.type === "file") {
                    input.addEventListener("change", validarCampo);
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
                nombre: {
                    input: form["nombre"],
                    validar: (valor) => /^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]{3,}$/.test(valor),
                    mensaje: "El nombre solo debe contener letras y al menos 3 caracteres."
                },
                calificacion: {
                    input: form["calificacion"],
                    validar: (valor) => /^\d+(\.\d)?$/.test(valor) && valor >= 1 && valor <= 5,
                    mensaje: "Ingrese un número entre 1.0 y 5.0 (máximo un decimal)."
                },
                costo_noche: {
                    input: form["costo_noche"],
                    validar: (valor) => /^\d+$/.test(valor) && valor > 0,
                    mensaje: "Ingrese un costo válido mayor a 0."
                },
                servicio: {
                    input: form["servicio"],
                    validar: (valor) => valor.trim().length >= 5,
                    mensaje: "Describe mejor el servicio (mínimo 5 caracteres)."
                },
                zona: {
                    input: form["zona"],
                    validar: (valor) => /^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]{3,}$/.test(valor),
                    mensaje: "La zona solo debe contener letras y tener al menos 3 caracteres."
                },
                categoria: {
                    input: form["categoria"],
                    validar: (valor) => valor !== '',
                    mensaje: "Seleccione una categoría."
                },
                img: {
                    input: form["img"],
                    validar: (valor) => true, // Opcional: no obligamos la imagen si ya hay una existente
                    mensaje: "Debe seleccionar una imagen válida."
                }
            };

            Object.entries(campos).forEach(([key, { input, validar, mensaje }]) => {
                const validarCampo = () => {
                    const valor = input.value.trim();
                    if (!validar(valor)) {
                        input.classList.add("is-invalid");
                        input.nextElementSibling.textContent = mensaje;
                    } else {
                        input.classList.remove("is-invalid");
                    }
                };

                input.addEventListener("input", validarCampo);
                if (input.tagName === "SELECT" || input.type === "file") {
                    input.addEventListener("change", validarCampo);
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

                if (!valid) {
                    event.preventDefault();
                    event.stopPropagation();
                }
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

    <!-- Bootstrap Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function cargarDatosEditar(alojamiento) {
            document.getElementById('edit_id').value = alojamiento.id;
            document.getElementById('edit_nombre').value = alojamiento.nombre;
            document.getElementById('edit_calificacion').value = alojamiento.calificacion;
            document.getElementById('edit_costo_noche').value = alojamiento.costo_noche;
            document.getElementById('edit_servicio').value = alojamiento.servicio;
            document.getElementById('edit_zona').value = alojamiento.zona;
            document.getElementById('edit_categoria').value = alojamiento.categoria;

            const rutaImagen = `../img/${alojamiento.img}`;
            document.getElementById('imagen_actual').src = rutaImagen;

            // Limpiar errores anteriores
            document.querySelectorAll('#editForm input, #editForm textarea, #editForm select').forEach(el => {
                el.classList.remove('is-invalid');
            });

            new bootstrap.Modal(document.getElementById('alojamientoEdit')).show();
        }
    </script>
</body>

</html>