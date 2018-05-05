<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Historicos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Estados'), ['controller' => 'Estados', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Estado'), ['controller' => 'Estados', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="historicos form large-9 medium-8 columns content">
    <?= $this->Form->create($historico) ?>
    <fieldset>
        <legend><?= __('Add Historico') ?></legend>
        <?php
            echo $this->Form->control('estado_id', ['options' => $estados, 'empty' => true]);
            echo $this->Form->control('users_id', ['options' => $users, 'empty' => true]);
            echo $this->Form->control('fecha', ['empty' => true]);
            echo $this->Form->control('descripcion');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
