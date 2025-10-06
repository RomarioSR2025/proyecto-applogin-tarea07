<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h3>Iniciar Sesión</h3>
                </div>
                <div class="card-body">

                    
                    <?php if (session()->getFlashdata('error')): ?>
                        <div class="alert alert-danger">
                            <?= session()->getFlashdata('error') ?>
                        </div>
                    <?php endif; ?>

                    <!-- Formulario -->
                    <form action="<?= base_url('auth') ?>" method="post">
                        <div class="mb-3">
                            <label class="form-label">Correo</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Contraseña</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-success">Ingresar</button>
                        </div>
                    </form>

                </div>
                <div class="card-footer text-center">
                    <a href="<?= base_url('register') ?>" class="btn btn-link">¿No tienes cuenta? Regístrate</a>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
