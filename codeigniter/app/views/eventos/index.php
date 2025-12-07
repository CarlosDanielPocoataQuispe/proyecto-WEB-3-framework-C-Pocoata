<div class="actions">
    <a href="<?= base_url('eventos/crear') ?>" class="btn btn-primary">Nuevo Evento</a>
</div>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Fecha</th>
            <th>Lugar ID</th>
            <th>Organizador ID</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($registros as $r): ?>
            <tr>
                <td><?= $r->id ?></td>
                <td><?= esc($r->nombre) ?></td>
                <td><?= $r->fecha ?></td>
                <td><?= $r->lugar_id ?></td>
                <td><?= $r->organizador_id ?></td>
                <td>
                    <a href="<?= base_url('eventos/editar/' . $r->id) ?>" class="btn btn-edit">Editar</a>
                    <a href="<?= base_url('eventos/eliminar/' . $r->id) ?>" class="btn btn-delete">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>