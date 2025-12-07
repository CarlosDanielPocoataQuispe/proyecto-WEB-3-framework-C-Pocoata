<div class="actions">
    <a href="<?= base_url('asistentes/crear') ?>" class="btn btn-primary">Nuevo Asistente</a>
</div>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Contacto</th>
            <th>Evento</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($registros as $r): ?>
            <tr>
                <td><?= $r->id ?></td>
                <td><?= esc($r->nombre) ?></td>
                <td><?= esc($r->contacto) ?></td>
                <td><?= esc($r->evento_nombre) ?></td>
                <td>
                    <a href="<?= base_url('asistentes/editar/' . $r->id) ?>" class="btn btn-edit">Editar</a>
                    <a href="<?= base_url('asistentes/eliminar/' . $r->id) ?>" class="btn btn-delete">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>