<div class="actions">
    <a href="<?= base_url('roles/crear') ?>" class="btn btn-primary">Nuevo Rol</a>
</div>


<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($registros as $r): ?>
            <tr>
                <td><?= $r->id ?></td>
                <td><?= esc($r->nombre) ?></td>
                <td>
                    <a href="<?= base_url('roles/editar/' . $r->id) ?>" class="btn btn-edit">Editar</a>
                    <a href="<?= base_url('roles/eliminar/' . $r->id) ?>" class="btn btn-delete">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>