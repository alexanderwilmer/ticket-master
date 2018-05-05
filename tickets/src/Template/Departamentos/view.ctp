<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Departamento'), ['action' => 'edit', $departamento->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Departamento'), ['action' => 'delete', $departamento->id], ['confirm' => __('Are you sure you want to delete # {0}?', $departamento->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Departamentos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Departamento'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tickets'), ['controller' => 'Tickets', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ticket'), ['controller' => 'Tickets', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="departamentos view large-9 medium-8 columns content">
    <h3><?= h($departamento->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($departamento->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($departamento->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Tickets') ?></h4>
        <?php if (!empty($departamento->tickets)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Descripcion') ?></th>
                <th scope="col"><?= __('Fecha') ?></th>
                <th scope="col"><?= __('Estado Id') ?></th>
                <th scope="col"><?= __('Archivo') ?></th>
                <th scope="col"><?= __('Prioridad Id') ?></th>
                <th scope="col"><?= __('Departamento Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Progreso') ?></th>
                <th scope="col"><?= __('Secretaria Id') ?></th>
                <th scope="col"><?= __('Tiempo Limite') ?></th>
                <th scope="col"><?= __('Contratiempo Id') ?></th>
                <th scope="col"><?= __('Completado') ?></th>
                <th scope="col"><?= __('Comprobante') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($departamento->tickets as $tickets): ?>
            <tr>
                <td><?= h($tickets->id) ?></td>
                <td><?= h($tickets->name) ?></td>
                <td><?= h($tickets->descripcion) ?></td>
                <td><?= h($tickets->fecha) ?></td>
                <td><?= h($tickets->estado_id) ?></td>
                <td><?= h($tickets->archivo) ?></td>
                <td><?= h($tickets->prioridad_id) ?></td>
                <td><?= h($tickets->departamento_id) ?></td>
                <td><?= h($tickets->user_id) ?></td>
                <td><?= h($tickets->progreso) ?></td>
                <td><?= h($tickets->secretaria_id) ?></td>
                <td><?= h($tickets->tiempo_limite) ?></td>
                <td><?= h($tickets->contratiempo_id) ?></td>
                <td><?= h($tickets->completado) ?></td>
                <td><?= h($tickets->comprobante) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Tickets', 'action' => 'view', $tickets->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Tickets', 'action' => 'edit', $tickets->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Tickets', 'action' => 'delete', $tickets->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tickets->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Users') ?></h4>
        <?php if (!empty($departamento->users)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('User') ?></th>
                <th scope="col"><?= __('Nombre') ?></th>
                <th scope="col"><?= __('Apellido') ?></th>
                <th scope="col"><?= __('Departamento Id') ?></th>
                <th scope="col"><?= __('Imagen') ?></th>
                <th scope="col"><?= __('Rol Id') ?></th>
                <th scope="col"><?= __('Correo') ?></th>
                <th scope="col"><?= __('Telefono') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($departamento->users as $users): ?>
            <tr>
                <td><?= h($users->id) ?></td>
                <td><?= h($users->name) ?></td>
                <td><?= h($users->user) ?></td>
                <td><?= h($users->nombre) ?></td>
                <td><?= h($users->apellido) ?></td>
                <td><?= h($users->departamento_id) ?></td>
                <td><?= h($users->imagen) ?></td>
                <td><?= h($users->rol_id) ?></td>
                <td><?= h($users->correo) ?></td>
                <td><?= h($users->telefono) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $users->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Users', 'action' => 'edit', $users->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Users', 'action' => 'delete', $users->id], ['confirm' => __('Are you sure you want to delete # {0}?', $users->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
