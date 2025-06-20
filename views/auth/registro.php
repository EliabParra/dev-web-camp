<main class="auth">
    <h2 class="auth__heading"><?= $titulo ?></h2>
    <p class="auth__subtitle">Registrate en DevWebCamp</p>

    <?php require_once __DIR__ . '/../templates/alertas.php' ?>

    <form method="POST" action="/registro" class="form">
        <div class="form__campo">
            <label for="nombre" class="form__label">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form__input" placeholder="Tu Nombre" value="<?= $usuario->nombre ?>">
        </div>

        <div class="form__campo">
            <label for="apellido" class="form__label">Apellido</label>
            <input type="text" name="apellido" id="apellido" class="form__input" placeholder="Tu Apellido" value="<?= $usuario->apellido ?>">
        </div>

        <div class="form__campo">
            <label for="email" class="form__label">Email</label>
            <input type="email" name="email" id="email" class="form__input" placeholder="Tu Email" value="<?= $usuario->email ?>">
        </div>

        <div class="form__campo">
            <label for="password" class="form__label">Contraseña</label>
            <input type="password" name="password" id="password" class="form__input" placeholder="Tu Contraseña">
        </div>

        <div class="form__campo">
            <label for="password2" class="form__label">Repetir Contraseña</label>
            <input type="password" name="password2" id="password2" class="form__input" placeholder="Confirma tu Contraseña">
        </div>

        <input type="submit" class="form__submit" value="Crear Cuenta">
    </form>

    <div class="acciones">
        <a href="/login" class="acciones__link">¿Ya tienes una cuenta? Inicia Sesión</a>
        <a href="/olvide" class="acciones__link">¿Olvidaste tu contraseña? Recuperar</a>
    </div>
</main>