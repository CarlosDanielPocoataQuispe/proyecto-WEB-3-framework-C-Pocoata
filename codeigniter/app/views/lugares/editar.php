<div class="form-container">
    <form method="post" action="<?= base_url('lugares/actualizar/' . $registro->id) ?>">
        <div class="form-group">
            <label>Nombre del Lugar:</label>
            <input type="text" name="nombre" value="<?= esc($registro->nombre) ?>" required>
        </div>
        <div class="form-group">
            <label>Dirección:</label>
            <input type="text" name="direccion" value="<?= esc($registro->direccion) ?>" required>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="<?= base_url('lugares') ?>" class="btn">Cancelar</a>
        </div>
    </form>
</div>