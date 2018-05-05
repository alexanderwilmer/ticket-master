<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Mensaje'), ['action' => 'edit', $mensaje->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Mensaje'), ['action' => 'delete', $mensaje->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mensaje->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Mensajes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Mensaje'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="mensajes view large-9 medium-8 columns content">
    <h3><?= h($mensaje->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Asunto') ?></th>
            <td><?= h($mensaje->asunto) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($mensaje->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Emisor Id') ?></th>
            <td><?= $this->Number->format($mensaje->emisor_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Receptor Id') ?></th>
            <td><?= $this->Number->format($mensaje->receptor_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Estado') ?></th>
            <td><?= $this->Number->format($mensaje->estado) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Mensaje') ?></h4>
        <?= $this->Text->autoParagraph(h($mensaje->mensaje)); ?>
    </div>
</div>
