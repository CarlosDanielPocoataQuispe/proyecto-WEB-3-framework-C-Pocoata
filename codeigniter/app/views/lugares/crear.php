<div class="form-container">
    <form method="post" action="<?= base_url('lugares/guardar') ?>">
        <div class="form-group">
            <label>Nombre del Lugar:</label>
            <input type="text" name="nombre" required placeholder="Ej: Auditorio Central, Sala de Conferencias">
        </div>
        <div class="form-group">
            <label>Dirección:</label>
            <input type="text" name="direccion" required placeholder="Dirección completa">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="<?= base_url('lugares') ?>" class="btn">Cancelar</a>
        </div>
    </form>
</div>