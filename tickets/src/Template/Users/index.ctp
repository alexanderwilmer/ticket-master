 
 
    <div class="clearfix"></div>
        <!-- //w3_agileits_top_nav-->
        <!-- /inner_content-->
 



<div class="inner_content">
                    <!-- /inner_content_w3_agile_info-->

                    <!-- breadcrumbs -->
                        <div class="w3l_agileits_breadcrumbs">
                            <div class="w3l_agileits_breadcrumbs_inner">
                                <ul>
                                    <li><a> Home</a><span>«</span></li>
                                    
                                    <li>Usuarios</li>
                                </ul>
                            </div>
                        </div>
                    <!-- //breadcrumbs -->

                    <div class="inner_content_w3_agile_info two_in">
                  <div class="row">
                     <div class="col-md-9">
                      <h2 class="w3_inner_tittle">Usuarios</h2> 
                      </div>
                      <div class="col-md-1">
                       
                      </div>
 
                      <div class="col-md-2">
                      
                      <?= $this->Html->link('<i class="fa fa-arrow-left"  aria-hidden="true"></i> Ir a menu', ['controller' => 'Dashboards', 'action' => 'menu'] ,  array("class"=>"btn btn-primary btn-lg pull-right  ",'escape' => false)  ) ?>     
                        </div> 
            </div>
                                    <!-- tables -->
                                    
                                
                                <div class="w3l-table-info agile_info_shadow">
                                      <div class="row">
                                      <div class="col-md-9">
                                      <h3 class="w3_inner_tittle two">Usuarios</h3>
                                      </div>
                                    
                                </div>
    
     <table id="table"   >
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nombre') ?></th>
                <th scope="col"><?= $this->Paginator->sort('apellido') ?></th>
                <th scope="col"><?= $this->Paginator->sort('departamento_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('imagen') ?></th>
                <th scope="col"><?= $this->Paginator->sort('rol_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('correo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('telefono') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?= $this->Number->format($user->id) ?></td>
                <td><?= h($user->name) ?></td>
                <td><?= h($user->user) ?></td>
                <td><?= h($user->nombre) ?></td>
                <td><?= h($user->apellido) ?></td>
                <td><?=$user->departamento->name;// $user->has('departamento') ? $this->Html->link($user->departamento->name, ['controller' => 'Departamentos', 'action' => 'view', $user->departamento->id]) : '' ?></td>
                <td> 
                   <span class="prfil-img"> <?php echo $this->Html->image("usuarios/".$user->imagen, ['alt' => 'CakePHP',"width"=>"100px","height"=>"100px"]);  ?> </span> 
                </td>
                <td><?=$user->rol->name;// $user->has('rol') ? $this->Html->link($user->rol->name, ['controller' => 'Rols', 'action' => 'view', $user->rol->id]) : '' ?></td>
                <td><?= h($user->correo) ?></td>
                <td><?= h($user->telefono) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['action' => 'view', $user->id]) ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $user->id]) ?>
                    <!--
                    <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
                -->
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
     

 









                         
        </div>
<!-- //inner_content_w3_agile_info-->

    </div>
      <div class="row">
                     <div class="col-md-9">
                        </div>


                      <div class="col-md-3">
                      <?= $this->Html->link('<i class="fa fa-arrow-left"  aria-hidden="true"></i> Ir a menu', ['controller' => 'Dashboards', 'action' => 'menu'] ,  array("class"=>"btn btn-primary btn-lg pull-right  ",'escape' => false)  ) ?>     
                        </div> 
            </div>
</div>

