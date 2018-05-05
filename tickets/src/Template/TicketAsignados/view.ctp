<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Ticket Asignado'), ['action' => 'edit', $ticketAsignado->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Ticket Asignado'), ['action' => 'delete', $ticketAsignado->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ticketAsignado->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Ticket Asignados'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ticket Asignado'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tickets'), ['controller' => 'Tickets', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ticket'), ['controller' => 'Tickets', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="ticketAsignados view large-9 medium-8 columns content">
    <h3><?= h($ticketAsignado->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Ticket') ?></th>
            <td><?= $ticketAsignado->has('ticket') ? $this->Html->link($ticketAsignado->ticket->name, ['controller' => 'Tickets', 'action' => 'view', $ticketAsignado->ticket->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $ticketAsignado->has('user') ? $this->Html->link($ticketAsignado->user->name, ['controller' => 'Users', 'action' => 'view', $ticketAsignado->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($ticketAsignado->id) ?></td>
        </tr>
    </table>
</div>
