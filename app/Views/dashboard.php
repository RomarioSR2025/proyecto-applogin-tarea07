<?= $this->extend('layouts/main') ?>
<?= $this->section('title') ?>Dashboard<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow border-0">
            <div class="card-header bg-dark text-white">
                <h4 class="mb-0">Bienvenido, <?= esc(session('username')) ?> 🎉</h4>
            </div>
            <div class="card-body p-4">
                <p><strong>Email:</strong> <?= esc(session('email')) ?></p>

                <?php if (session('avatar')): ?>
                    <p><img src="<?= base_url(session('avatar')) ?>" width="120" class="rounded-circle border"></p>
                <?php endif ?>

                <a href="<?= base_url('logout') ?>" class="btn btn-danger">Cerrar Sesión</a>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
