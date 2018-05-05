<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Ticket Asignado'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tickets'), ['controller' => 'Tickets', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ticket'), ['controller' => 'Tickets', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="ticketAsignados index large-9 medium-8 columns content">
    <h3><?= __('Ticket Asignados') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ticket_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ticketAsignados as $ticketAsignado): ?>
            <tr>
                <td><?= $this->Number->format($ticketAsignado->id) ?></td>
                <td><?= $ticketAsignado->has('ticket') ? $this->Html->link($ticketAsignado->ticket->name, ['controller' => 'Tickets', 'action' => 'view', $ticketAsignado->ticket->id]) : '' ?></td>
                <td><?= $ticketAsignado->has('user') ? $this->Html->link($ticketAsignado->user->name, ['controller' => 'Users', 'action' => 'view', $ticketAsignado->user->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $ticketAsignado->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $ticketAsignado->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $ticketAsignado->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ticketAsignado->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
