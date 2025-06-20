<main class="auth">
    <h2 class="auth__heading"><?= $titulo ?></h2>
    <p class="auth__subtitle">Inicia Sesión en DevWebCamp</p>

    <?php require_once __DIR__ . '/../templates/alertas.php' ?>

    <form method="POST" action="/login" class="form">
        <div class="form__campo">
            <label for="email" class="form__label">Email</label>
            <input type="email" name="email" id="email" class="form__input" placeholder="Tu Email" value="<?= $usuario->email ?>">
        </div>

        <div class="form__campo">
            <label for="password" class="form__label">Contraseña</label>
            <input type="password" name="password" id="password" class="form__input" placeholder="Tu Contraseña">
        </div>

        <input type="submit" class="form__submit" value="Iniciar Sesión">
    </form>

    <div class="acciones">
        <a href="/registro" class="acciones__link">¿Aún no tienes una cuenta? Regístrate</a>
        <a href="/olvide" class="acciones__link">¿Olvidaste tu contraseña? Recuperar</a>
    </div>
</main>