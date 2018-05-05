<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Estado'), ['action' => 'edit', $estado->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Estado'), ['action' => 'delete', $estado->id], ['confirm' => __('Are you sure you want to delete # {0}?', $estado->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Estados'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Estado'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Historicos'), ['controller' => 'Historicos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Historico'), ['controller' => 'Historicos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tickets'), ['controller' => 'Tickets', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ticket'), ['controller' => 'Tickets', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="estados view large-9 medium-8 columns content">
    <h3><?= h($estado->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($estado->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($estado->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Historicos') ?></h4>
        <?php if (!empty($estado->historicos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Estado Id') ?></th>
                <th scope="col"><?= __('Users Id') ?></th>
                <th scope="col"><?= __('Fecha') ?></th>
                <th scope="col"><?= __('Descripcion') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($estado->historicos as $historicos): ?>
            <tr>
                <td><?= h($historicos->id) ?></td>
                <td><?= h($historicos->estado_id) ?></td>
                <td><?= h($historicos->users_id) ?></td>
                <td><?= h($historicos->fecha) ?></td>
                <td><?= h($historicos->descripcion) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Historicos', 'action' => 'view', $historicos->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Historicos', 'action' => 'edit', $historicos->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Historicos', 'action' => 'delete', $historicos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $historicos->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Tickets') ?></h4>
        <?php if (!empty($estado->tickets)): ?>
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
            <?php foreach ($estado->tickets as $tickets): ?>
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
</div>
