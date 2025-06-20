<fieldset class="form__fieldset">
    <legend class="form__legend">Información del Evento</legend>

    <div class="form__campo">
        <label for="nombre" class="form__label">Nombre Evento</label>
        <input 
            type="text" 
            name="nombre" 
            id="nombre" 
            class="form__input" 
            placeholder="Nombre Evento"
            value="<?= $evento->nombre ?? '' ?>"
        >
    </div>

    <div class="form__campo">
        <label for="descripcion" class="form__label">Descripción</label>
        <textarea 
            name="descripcion" 
            id="descripcion" 
            class="form__input" 
            placeholder="Descripción Evento"
            rows="5"
        ><?= $evento->descripcion ?></textarea>
    </div>

    <div class="form__campo">
        <label for="categoria" class="form__label">Categoría o Tipo de Evento</label>
        <select
            class="form__select"
            id="categoria"
            name="categoria_id"
        >
            <option value="">- Seleccionar Categoría -</option>
            <?php foreach ($categorias as $categoria) { ?>
                <option <?= ($evento->categoria_id === $categoria->id) ? 'selected' : '' ?> value="<?= $categoria->id ?>"><?= $categoria->nombre ?></option>
            <?php } ?>
        </select>
    </div>

    <div class="form__campo">
        <label for="dia" class="form__label">Selecciona el Día</label>
        <div class="form__radio">
            <?php foreach ($dias as $dia) { ?>
                <div>
                    <label for="<?= strtolower($dia->nombre) ?>" class="form_radio__label"><?= $dia->nombre ?></label>
                    <input 
                        type="radio" 
                        name="dia" 
                        id="<?= strtolower($dia->nombre) ?>" 
                        value="<?= $dia->id ?>"
                        <?= ($evento->dia_id === $dia->id) ? 'checked' : '' ?>
                    >
                </div>
            <?php } ?>
        </div>
        <input type="hidden" name="dia_id" value="<?= $evento->dia_id ?>">
    </div>

    <div id="horas" class="form__campo">
        <label class="form__label">Selecciona la Hora</label>
        <ul class="horas" id="horas">
            <?php foreach ($horas as $hora) { ?>
                <li class="horas__hora horas__hora--deshabilitada" data-hora-id="<?= $hora->id ?>"><?= $hora->hora ?></li>
            <?php } ?>
        </ul>

        <input type="hidden" name="hora_id" value="<?= $evento->hora_id ?>">
    </div>
</fieldset>

<fieldset class="form__fieldset">
    <legend class="form__legend">Información Extra</legend>
    
    <div class="form__campo">
        <label for="ponentes" class="form__label">Ponente</label>
        <input 
            type="text"
            id="ponentes"
            class="form__input" 
            placeholder="Buscar Ponente"
        >
        <ul id="listado-ponentes" class="listado-ponentes"></ul>

        <input type="hidden" name="ponente_id" value="<?= $evento->ponente_id ?>">
    </div>

    <div class="form__campo">
        <label for="disponibles" class="form__label">Lugares Disponibles</label>
        <input 
            type="number"
            min="1"
            id="disponibles"
            name="disponibles"
            class="form__input" 
            placeholder="Ej. 20"
            value="<?= $evento->disponibles ?>"
        >
    </div>
</fieldset>