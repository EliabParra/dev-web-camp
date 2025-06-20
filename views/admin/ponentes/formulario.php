<fieldset class="form__fieldset">
    <legend class="form__legend">Información del Personal</legend>

    <div class="form__campo">
        <label for="nombre" class="form__label">Nombre</label>
        <input 
            type="text" 
            name="nombre" 
            id="nombre" 
            class="form__input" 
            placeholder="Nombre Ponente" 
            value="<?= $ponente->nombre ?? '' ?>"
        >
    </div>

    <div class="form__campo">
        <label for="apellido" class="form__label">Apellido</label>
        <input 
            type="text" 
            name="apellido" 
            id="apellido" 
            class="form__input" 
            placeholder="Apellido Ponente" 
            value="<?= $ponente->apellido ?? '' ?>"
        >
    </div>

    <div class="form__campo">
        <label for="ciudad" class="form__label">Ciudad</label>
        <input 
            type="text" 
            name="ciudad" 
            id="ciudad" 
            class="form__input" 
            placeholder="Ciudad Ponente" 
            value="<?= $ponente->ciudad ?? '' ?>"
        >
    </div>

    <div class="form__campo">
        <label for="pais" class="form__label">País</label>
        <input 
            type="text" 
            name="pais" 
            id="pais" 
            class="form__input" 
            placeholder="País Ponente" 
            value="<?= $ponente->pais ?? '' ?>"
        >
    </div>

    <div class="form__campo">
        <label for="imagen" class="form__label">Imagen</label>
        <input 
            type="file" 
            name="imagen" 
            id="imagen" 
            class="form__input form__input--file"
        >
    </div>

    <?php if (isset($ponente->img_actual)) { ?>
        <p class="form__text">Imagen Actual:</p>
        <div class="form__img">
            <picture>
                <source srcset="<?= $_ENV['HOST'] . '/img/speakers/' . $ponente->img_actual ?>.webp" type="image/webp">
                <source srcset="<?= $_ENV['HOST'] . '/img/speakers/' . $ponente->img_actual ?>.png" type="image/png">
                <img src="<?= $_ENV['HOST'] . '/img/speakers/' . $ponente->imagen ?>.png" alt="Imagen Actual">
            </picture>
        </div>
    <?php } ?>
</fieldset>

<fieldset class="form__fieldset">
    <legend class="form__legend">Información Extra</legend>
    
    <div class="form__campo">
        <label for="tags_input" class="form__label">Áreas de Experiencia</label>
        <input 
            type="text" 
            id="tags_input" 
            class="form__input" 
            placeholder="Ej. Node.js, PHP, CSS, Angular, UX / UI"
        >

        <div class="form__listado" id="tags"></div>
        <input 
            type="hidden" 
            name="tags" 
            value="<?= $ponente->tags ?? '' ?>"
        >
    </div>
</fieldset>

<fieldset class="form__fieldset">
    <legend class="form__legend">Redes Sociales</legend>
    
    <div class="form__campo">
        <div class="form__contenedor-icon">
            <div class="form__icon">
                <i class="fa-brands fa-facebook"></i>
            </div>
            <input 
                type="text" 
                name="redes[facebook]" 
                class="form__input--social" 
                placeholder="Facebook" 
                value="<?= $redes->facebook ?? '' ?>"
            >
        </div>
    </div>

    <div class="form__campo">
        <div class="form__contenedor-icon">
            <div class="form__icon">
                <i class="fa-brands fa-twitter"></i>
            </div>
            <input 
                type="text" 
                name="redes[twitter]"
                class="form__input--social" 
                placeholder="Twitter / X"
                value="<?= $redes->twitter ?? '' ?>"
            >
        </div>
    </div>

    <div class="form__campo">
        <div class="form__contenedor-icon">
            <div class="form__icon">
                <i class="fa-brands fa-youtube"></i>
            </div>
            <input 
                type="text" 
                name="redes[youtube]" 
                class="form__input--social" 
                placeholder="YouTube" 
                value="<?= $redes->youtube ?? '' ?>"
            >
        </div>
    </div>

    <div class="form__campo">
        <div class="form__contenedor-icon">
            <div class="form__icon">
                <i class="fa-brands fa-instagram"></i>
            </div>
            <input 
                type="text" 
                name="redes[instagram]" 
                class="form__input--social" 
                placeholder="Instagram" 
                value="<?= $redes->instagram ?? '' ?>"
            >
        </div>
    </div>

    <div class="form__campo">
        <div class="form__contenedor-icon">
            <div class="form__icon">
                <i class="fa-brands fa-tiktok"></i>
            </div>
            <input 
                type="text" 
                name="redes[tiktok]" 
                class="form__input--social" 
                placeholder="TikTok" 
                value="<?= $redes->tiktok ?? '' ?>"
            >
        </div>
    </div>

    <div class="form__campo">
        <div class="form__contenedor-icon">
            <div class="form__icon">
                <i class="fa-brands fa-github"></i>
            </div>
            <input 
                type="text" 
                name="redes[github]" 
                class="form__input--social" 
                placeholder="GitHub"
                value="<?= $redes->github ?? '' ?>"
            >
        </div>
    </div>
</fieldset>