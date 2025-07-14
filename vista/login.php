<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/login.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold text-primary" href="../index.php">
                <i class="fas fa-paper-plane me-2"></i>Viajes Plus
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active fw-medium" href="../index.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-medium" href="#">Destinos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-medium" href="#">Ofertas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-medium" href="#">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-medium" href="#">Contacto</a>
                    </li>
            </div>
        </div>
    </nav>
    <?php if (isset($_GET['registro']) && $_GET['registro'] === 'actualizar'): ?>
    <div class="d-flex justify-content-center mt-4">
        <div class="alert alert-success alert-dismissible fade show text-center shadow" role="alert"
            style="max-width: 500px; width: 100%;">
            ¡Contraseña actualizado con exito!
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
    <?php if (isset($_GET['registro']) && $_GET['registro'] === 'usuario'): ?>
    <div class="d-flex justify-content-center mt-4">
        <div class="alert alert-success alert-dismissible fade show text-center shadow" role="alert"
            style="max-width: 500px; width: 100%;">
            ¡Usuario registrado con exitoso!
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
    
    <?php if (isset($_GET['registro']) && $_GET['registro'] === 'exito'): ?>
    <div class="d-flex justify-content-center mt-4">
        <div class="alert alert-success alert-dismissible fade show text-center shadow" role="alert"
            style="max-width: 500px; width: 100%;">
            📧 ¡Te hemos enviado un enlace a tu correo para restablecer tu contraseña!
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
    <?php if (isset($_GET['registro']) && $_GET['registro'] === 'error'): ?>
    <div class="d-flex justify-content-center mt-4">
        <div class="alert alert-danger alert-dismissible fade show text-center shadow" role="alert"
            style="max-width: 500px; width: 100%;">
            ¡Usuario y/o contraseña incorrectos!
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

    <br><br><br><br>
    <div class="text-center">
        <main class="form-signin m-auto" style="max-width: 330px;">
            <form action="../modelo/modelo.php?opcion=2" method="post">
                <img class="mb-4" src="../img/descarga.png" alt="Logo Viajes Plus" width="100" height="97">
                <h1 class="h3 mb-3 fw-normal">Viajes Plus</h1>

                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="correo" name="correo" placeholder="nombre@ejemplo.com"
                        required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
                    <label for="correo">Correo electrónico</label>
                    <div class="form-text text-danger d-none" id="emailHelp">
                        Formato de correo inválido. Ejemplo: "usuario@dominio.com"
                    </div>
                </div>

                <div class="form-floating mb-3">
                    <div class="input-group">
                        <input type="password" class="form-control" id="contra" name="contra" placeholder="Contraseña"
                            required pattern="(?=.*[A-Z])(?=.*\d).{8}" maxlength="8"
                            title="La contraseña debe tener al menos 8 caracteres, una mayúscula y un número.">
                        <span class="input-group-text toggle-password" id="togglePassword">
                            <i class="fa fa-eye fa-lg"></i>
                        </span>
                    </div>
                    <div class="form-text text-danger d-none" id="passwordHelp">
                        La contraseña debe tener al menos 8 caracteres, una mayúscula y un número.
                    </div>
                </div>

                <button type="submit" class="w-100 btn btn-primary mb-2">Iniciar Sesión</button>
            </form>
            <a href="../vista/registrar.php" class="w-100 btn btn-outline-primary mb-3">Registrarse</a>

            <div>
                <a href="./olvidar.html" class="text-decoration-none">¿Olvidaste tu contraseña?</a>
            </div>

            <p class="mt-5 mb-3 text-muted">© 2025</p>
        </main>
    </div>


</body>
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
    document.getElementById('correo').addEventListener('input', function () {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        const helpText = document.getElementById('emailHelp');
        if (!emailRegex.test(this.value)) {
            helpText.classList.remove('d-none');
        } else {
            helpText.classList.add('d-none');
        }
    });
</script>

</html>