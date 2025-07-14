<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body class="bg-light">

    <div class="container">
        <main>
            <div class="py-5 text-center">
                <img class="mb-4" src="../img/descarga.png" alt="" width="100" height="97">
                <h2>Registro</h2>
                <p class="lead">Bienvenido a Viaje plus.</p>
            </div>
            <div class="col-md-7 col-lg-10 mx-auto">
                <form class="needs-validation" action="../modelo/modelo.php?opcion=1" method="post" novalidate>
                    <div class="row g-2">
                        <!-- Nombre de Usuario -->
                        <div class="col-sm-6">
                            <label for="nombre_usuario" class="form-label">Nombre de Usuario</label>
                            <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario"
                                placeholder="Nombre de usuario" maxlength="100" required>
                            <div class="">
                            </div>
                        </div>

                        <!-- Fecha de Nacimiento -->
                        <div class="col-sm-6">
                            <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
                            <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento"
                                required max="">
                            <div class="invalid-feedback">Debe ser mayor de 18 años.</div>
                        </div>

                        <!-- Tipo de Documento -->
                        <div class="col-sm-6">
                            <label for="tipo_documento" class="form-label">Tipo de documento</label>
                            <select class="form-select" id="tipo_documento" name="tipo_documento" required>
                                <option selected disabled value="">Seleccione...</option>
                                <option value="CC">Cédula de Ciudadanía</option>
                                <option value="TI">Tarjeta de Identidad</option>
                                <option value="CE">Cédula de Extranjería</option>
                                <option value="PA">Pasaporte</option>
                            </select>
                            <div class="invalid-feedback">Seleccione un tipo de documento válido.</div>
                        </div>

                        <!-- Número de Documento -->
                        <div class="col-sm-6">
                            <label for="tipo_documento" class="form-label">Número de documento</label>
                            <input type="text" class="form-control" id="numero_documento" name="numero_documento"
                                placeholder="Número de documento" required>
                            <div id="ayuda_documento" class="form-text text-muted"></div>
                            <div class="invalid-feedback">Ingrese un número válido según el tipo de documento.</div>
                        </div>

                        <!-- Nombre -->
                        <div class="col-sm-6">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre"
                                placeholder="Nombre completo" pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+" maxlength="100"
                                required>
                            <div class="invalid-feedback">Ingrese un nombre válido (solo letras).</div>
                        </div>

                        <!-- Apellido -->
                        <div class="col-sm-6">
                            <label for="apellido" class="form-label">Apellido</label>
                            <input type="text" class="form-control" id="apellido" name="apellido"
                                placeholder="Apellido completo" pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+" maxlength="100"
                                required>
                            <div class="invalid-feedback">Ingrese un apellido válido (solo letras).</div>
                        </div>

                        <div class="col-6">
                            <div id="alert-correo" class="alert alert-danger d-none" role="alert">
                                El correo ya está registrado. Por favor usa otro.
                            </div>
                            <label for="correo" class="form-label">Correo electrónico</label>
                            <input type="email" class="form-control" id="correo" name="correo"
                                placeholder="you@example.com" maxlength="100" required>
                            <div id="correo-feedback" class="invalid-feedback">
                                Coloca un correo válido.
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <label for="contra" class="form-label">Contraseña</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="contra" name="contra"
                                    placeholder="Contraseña" required pattern="(?=.*[A-Z])(?=.*\d).{8}" maxlength="8"
                                    title="La contraseña debe tener al menos 8 caracteres, una mayúscula y un número.">
                                <span class="input-group-text toggle-password" id="togglePassword">
                                    <i class="fa fa-eye fa-lg"></i>
                                </span>
                            </div>
                            <div class="form-text text-danger d-none" id="passwordHelp">
                                La contraseña debe tener al menos 8 caracteres, una mayúscula y un número.
                            </div>
                        </div>

                        <div class="col-6 text-center mx-auto">
                            <label for="celular" class="form-label">Número de celular</label>
                            <input type="tel" class="form-control" id="celular" name="celular" pattern="\d{10}"
                                maxlength="10" required inputmode="numeric" placeholder="Ej: 3001234567"
                                title="Debe contener exactamente 10 dígitos numéricos.">
                            <div class="invalid-feedback">Ingrese un número de celular válido (10 dígitos).</div>
                        </div>

                    </div>

                    <center><button class="btn btn-primary  btn-sm mt-3" type="submit">Registrar</button></center>
                </form>

                <br>
                <center><a href="./login.php"> <button class=" btn btn-lg btn-primary btn-sm">Regresar</button></a>
                </center>
            </div>
    </div>
    </main>
    <footer class="my-1 pt-3 text-muted text-center text-small">
        <p class="mb-1">© 2025 ViajesPlus</p>
    </footer>
    </div>
    <script>
        document.getElementById('contra').addEventListener('input', function () {
            const passwordRegex = /^(?=.*[A-Z])(?=.*\d).{8,}$/;
            const helpText = document.getElementById('passwordHelp');

            if (!passwordRegex.test(this.value)) {
                helpText.classList.remove('d-none');
                helpText.textContent = "La contraseña debe tener al menos 8 caracteres, una mayúscula y un número.";
            } else {
                helpText.classList.add('d-none');
            }
        });
        document.querySelector('.toggle-password').addEventListener('click', function () {
            const passwordInput = document.getElementById('contra');
            const icon = this.querySelector('i');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.replace('fa-eye', 'fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                icon.classList.replace('fa-eye-slash', 'fa-eye');
            }
        });
    </script>

    <script>
        const tipoDocumento = document.getElementById("tipo_documento");
        const numeroDocumento = document.getElementById("numero_documento");
        const ayudaDocumento = document.getElementById("ayuda_documento");

        numeroDocumento.addEventListener("input", function () {
            const tipo = tipoDocumento.value;

            if (tipo === 'CC' || tipo === 'TI' || tipo === 'CE') {
                // Solo números, elimina cualquier letra
                this.value = this.value.replace(/\D/g, '');
            }
            // Para PA no bloqueamos nada porque acepta letras y números
        });

        const reglas = {
            'CC': {
                pattern: '\\d{10}',
                title: 'Debe tener exactamente 10 dígitos numéricos.',
                ayuda: 'Ejemplo: 1234567890 (10 números sin letras)',
                maxLength: 10
            },
            'TI': {
                pattern: '\\d{10}',
                title: 'Debe tener exactamente 10 dígitos numéricos.',
                ayuda: 'Ejemplo: 1098765432 (10 números sin letras)',
                maxLength: 10
            },
            'CE': {
                pattern: '\\d{6,10}',
                title: 'Debe tener entre 6 y 10 dígitos numéricos.',
                ayuda: 'Ejemplo: 123456 o hasta 1234567890',
                maxLength: 10
            },
            'PA': {
                pattern: '[A-Za-z0-9]{6,9}',
                title: 'Debe tener entre 6 y 9 caracteres alfanuméricos.',
                ayuda: 'Ejemplo: AB12345 o A9C7XW0',
                maxLength: 9
            }
        };

        tipoDocumento.addEventListener("change", function () {
            const tipo = tipoDocumento.value;
            if (reglas[tipo]) {
                const regla = reglas[tipo];
                numeroDocumento.pattern = regla.pattern;
                numeroDocumento.title = regla.title;
                numeroDocumento.maxLength = regla.maxLength;
                ayudaDocumento.textContent = regla.ayuda;
            } else {
                numeroDocumento.removeAttribute("pattern");
                numeroDocumento.removeAttribute("title");
                numeroDocumento.removeAttribute("maxlength");
                ayudaDocumento.textContent = '';
            }
        });

        window.addEventListener("DOMContentLoaded", () => {
            tipoDocumento.dispatchEvent(new Event("change"));
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

    <script src="form-validation.js"></script>
    <script>
        (function () {
            'use strict'
            const forms = document.querySelectorAll('.needs-validation')
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }
                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>

</body>

</html>