<div class="form-container">
    <form method="post" action="<?= base_url('asistentes/actualizar/' . $registro->id) ?>">
        <div class="form-group">
            <label>Nombre del Asistente:</label>
            <input type="text" name="nombre" value="<?= esc($registro->nombre) ?>" required>
        </div>
        <div class="form-group">
            <label>Contacto:</label>
            <input type="text" name="contacto" value="<?= esc($registro->contacto) ?>" required>
        </div>
        <div class="form-group">
            <label>Evento:</label>
            <select name="evento_id" required>
                <option value="">Seleccionar evento</option>
                <?php foreach ($eventos as $evento): ?>
                    <option value="<?= $evento->id ?>" <?= $evento->id == $registro->evento_id ? 'selected' : '' ?>>
                        <?= esc($evento->nombre) ?> (<?= $evento->fecha ?>)
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="<?= base_url('asistentes') ?>" class="btn">Cancelar</a>
        </div>
    </form>
</div>