  

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
                                    
                                    <li>Historico de estado</li>
                                </ul>
                            </div>
                        </div>
                    <!-- //breadcrumbs -->

                    <div class="inner_content_w3_agile_info two_in">
                  <div class="row">
                     <div class="col-md-9">
                      <h2 class="w3_inner_tittle">Historico de estado</h2> 
                      </div>
                      <div class="col-md-1">
                       
                      </div>
 
                      <div class="col-md-2">
                      
                      <?= $this->Html->link('<i class="fa fa-arrow-left"  aria-hidden="true"></i> Retornar', ['controller' => 'Tickets', 'action' => 'view',$historico->ticket_id] ,  array("class"=>"btn btn-primary btn-lg pull-right  ",'escape' => false)  ) ?>     
                        </div> 
            </div>
                                    <!-- tables -->
                                    
                                
                                <div class="w3l-table-info agile_info_shadow">
                                      <div class="row">
                                      <div class="col-md-9">
                                      <h3 class="w3_inner_tittle two">Historico de estado</h3>
                                      </div>
                                      <div class="col-md-3">
                                       
                                         </div>

                                </div>

<div class="historicos view large-9 medium-8 columns content">
     
    <table class="table table-striped">
        <tr>
            <th scope="row"><?= __('Estado') ?></th>
            <td><?=$historico->estado->name;// $historico->has('estado') ? $this->Html->link(, ['controller' => 'Estados', 'action' => 'view', $historico->estado->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $historico->has('user') ? $this->Html->link($historico->user->name, ['controller' => 'Users', 'action' => 'view', $historico->user->id]) : '' ?></td>
        </tr>
    
        <tr>
            <th scope="row"><?= __('Fecha') ?></th>
            <td><?= h($historico->fecha) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Descripcion') ?></h4>
        <?= $this->Text->autoParagraph(h($historico->descripcion)); ?>
    </div>
</div>


</div>
            
        </div>
<!-- //inner_content_w3_agile_info-->

    </div>
</div>