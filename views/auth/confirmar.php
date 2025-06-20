<main class="auth">
    <h2 class="auth__heading"><?= $titulo ?></h2>
    <p class="auth__subtitle">Tu cuenta DevWebCamp</p>
    <?php require_once __DIR__ . '/../templates/alertas.php' ?>

    <?php if (isset($alertas['exito'])) { ?>
        <div class="acciones--boton">
            <a href="/login" class="acciones--boton__link">Iniciar Sesión</a>
        </div>
    <?php } ?>
</main>