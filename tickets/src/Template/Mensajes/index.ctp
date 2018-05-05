<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Mensaje'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="mensajes index large-9 medium-8 columns content">
    <h3><?= __('Mensajes') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('emisor_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('receptor_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('asunto') ?></th>
                <th scope="col"><?= $this->Paginator->sort('estado') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($mensajes as $mensaje): ?>
            <tr>
                <td><?= $this->Number->format($mensaje->id) ?></td>
                <td><?= $this->Number->format($mensaje->emisor_id) ?></td>
                <td><?= $this->Number->format($mensaje->receptor_id) ?></td>
                <td><?= h($mensaje->asunto) ?></td>
                <td><?= $this->Number->format($mensaje->estado) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $mensaje->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $mensaje->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $mensaje->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mensaje->id)]) ?>
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
