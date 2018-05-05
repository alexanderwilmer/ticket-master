 

<ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Roles</li>

      </ol>

 <div class="table-responsive">
    
        
 
<div class="content">
    <h2><?= h($rol->name) ?></h2>
     
 
    <div class="row"> 
       <div class="col-md-12">

        <h3><?= __('Descripción') ?></h3>
        <p> <?= $this->Text->autoParagraph(h($rol->description)); ?></p>
       </div>
    </div>
    <div class="table-responsive">
        <h4><?= __('Permisos del rol') ?></h4>
        <?php if (!empty($rol->permisos)): ?>
        <table class="table" cellpadding="0" cellspacing="0">
            <tr>
                 
                 
                <th><?= __('Modulo ') ?></th>
                <th><?= __('Ver') ?></th>
                <th><?= __('Agregar') ?></th>
                <th><?= __('Editar') ?></th>
                <th><?= __('Eliminar') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($permisos as $permiso){ ?>
            <tr>
              
                <td><?= h($permiso["name"]) ?></td>
                <td><?= $permiso["view"] ? __('Si') : __('No'); ?></td>
                <td><?= $permiso["agregar"] ? __('Si') : __('No');  ?></td>
                <td><?= $permiso["editar"] ? __('Si') : __('No'); ?></td>
                <td><?= $permiso["eliminar"] ? __('Si') : __('No'); ?></td>
                <td class="actions">
                
                   
                    <?= $this->Html->link(__('Editar permiso'), ['controller' => 'Permisos', 'action' => 'edit', $permiso["id"]]) ?>
                   
                </td> 
            </tr>
            <?php  } ?>
        </table>
        <?php endif; ?>
    </div>
</div>
</div>
