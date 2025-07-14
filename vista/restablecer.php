<?php
include '../conexion/conexion.php';

$token = $_GET['token'] ?? '';

$query = mysqli_query($conexion, "SELECT id FROM clientes WHERE token_recuperacion='$token' AND token_expira > NOW()");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Restablecer contraseña</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body class="bg-light d-flex align-items-center justify-content-center vh-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card shadow border-0">
                    <div class="card-body">
                        <h4 class="card-title mb-4 text-center">Restablecer contraseña</h4>
                        <?php if (mysqli_num_rows($query) == 1): ?>
                            <form action="../modelo/modelo.php?opcion=21" method="POST">
                                <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">
                                <div class="mb-3">
                                    <label for="nueva_contra" class="form-label">Nueva contraseña</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="nueva_contra" name="nueva_contra"
                                            pattern="(?=.*[A-Z])(?=.*\d).{8}" maxlength="8" required
                                            title="La contraseña debe tener al menos 8 caracteres, una mayúscula y un número."
                                            aria-describedby="togglePassword">
                                        <button class="btn btn-outline-secondary" type="button" id="togglePassword"
                                            tabindex="-1">
                                            <i class="fa fa-eye fa-lg"></i>
                                        </button>
                                    </div>
                                    <div class="form-text text-danger d-none" id="passwordHelp">
                                        La contraseña debe tener al menos 8 caracteres, una mayúscula y un número.
                                    </div>
                                </div>

                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary">Actualizar contraseña</button>
                                </div>
                            </form>

                            <br>
                            <center><a href="./login.php"><button type="submit"
                                        class="btn btn-primary">Regresar</button></a>
                            </center>
                        <?php else: ?>
                            <div class="alert alert-danger text-center">
                                El enlace es inválido o ha expirado.
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    document.getElementById('nueva_contra').addEventListener('input', function () {
        const passwordRegex = /^(?=.*[A-Z])(?=.*\d).{8}$/;
        const helpText = document.getElementById('passwordHelp');

        if (!passwordRegex.test(this.value)) {
            helpText.classList.remove('d-none');
            helpText.textContent = "La contraseña debe tener al menos 8 caracteres, una mayúscula y un número.";
        } else {
            helpText.classList.add('d-none');
        }
    });

    document.getElementById('togglePassword').addEventListener('click', function () {
        const passwordInput = document.getElementById('nueva_contra');
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

</html>

<?php if (isset($_GET['registro']) && $_GET['registro'] === 'exito'): ?>
    <script>
        window.onload = function () {
            alert("¡Registro exitoso!");
        }
    </script>
<?php endif; ?>