<div class="form-container">
    <form method="post" action="<?= base_url('asistentes/guardar') ?>">
        <div class="form-group">
            <label>Nombre del Asistente:</label>
            <input type="text" name="nombre" required>
        </div>
        <div class="form-group">
            <label>Contacto:</label>
            <input type="text" name="contacto" required placeholder="Email o teléfono">
        </div>
        <div class="form-group">
            <label>Evento:</label>
            <select name="evento_id" required>
                <option value="">Seleccionar evento</option>
                <?php foreach ($eventos as $evento): ?>
                    <option value="<?= $evento->id ?>"><?= esc($evento->nombre) ?> (<?= $evento->fecha ?>)</option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="<?= base_url('asistentes') ?>" class="btn">Cancelar</a>
        </div>
    </form>
</div>