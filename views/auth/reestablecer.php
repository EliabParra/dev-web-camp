<main class="auth">
    <h2 class="auth__heading"><?= $titulo ?></h2>
    <p class="auth__subtitle">Coloca tu nueva contraseña</p>

    <?php require_once __DIR__ . '/../templates/alertas.php' ?>

    <?php if ($token_valido) { ?>
        <form method="POST" class="form">
            <div class="form__campo">
                <label for="password" class="form__label">Nueva Contraseña</label>
                <input type="password" name="password" id="password" class="form__input" placeholder="Tu Nueva Contraseña">
            </div>

            <input type="submit" class="form__submit" value="Guardar">
        </form>
    <?php } ?>

    <div class="acciones">
        <a href="/login" class="acciones__link">¿Ya tienes una cuenta? Inicia Sesión</a>
        <a href="/registro" class="acciones__link">¿Aún no tienes una cuenta? Regístrate</a>
    </div>
</main>