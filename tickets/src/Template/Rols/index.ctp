
<ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Roles</li>

      </ol>

 <div class="table-responsive">
    <br><br>
     <?= $this->Html->link(__('Agregar Roles'), ['action' => 'add'] , array('class' => 'btn btn-success')   ) ?>
    <h3><?= __('Roles') ?> <?php ?> </h3>
     
    <table id="table"  cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('nombre') ?></th>
                <th class="actions"><?= __('Actiones') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rols as $rol): ?>
            <tr>
                <td><?= h($rol->name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Editar permisos'), ['action' => 'view', $rol->id]) ?>|
                    <?= $this->Html->link(__('Editar rol'), ['action' => 'edit', $rol->id]) ?>|
                   <!-- <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $rol->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rol->id)]) ?>
                   -->
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
 
</div>
