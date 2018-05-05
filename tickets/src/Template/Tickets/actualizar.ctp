

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Historico de trabajo</h4>
      </div>
      <div class="modal-body">
        
          <div class="historicos form large-9 medium-8 columns content">
   <?= $this->Form->create($ticket, array(
          'url'   => array(
               'controller' => 'Tickets','action' => 'ActualizarTicket'
           ), 
          'type'    => 'file', 
          'class' =>'panel-body wrapper-lg'
       ) ) ?>

         <?php  echo $this->Form->input('id');?>
    <fieldset>
        <legend><?= __('Editar Estado') ?></legend>
        <?php
            echo $this->Form->input('progreso',["class"=>"form-control", "max"=>100,"min"=>0]);
            echo $this->Form->control('estado_id', ['options' => $estados, 'empty' => true,"class"=>"form-control"]);
            echo $this->Form->input('comprobante',["type"=>"file"]);

            
          ?>
          <br>
          <label>Descripcion del trabajo realizado</label>
          <textarea name="descripciones" required  class="form-control"></textarea>
      </fieldset>
      <br>
      <?= $this->Form->button(__('Submit'),["class"=>"btn btn-success"]) ?>
      <?= $this->Form->end() ?>
  </div>




      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">cerrar</button>
        < 
      </div>
    </div>
  </div>
</div>