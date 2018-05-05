 

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
                      
                      <?= $this->Html->link('<i class="fa fa-arrow-left"  aria-hidden="true"></i> Retornar', ['controller' => 'Users', 'action' => 'index'] ,  array("class"=>"btn btn-primary btn-lg pull-right  ",'escape' => false)  ) ?>     
                        </div> 
            </div>
                                    <!-- tables -->
                                    
                                
                                <div class="w3l-table-info agile_info_shadow">
                                      <div class="row">
                                      <div class="col-md-9">
                                      <h3 class="w3_inner_tittle two">Usuarios</h3>
                                      </div>
                                      <div class="col-md-3">
                                       
                                         </div>

                                </div>

<div class="table table-striped  view large-9 medium-8 columns content">
 <div class="row">

    <div class="col-md-7">
        
    <table   class="table table-striped">
        
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= h($user->user) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nombre') ?></th>
            <td><?= h($user->nombre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Apellido') ?></th>
            <td><?= h($user->apellido) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Departamento') ?></th>
            <td><?= $user->has('departamento') ?  $user->departamento->name  /*$this->Html->link( ['controller' => 'Departamentos', 'action' => 'view', $user->departamento->id]) */: '' ?></td>
        </tr>
      
        <tr>
            <th scope="row"><?= __('Rol') ?></th>
            <td><?= $user->has('rol') ? $user->rol->name/* $this->Html->link($user->rol->name, ['controller' => 'Rols', 'action' => 'view', $user->rol->id])*/ : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Correo') ?></th>
            <td><?= h($user->correo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Telefono') ?></th>
            <td><?= h($user->telefono) ?></td>
        </tr>
 
    </table>

    </div>
    <div class="col-md-5">
          <tr>
          
            <td>    

            <span class="prfil-img"> <?php echo $this->Html->image("usuarios/".$user->imagen, ['alt' => 'CakePHP',"width"=>"100px","height"=>"100px"]);  ?> </span> 
            </td>

        </tr>

    </div>
</div>
    <!--
    <div class="related">
        <h4><?= __('Related Ticket Asignados') ?></h4>
        <?php if (!empty($user->ticket_asignados)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Ticket Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->ticket_asignados as $ticketAsignados): ?>
            <tr>
                <td><?= h($ticketAsignados->id) ?></td>
                <td><?= h($ticketAsignados->ticket_id) ?></td>
                <td><?= h($ticketAsignados->user_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['controller' => 'TicketAsignados', 'action' => 'view', $ticketAsignados->id]) ?>
                            </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div> -->
    <div class="related">
        <h4><?= __('Related Tickets') ?></h4>
        <?php if (!empty($user->tickets)): ?>  

         <table id="table" >
           <thead>
            <tr>
             
                <th scope="col"><?= __('Nombre ticket') ?></th>
                <th scope="col"><?= __('Descripcion') ?></th>
                <th scope="col"><?= __('Fecha') ?></th>
         
            
                <th scope="col"><?= __('Progreso') ?></th>
          
                <th scope="col"><?= __('Completado') ?></th>
      
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($user->tickets as $tickets): ?>
            
            <tr>
                
                <td><?= h($tickets->name) ?></td>
                <td><?= h($tickets->descripcion) ?></td>
                <td><?= h($tickets->fecha) ?></td>
               
                <td><?= h($tickets->progreso) ?></td>
            
                
               <td><?= $this->Number->format($tickets->completado)  ? __('Si') : __('No');  ?></td>
           
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Tickets', 'action' => 'view', $tickets->id]) ?>
                  
                </td>
            </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <?php endif; ?>
    </div>
</div>


</div>
            
        </div>
<!-- //inner_content_w3_agile_info-->

    </div>
</div>