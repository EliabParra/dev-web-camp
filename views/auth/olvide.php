<main class="auth">
    <h2 class="auth__heading"><?= $titulo ?></h2>
    <p class="auth__subtitle">Recupera tu acceso a DevWebCamp</p>

    <?php require_once __DIR__ . '/../templates/alertas.php' ?>

    <form method="POST" action="/olvide" class="form">
        <div class="form__campo">
            <label for="email" class="form__label">Email</label>
            <input type="email" name="email" id="email" class="form__input" placeholder="Tu Email">
        </div>

        <input type="submit" class="form__submit" value="Enviar Instrucciones">
    </form>

    <div class="acciones">
        <a href="/login" class="acciones__link">¿Ya tienes una cuenta? Inicia Sesión</a>
        <a href="/registro" class="acciones__link">¿Aún no tienes una cuenta? Regístrate</a>
    </div>
</main>