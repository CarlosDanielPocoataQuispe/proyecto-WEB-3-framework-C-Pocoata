<div class="form-container">
    <form method="post" action="<?= base_url('roles/guardar') ?>">
        <div class="form-group">
            <label>Nombre del Rol:</label>
            <input type="text" name="nombre" required placeholder="Ej: Organizador, Coordinador, etc.">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="<?= base_url('roles') ?>" class="btn">Cancelar</a>
        </div>
    </form>
</div>