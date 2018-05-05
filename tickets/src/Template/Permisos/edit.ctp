
<div class="permisos form large-9 medium-8 columns content">
    <?= $this->Form->create($permiso) ?>
    <fieldset>
        <legend><?= __('Editar Permiso') ?></legend>
        <?php
            echo $this->Form->input('rol_id', ["disabled"=>"disabled",'options' => $rols,"class"=>"form-control"] );
            echo $this->Form->input('modulo_id', ["disabled"=>"disabled",'options' => $modulos,"class"=>"form-control"]);
            echo $this->Form->input('view',["class"=>"Check"] );
            echo $this->Form->input('agregar');
            echo $this->Form->input('editar');
            echo $this->Form->input('eliminar');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
