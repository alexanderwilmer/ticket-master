
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
                                    
                                    <li>Departamentos</li>
                                </ul>
                            </div>
                        </div>
                    <!-- //breadcrumbs -->

                    <div class="inner_content_w3_agile_info two_in">
                  <div class="row">
                     <div class="col-md-9">
                      <h2 class="w3_inner_tittle">Departamentos</h2> 
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
                                      <h3 class="w3_inner_tittle two">Departamentos</h3>
                                      </div>
                                      <div class="col-md-3">
                                         <?= $this->Html->link('<i class="fa fa-pencil"  aria-hidden="true"></i> Agregar', ['controller' => 'Departamentos', 'action' => 'add'] ,  array("class"=>"btn btn-success btn-lg  pull-right  ",'escape' => false)  ) ?>
                                         </div>

                                </div>
    
     <table id="table"   >
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($departamentos as $departamento): ?>
            <tr>
                <td><?= $this->Number->format($departamento->id) ?></td>
                <td><?= h($departamento->name) ?></td>
                <td class="actions">
                    
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $departamento->id]) ?>
                    <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $departamento->id], ['confirm' => __('Are you sure you want to delete # {0}?', $departamento->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
  
</div>
   <div class="row">
                     <div class="col-md-9">
                        </div>


                      <div class="col-md-3">
                      <?= $this->Html->link('<i class="fa fa-arrow-left"  aria-hidden="true"></i> Ir a menu', ['controller' => 'Dashboards', 'action' => 'menu'] ,  array("class"=>"btn btn-primary btn-lg pull-right  ",'escape' => false)  ) ?>     
                        </div> 
            </div>