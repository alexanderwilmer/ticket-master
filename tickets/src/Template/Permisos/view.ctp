 
<div class="permisos view large-9 medium-8 columns content">
    <h3><?= h($permiso->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Rol') ?></th>
            <td><?= $permiso->has('rol') ? $this->Html->link($permiso->rol->name, ['controller' => 'Rols', 'action' => 'view', $permiso->rol->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Modulo') ?></th>
            <td><?= $permiso->has('modulo') ? $this->Html->link($permiso->modulo->name, ['controller' => 'Modulos', 'action' => 'view', $permiso->modulo->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($permiso->id) ?></td>
        </tr>
        <tr>
            <th><?= __('View') ?></th>
            <td><?= $permiso->view ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th><?= __('Agregar') ?></th>
            <td><?= $permiso->agregar ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th><?= __('Editar') ?></th>
            <td><?= $permiso->editar ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th><?= __('Eliminar') ?></th>
            <td><?= $permiso->eliminar ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
