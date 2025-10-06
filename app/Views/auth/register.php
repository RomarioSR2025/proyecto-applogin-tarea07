<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h3>Registro</h3>
                </div>
                <div class="card-body">

                    <!-- Errores -->
                    <?php if (session()->getFlashdata('errors')): ?>
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                <?php foreach(session()->getFlashdata('errors') as $error): ?>
                                    <li><?= esc($error) ?></li>
                                <?php endforeach ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <!-- Formulario -->
                    <form action="<?= base_url('store') ?>" method="post" enctype="multipart/form-data">

                        <div class="mb-3">
                            <label class="form-label">Nombre</label>
                            <input type="text" name="username" value="<?= old('username') ?>" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Correo</label>
                            <input type="email" name="email" value="<?= old('email') ?>" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Contraseña</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Avatar (opcional)</label>
                            <input type="file" name="avatar" class="form-control" accept="image/*">
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-success">Registrarse</button>
                        </div>
                    </form>

                </div>
                <div class="card-footer text-center">
                    <a href="<?= base_url('login') ?>" class="btn btn-link">¿Ya tienes cuenta? Inicia sesión</a>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
