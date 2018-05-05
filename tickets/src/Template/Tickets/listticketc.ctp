 



    <div class="clearfix"></div>
        <!-- //w3_agileits_top_nav-->
        <!-- /inner_content-->
 



<div class="inner_content">
                    <!-- /inner_content_w3_agile_info-->

                    <!-- breadcrumbs -->
                        <div class="w3l_agileits_breadcrumbs">
                            <div class="w3l_agileits_breadcrumbs_inner">
                                <ul>
                                    <li><a href="../">Home</a><span>«</span></li>
                                    
                                    <li>Tickets</li>
                                </ul>
                            </div>
                        </div>
                    <!-- //breadcrumbs -->

                    <div class="inner_content_w3_agile_info two_in">
                      <h2 class="w3_inner_tittle">Tickets</h2>
                                    <!-- tables -->
                                    
                                
                                <div class="w3l-table-info agile_info_shadow">
                                      <h3 class="w3_inner_tittle two">Tickets</h3>
                                     
                                     



     <table id="table"   >
        <thead>
            <tr>
                
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fecha') ?></th>
                <th scope="col"><?= $this->Paginator->sort('estado_id') ?></th> 
                <th scope="col"><?= $this->Paginator->sort('departamento_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('progreso') ?></th>
            
                 
                <th scope="col"><?= $this->Paginator->sort('contratiempo_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('completado') ?></th>
 
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tickets as $ticket): ?>
            <tr>
           
                <td><?= h($ticket->name) ?></td>
                <td><?= h($ticket->fecha) ?></td>
                <td><?=$ticket->estado->name;// $ticket->has('estado') ? $this->Html->link( ['controller' => 'Estados', 'action' => 'view', $ticket->estado->id]) : '' ?></td>
                 <td><?=$ticket->departamento->name;// $ticket->has('departamento') ? $this->Html->link(, ['controller' => 'Departamentos', 'action' => 'view', $ticket->departamento->id]) : '' ?></td>
                <td><?=$ticket->user->name;// $ticket->has('user') ? $this->Html->link(, ['controller' => 'Users', 'action' => 'view', $ticket->user->id]) : '' ?></td>
                <td><?= $this->Number->format($ticket->progreso) ?></td>
   
                <td><?=$ticket->contratiempo->name;// $ticket->has('contratiempo') ? $this->Html->link(, ['controller' => 'Contratiempos', 'action' => 'view', $ticket->contratiempo->id]) : '' ?></td>
                <td><?= $this->Number->format($ticket->completado)  ? __('Si') : __('No');  ?></td>
           
                <td class="actions">
             <?= $this->Html->link(__('Ver'), ['action' => 'view', $ticket->id]) ?>
                    <!--       <?= $this->Html->link(__('Editar'), ['action' => 'edit', $ticket->id]) ?>
                -->
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    

    

</div>
            
        </div>
<!-- //inner_content_w3_agile_info-->

    </div>
</div>