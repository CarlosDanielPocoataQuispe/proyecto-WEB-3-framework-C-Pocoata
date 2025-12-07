<div class="form-container">
    <form method="post" action="<?= base_url('roles/actualizar/' . $registro->id) ?>">
        <div class="form-group">
            <label>Nombre del Rol:</label>
            <input type="text" name="nombre" value="<?= esc($registro->nombre) ?>" required>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="<?= base_url('roles') ?>" class="btn">Cancelar</a>
        </div>
    </form>
</div>