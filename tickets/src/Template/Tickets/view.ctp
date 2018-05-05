  
<?php 

include('actualizar.ctp'); 
?>


    <div class="clearfix"></div>
        <!-- //w3_agileits_top_nav-->
        <!-- /inner_content-->
 



<div class="inner_content">
                    <!-- /inner_content_w3_agile_info-->

                    <!-- breadcrumbs -->
                        <div class="w3l_agileits_breadcrumbs">
                            <div class="w3l_agileits_breadcrumbs_inner">
                                <ul>
                                    <li><a href="#">Home</a><span>«</span></li>
                                    
                                    <li>Tickets</li>
                                </ul>
                            </div>
                        </div>
                    <!-- //breadcrumbs -->

                    <div class="inner_content_w3_agile_info two_in">
                      <h2 class="w3_inner_tittle">Tickets</h2>
                                    <!-- tables -->
                                    
                                
                                <div class="w3l-table-info agile_info_shadow">
                                      <h3 class="w3_inner_tittle two">Tickets     <?= h($ticket->name) ?></h3>
                                     
<div class="tickets view large-9 medium-8 columns content">

  <div class="col-md-9"> 
 
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Estado</a></li>

    <li ><a data-toggle="tab" href="#descripcion">Descripción</a></li>
  <li><a data-toggle="tab" href="#memo">Memo</a></li>
    <li><a data-toggle="tab" href="#compr">Comprobante</a></li>
  </ul>

  <div class="tab-content" style="min-height: 250px">
  
    <div id="home" class="tab-pane fade in active">

    <table class="table table-striped">
        <tr>
            <th scope="row"><?= __('Nombre tarea') ?></th>
            <td><?= h($ticket->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha') ?></th>
            <td><?= h($ticket->fecha) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Estado') ?></th>
            <td><?=$ticket->estado->name;//  $ticket->has('estado') ? $this->Html->link(, ['controller' => 'Estados', 'action' => 'view', $ticket->estado->id]) : '' ?></td>
        </tr>
        <tr rowspan="2" style="height: 25px" >
            <th style="height: 55px" scope="row"><?= __('Progreso') ?></th>
            <td style="height: 55px">
 

<div class="progress">
  <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $this->Number->format($ticket->progreso) ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $this->Number->format($ticket->progreso) ?>%;">
    
  </div>
</div>

            </td>
        </tr>
        <tr>
            <th scope="row"><?= __('Trabajo a persona') ?></th>
           <td><?= $ticket->has('user') ? $this->Html->link($ticket->user->name, ['controller' => 'Users', 'action' => 'view', $ticket->user->id]) : '' ?></td>
        </tr>
      
       
        <tr>
            <th scope="row"><?= __('Departamento') ?></th>
            <td><?= $ticket->departamento->name; // $ticket->has('departamento') ? $this->Html->link( ['controller' => 'Departamentos', 'action' => 'view', $ticket->departamento->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Responsable') ?></th>
        <td><?= $ticket->has('responsables') ? $this->Html->link($ticket->responsables->name, ['controller' => 'Users', 'action' => 'view', $ticket->responsables->id]) : 'No tiene' ?></td>
        </tr>
  
        <tr>
            <th scope="row"><?= __('Contratiempo') ?></th>
            <td><?= $ticket->contratiempo->name;// $ticket->has('contratiempo') ? $this->Html->link( ['controller' => 'Contratiempos', 'action' => 'view', $ticket->contratiempo->id]) : '' ?></td>
        </tr>
       
 
 
    </table>
 </div>


    <div id="descripcion" class="tab-pane fade ">
    
        <h2> <?= $ticket->descripcion ?></h2> <?php // $this->Text->autoParagraph(h()); ?> 
       
   
    </div>
 

    <div id="memo" class="tab-pane fade ">
         <br><br>
      <tr>
             <td>

                <?php if(!empty($ticket["archivo"])) {

                    ?>

                    <a class="btn btn-success  btn-lg btn-block" href="/tickets/tickets/downloadfile/<?php echo $ticket->id ?>">DESCARGAR </a>
             
                    <?php }
                        else{

                            echo "<h1>NO INGRESO NINGUN ARCHIVO</h1>";
                        }
                    ?>
                  


              </td>
  
            <td><?= $ticket->has('archivo') ?  $this->Html->image('memos/'.$ticket->archivo, ['alt' => ''])  : '' ?></td>
      
        </tr>
    </div>

    <div id="compr"  class="tab-pane fade ">
         <br><br>
      <tr>
       
<td>   

  <?php if(!empty($ticket["comprobante"])) {

                    ?>


                    <a class="btn btn-success" href="/tickets/tickets/ComprobanteFile/<?php echo $ticket->id ?>">DESCARGAR COMPROBANTE </a>
                             <?php }
                        else{

                            echo "<h1>NO INGRESO NINGUN ARCHIVO</h1>";
                        }
                    ?>
     </td>             
        <td><?= $ticket->has('comprobante') ?  $this->Html->image('comprobantes/'.$ticket->comprobante, ['alt' => ''])  : '' ?></td>
        </tr>
    </div>


</div>
 </div>

 <div class="col-md-3">
     <!-- Button trigger modal -->

    <div class="col-md-10 well col-lg-offset-2" >
            <center>
          <?php
         $rol=$this->request->session()->read('Auth.User.rol');// $this->Session->read('Auth.User.rol'); 
                                    if($rol==2  || $rol==3 ){?>
                <h3>  Actualizar  estado</h3>
                     <div class="btn-group">
                     <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                     Editar
                    </button>
                   </div>
            </center>
     <?php   } ?>
            <br><br>
    </div>


 </div>
       <div class="clearfix"></div>
    <div class="related">
        <h4><?= __('Historico de trabajo') ?></h4>
        <?php if (!empty($ticket->historicos)): ?>
        <table  class="table table-striped" cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col">Fecha</th>
                <th scope="col">Descripcion</th>
               
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($ticket->historicos as $historico): ?>
            <tr>
                <td><?= h($historico->fecha) ?></td>
                <td><?= h($historico->descripcion) ?></td>
         
                <td class="actions">
                    <?= $this->Html->link(__('Detalle'), ['controller' => 'historicos', 'action' => 'view', $historico->id]) ?>
                   
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>


</div>
            
        </div>
<!-- //inner_content_w3_agile_info-->

    </div>
</div>
