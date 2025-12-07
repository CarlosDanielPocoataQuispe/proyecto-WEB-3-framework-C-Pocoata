<div class="form-container">
    <form method="post" action="<?= base_url('eventos/actualizar/' . $registro->id) ?>">
        <div class="form-group">
            <label>Nombre:</label>
            <input type="text" name="nombre" value="<?= esc($registro->nombre) ?>" required>
        </div>
        <div class="form-group">
            <label>Fecha:</label>
            <input type="date" name="fecha" value="<?= $registro->fecha ?>" required>
        </div>
        <div class="form-group">
            <label>Lugar:</label>
            <select name="lugar_id" required>
                <option value="">Seleccionar lugar</option>
                <?php

                foreach ($lugares as $lugar): ?>
                    <option value="<?= $lugar->id ?>" <?= $lugar->id == $registro->lugar_id ? 'selected' : '' ?>>
                        <?= esc($lugar->nombre) ?>
                    </option>
                <?php
                endforeach;
                ?>
            </select>
        </div>
        <div class="form-group">
            <label>Rol Organizador:</label>
            <select name="organizador_id" required>
                <option value="">Seleccionar rol</option>
                <?php foreach ($roles as $rol): ?>
                    <option value="<?= $rol->id ?>" <?= $rol->id == $registro->organizador_id ? 'selected' : '' ?>>
                        <?= esc($rol->nombre) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="<?= base_url('eventos') ?>" class="btn">Cancelar</a>
        </div>
    </form>
</div>