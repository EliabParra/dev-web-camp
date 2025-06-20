<h2 class="dashboard__heading"><?= $titulo ?></h2>

<div class="dashboard__contenedor-btn">
    <a href="/admin/eventos/crear" class="dashboard__btn">
        <i class="fa-solid fa-circle-plus"></i>
        Añadir Evento
    </a>
</div>

<div class="dashboard__contenedor">
    <?php if (!empty($eventos)) { ?>
        <table class="table">
            <thead class="table__thead">
                <tr>
                    <th scope="col" class="table__th">Evento</th>
                    <th scope="col" class="table__th">Categoría</th>
                    <th scope="col" class="table__th">Día y Hora</th>
                    <th scope="col" class="table__th">Ponente</th>
                    <th scope="col" class="table__th"></th>
                </tr>
            </thead>
            <tbody class="table__tbody">
                <?php foreach ($eventos as $evento) { ?>
                    <tr class="table__tr">
                        <td class="table__td"><?= $evento->nombre ?></td>
                        <td class="table__td"><?= $evento->categoria->nombre ?></td>
                        <td class="table__td"><?= $evento->dia->nombre . ', ' . $evento->hora->hora ?></td>
                        <td class="table__td"><?= $evento->ponente->nombre . ' ' . $evento->ponente->apellido ?></td>
                        <td class="table__td--acciones">
                            <a href="/admin/eventos/editar?id=<?= $evento->id ?>" class="table__accion table__accion--editar">
                                <i class="fa-solid fa-pencil"></i>
                                Editar
                            </a>

                            <form action="/admin/eventos/eliminar" method="POST" class="table__form">
                                <input type="hidden" name="id" value="<?= $evento->id ?>">
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
        <p class="text-center">No hay Eventos Aún</p>
    <?php } ?>
</div>

<?= $paginacion ?>