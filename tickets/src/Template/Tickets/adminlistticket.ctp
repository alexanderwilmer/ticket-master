 

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
                                    
                                    <li>Tickets</li>
                                </ul>
                            </div>
                        </div>
                    <!-- //breadcrumbs -->

                    <div class="inner_content_w3_agile_info two_in">
                  <div class="row">
                     <div class="col-md-9">
                      <h2 class="w3_inner_tittle">Tickets</h2> 
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
                                      <h3 class="w3_inner_tittle two">Tickets</h3>
                                      </div>
                                      <div class="col-md-3">
                                    
                                         </div>

                                </div>
    
     <table id="table"   >
        <thead>
            <tr>
                
                <th scope="col">Nombre</th>
                <th scope="col">Fecha</th>
                <th scope="col">Estado</th> 
                <th scope="col">Departamento</th>
                <th scope="col">Usuario</th>
                <th scope="col">Progreso</th>
            
                 
                <th scope="col">Contratiempo</th>
                <th scope="col">Completado</th>
 
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tickets as $ticket): ?>
            <tr>
           
                <td><?= h($ticket->name) ?></td>
                <td><?= h($ticket->fecha) ?></td>
                <td><?=$ticket->estado->name;// $ticket->has('estado') ? $this->Html->link($ticket->estado->name, ['controller' => 'Estados', 'action' => 'view', $ticket->estado->id]) : '' ?></td>
                 <td><?=$ticket->departamento->name;// $ticket->has('departamento') ? $this->Html->link($ticket->departamento->name, ['controller' => 'Departamentos', 'action' => 'view', $ticket->departamento->id]) : '' ?></td>
                <td><?= $ticket->has('user') ? $this->Html->link($ticket->user->name, ['controller' => 'Users', 'action' => 'view', $ticket->user->id]) : '' ?></td>
                <td><?= $this->Number->format($ticket->progreso) ?></td>
   
                <td><?= $ticket->has('contratiempo') ? $this->Html->link($ticket->contratiempo->name, ['controller' => 'Contratiempos', 'action' => 'view', $ticket->contratiempo->id]) : '' ?></td>
                <td><?= $this->Number->format($ticket->completado)  ? __('Si') : __('No');  ?></td>
           
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['action' => 'view', $ticket->id]) ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $ticket->id]) ?>
                    <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $ticket->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ticket->id)]) ?>
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