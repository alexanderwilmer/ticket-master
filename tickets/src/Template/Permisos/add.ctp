<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Permisos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Rols'), ['controller' => 'Rols', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Rol'), ['controller' => 'Rols', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Modulos'), ['controller' => 'Modulos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Modulo'), ['controller' => 'Modulos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="permisos form large-9 medium-8 columns content">
    <?= $this->Form->create($permiso) ?>
    <fieldset>
        <legend><?= __('Add Permiso') ?></legend>
        <?php
            echo $this->Form->input('rol_id', ['options' => $rols]);
            echo $this->Form->input('modulo_id', ['options' => $modulos]);
            echo $this->Form->input('view');
            echo $this->Form->input('agregar');
            echo $this->Form->input('editar');
            echo $this->Form->input('eliminar');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
