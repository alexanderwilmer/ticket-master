
<div class="permisos index large-9 medium-8 columns content">
    <h3><?= __('Permisos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('rol_id') ?></th>
                <th><?= $this->Paginator->sort('modulo_id') ?></th>
                <th><?= $this->Paginator->sort('view') ?></th>
                <th><?= $this->Paginator->sort('agregar') ?></th>
                <th><?= $this->Paginator->sort('editar') ?></th>
                <th><?= $this->Paginator->sort('eliminar') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($permisos as $permiso): ?>
            <tr>
                <td><?= $this->Number->format($permiso->id) ?></td>
                <td><?= $permiso->has('rol') ? $this->Html->link($permiso->rol->name, ['controller' => 'Rols', 'action' => 'view', $permiso->rol->id]) : '' ?></td>
                <td><?= $permiso->has('modulo') ? $this->Html->link($permiso->modulo->name, ['controller' => 'Modulos', 'action' => 'view', $permiso->modulo->id]) : '' ?></td>
                <td><?= h($permiso->view) ?></td>
                <td><?= h($permiso->agregar) ?></td>
                <td><?= h($permiso->editar) ?></td>
                <td><?= h($permiso->eliminar) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $permiso->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $permiso->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $permiso->id], ['confirm' => __('Are you sure you want to delete # {0}?', $permiso->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
