<h2 class="dashboard__heading"><?= $titulo ?></h2>

<div class="dashboard__contenedor-btn">
    <a href="/admin/ponentes/crear" class="dashboard__btn">
        <i class="fa-solid fa-circle-plus"></i>
        Añadir Ponente
    </a>
</div>

<div class="dashboard__contenedor">
    <?php if (!empty($ponentes)) { ?>
        <table class="table">
            <thead class="table__thead">
                <tr>
                    <th scope="col" class="table__th">Nombre</th>
                    <th scope="col" class="table__th">Ubicación</th>
                    <th scope="col" class="table__th"></th>
                </tr>
            </thead>
            <tbody class="table__tbody">
                <?php foreach ($ponentes as $ponente) { ?>
                    <tr class="table__tr">
                        <td class="table__td">
                            <?= $ponente->nombre . ' ' . $ponente->apellido ?>
                        </td>
                        <td class="table__td">
                            <?= $ponente->ciudad . ', ' . $ponente->pais ?>
                        </td>
                        <td class="table__td--acciones">
                            <a href="/admin/ponentes/editar?id=<?= $ponente->id ?>" class="table__accion table__accion--editar">
                                <i class="fa-solid fa-user-pen"></i>
                                Editar
                            </a>

                            <form action="/admin/ponentes/eliminar" method="POST" class="table__form">
                                <input type="hidden" name="id" value="<?= $ponente->id ?>">
                                <button type="submit" class="table__accion table__accion--eliminar">
                                    <i class="fa-solid fa-circle-xmark"></i>
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php } else { ?>
        <p class="text-center">No hay Ponentes Aún</p>
    <?php } ?>
</div>

<?= $paginacion ?>