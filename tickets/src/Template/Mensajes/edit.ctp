<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $mensaje->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $mensaje->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Mensajes'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="mensajes form large-9 medium-8 columns content">
    <?= $this->Form->create($mensaje) ?>
    <fieldset>
        <legend><?= __('Edit Mensaje') ?></legend>
        <?php
            echo $this->Form->control('emisor_id');
            echo $this->Form->control('receptor_id');
            echo $this->Form->control('mensaje');
            echo $this->Form->control('asunto');
            echo $this->Form->control('estado');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
