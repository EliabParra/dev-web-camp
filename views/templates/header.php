<header class="header">
    <div class="header__contenedor">
        <nav class="header__nav">
            <?php if (isAuth()) { ?>
                    <a href="<?= isAdmin() ? '/admin/dashboard' : '/finalizar-registro' ?>" class="header__link">Administrar</a> 
                    <form action="/logout" class="header__form" method="POST">
                        <input type="submit" value="Cerrar Sesión" class="header__submit">
                    </form>
            <?php } else { ?>
                <a href="/registro" class="header__link">Registro</a>
                <a href="/login" class="header__link">Iniciar Sesión</a>
            <?php } ?>
            </nav>

        <div class="header__contenido">
            <a href="/">
                <h1 class="header__logo">
                    &#60;DevWebCamp />
                </h1>
            </a>

            <p class="header__text">Noviembre 8-9, 2024</p>
            <p class="header__text header__text--modalidad">En Línea - Presencial</p>

            <a href="/registro" class="header__boton">Comprar Pase</a>
        </div>
    </div>
</header>

<div class="barra">
    <div class="barra__contenido">
        <a href="/">
            <h2 class="barra__logo">
                &#60;DevWebCamp />
            </h2>
        </a>

        <nav class="nav">
            <a href="/devwebcamp" class="nav__link <?= pagina_actual('/devwebcamp') ? 'nav__link--actual' : '' ?>">Evento</a>
            <a href="/paquetes" class="nav__link <?= pagina_actual('/paquetes') ? 'nav__link--actual' : '' ?>">Paquetes</a>
            <a href="/workshops-conferencias" class="nav__link <?= pagina_actual('/workshops-conferencias') ? 'nav__link--actual' : '' ?>">Workshops / Conferencias</a>
            <a href="/registro" class="nav__link <?= pagina_actual('/registro') ? 'nav__link--actual' : '' ?>">Comprar Pase</a>
        </nav>
    </div>
</div>