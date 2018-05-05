 


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
                                      <h3 class="w3_inner_tittle two">Tickets</h3>


 
<div class="tickets form large-9 medium-8 columns content">
    <?= $this->Form->create($ticket) ?>
    <fieldset>
        <legend><?= __('Edit Ticket') ?></legend>
        <?php
         echo $this->Form->label('name', 'Nombre ticket');
            echo $this->Form->input('name',["class"=>"form-control","label"=>false]);
            
            echo $this->Form->control('descripcion',["class"=>"form-control"]);
            
            echo $this->Form->control('estado_id', ['options' => $estados,"class"=>"form-control"]);
            echo $this->Form->control('prioridad_id', ['options' => $prioridads,"class"=>"form-control"]);
            echo $this->Form->control('departamento_id', ['options' => $departamentos, 'empty' => false,"class"=>"form-control"]);
              echo $this->Form->label('user_id', 'Trabajo a persona');
            echo $this->Form->control('user_id', ['options' => $users, 'label' => false,"class"=>"form-control"]);
 
           
         $rol=$this->request->session()->read('Auth.User.rol');// $this->Session->read('Auth.User.rol'); 
          if($rol>=3 ){
            echo $this->Form->label('responsables', 'responsables');
            echo $this->Form->control('responsables', ['options' => $users, 'label' => false,"class"=>"form-control"]);
          }
            echo $this->Form->control('progreso',["class"=>"form-control"]);
 


            echo $this->Form->control('contratiempo_id', ['options' => $contratiempos, 'empty' => false,"class"=>"form-control"]);
            echo $this->Form->control('completado',["type"=>"checkbox"]);
            echo $this->Form->control('comprobante',["type"=>"file"]);
        ?>
    </fieldset>
    <br><br>
       <?= $this->Form->button(__('Submit'),["class"=>"btn btn-success"]) ?>
    <?= $this->Form->end() ?>
</div>


        </div>
<!-- //inner_content_w3_agile_info-->

    </div>
</div>