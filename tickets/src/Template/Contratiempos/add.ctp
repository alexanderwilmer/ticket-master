
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
                                    
                                    <li>Contratiempos</li>
                                </ul>
                            </div>
                        </div>
                    <!-- //breadcrumbs -->

                    <div class="inner_content_w3_agile_info two_in">
                  <div class="row">
                     <div class="col-md-9">
                      <h2 class="w3_inner_tittle">Contratiempos</h2> 
                      </div>
                      <div class="col-md-1">
                       
                      </div>
 
                      <div class="col-md-2">
                      
                      <?= $this->Html->link('<i class="fa fa-arrow-left"  aria-hidden="true"></i> Retornar', ['controller' => 'Contratiempos', 'action' => 'index'] ,  array("class"=>"btn btn-primary btn-lg pull-right  ",'escape' => false)  ) ?>     
                        </div> 
            </div>
                                    <!-- tables -->
                                    
                                
                                <div class="w3l-table-info agile_info_shadow">
                                      <div class="row">
                                      <div class="col-md-9">
                                      <h3 class="w3_inner_tittle two">Contratiempos</h3>
                                      </div>
                                      <div class="col-md-3">
                                         <?= $this->Html->link('<i class="fa fa-pencil"  aria-hidden="true"></i> Agregar', ['controller' => 'Departamentos', 'action' => 'add'] ,  array("class"=>"btn btn-success btn-lg  pull-right  ",'escape' => false)  ) ?>
                                         </div>

                                </div>
    
<div class="contratiempos form large-9 medium-8 columns content">
    <?= $this->Form->create($contratiempo) ?>
    <fieldset>
        <legend><?= __('Agregar Contratiempos') ?></legend>
        <?php
            echo $this->Form->control('name',["class"=>"form-control"]);
            echo $this->Form->control('descripcion',["class"=>"form-control"]);
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