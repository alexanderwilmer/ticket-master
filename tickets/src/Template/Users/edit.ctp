 



    <div class="clearfix"></div>
        <!-- //w3_agileits_top_nav-->
        <!-- /inner_content-->
 



<div class="inner_content">
                    <!-- /inner_content_w3_agile_info-->

                    <!-- breadcrumbs -->
                        <div class="w3l_agileits_breadcrumbs">
                            <div class="w3l_agileits_breadcrumbs_inner">
                                <ul>
                                    <li><a href="main-page.html">Home</a><span>«</span></li>
                                    
                                    <li>Usuarios</li>
                                </ul>
                            </div>
                        </div>
                    <!-- //breadcrumbs -->

                    <div class="inner_content_w3_agile_info two_in">
                      <h2 class="w3_inner_tittle">Usuarios</h2>
                                    <!-- tables -->
                                    
                                
                                <div class="w3l-table-info agile_info_shadow">
                                      <h3 class="w3_inner_tittle two">Usuarios</h3>





<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Edit User') ?></legend>
        <?php
      //      echo $this->Form->control('name',["class"=>"form-control"]);
        //    echo $this->Form->control('user',["class"=>"form-control"]);
            echo $this->Form->control('nombre',["class"=>"form-control"]);
            echo $this->Form->control('apellido',["class"=>"form-control"]);
            echo $this->Form->control('departamento_id', ['options' => $departamentos, 'empty' => true,"class"=>"form-control1"]);
          //  echo $this->Form->control('imagen',["type"=>"file"]);
            echo $this->Form->control('rol_id', ['options' => $rols, 'empty' => true,"class"=>"form-control1"]);
            echo $this->Form->control('correo' ,["class"=>"form-control"]);
            echo $this->Form->control('telefono' ,["class"=>"form-control1"]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>


   









                         
        </div>
<!-- //inner_content_w3_agile_info-->

    </div>
</div>
</div>