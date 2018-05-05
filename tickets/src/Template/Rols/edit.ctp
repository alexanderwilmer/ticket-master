 
<div class="content">
    <?= $this->Form->create($rol,["class"=>'form-horizontal']) ?>
    <fieldset>
        <legend><?= __('Editar Rol') ?></legend>
        <?php
            echo $this->Form->input('name' ,["class"=>'form-control']);
            echo $this->Form->input('description',["class"=>'form-control']);
        ?>
    </fieldset>
    <br><br>
    <?= $this->Form->button(__('Submit'),["class"=>'btn btn-success']) ?>
    <?= $this->Form->end() ?>
</div>
