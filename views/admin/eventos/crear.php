<h2 class="dashboard__heading"><?= $titulo ?></h2>

<div class="dashboard__contenedor-btn">
    <a href="/admin/eventos" class="dashboard__btn">
        <i class="fa-solid fa-circle-arrow-left"></i>
        Volver
    </a>
</div>

<div class="dashboard__form">
    <?php require_once __DIR__ . '/../../templates/alertas.php'; ?>

    <form action="/admin/eventos/crear" method="POST" class="form">
        <?php include_once __DIR__ . '/formulario.php' ?>

        <input type="submit" value="Registrar Evento" class="form__submit form__submit--registrar">
    </form>
</div>