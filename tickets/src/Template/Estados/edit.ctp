
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
                                    
                                    <li>Estados</li>
                                </ul>
                            </div>
                        </div>
                    <!-- //breadcrumbs -->

                    <div class="inner_content_w3_agile_info two_in">
                  <div class="row">
                     <div class="col-md-9">
                      <h2 class="w3_inner_tittle">Estados</h2> 
                      </div>
                      <div class="col-md-1">
                       
                      </div>
 
                      <div class="col-md-2">
                      
                      <?= $this->Html->link('<i class="fa fa-arrow-left"  aria-hidden="true"></i> Retornar', ['controller' => 'Estados', 'action' => 'index'] ,  array("class"=>"btn btn-primary btn-lg pull-right  ",'escape' => false)  ) ?>     
                        </div> 
            </div>
                                    <!-- tables -->
                                    
                                
                                <div class="w3l-table-info agile_info_shadow">
                                      <div class="row">
                                      <div class="col-md-9">
                                      <h3 class="w3_inner_tittle two">Estados</h3>
                                      </div>
                                      <div class="col-md-3">
                                         
                                         </div>

                                </div>
    
<div class="estados form large-9 medium-8 columns content">
    <?= $this->Form->create($estado) ?>
    <fieldset>
        <legend><?= __('Editar Estado') ?></legend>
        <?php
            echo $this->Form->control('name',["class"=>"form-control"]);
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