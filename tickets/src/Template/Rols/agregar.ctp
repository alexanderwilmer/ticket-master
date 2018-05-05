 
<?php
if(isset($permiso)){
	 print_r($permiso);
}

?>
<div class="rols form large-9 medium-8 columns content">
    <?= $this->Form->create($rol) ?>
    <fieldset>
        <legend><?= __('Agregar rol') ?></legend>
        <?php
            echo $this->Form->input('name',["class"=>"form-control"]);
            echo $this->Form->input('description',["class"=>"form-control"],["label"=>"Descripcion"] );
        ?>
 
<legend><?= __('Modulos') ?></legend>
        
 <table>
 <th><tr>
 <td>Nombre</td><td>Ver</td><td>Editar</td><td>Agregar</td><td>Eliminar</td>
 </tr></th>
	 <tbody>
     	<?php  foreach ($modulos as $key =>$modulo) {
     	?>     
          <tr>
              <td><?php echo $modulo["name"]; ?><input type="hidden" value="<?php echo $modulo["id"]; ?>"   name="id-<?php echo $modulo["id"]; ?>" > </td>
	          <td><input type="checkbox" class="FCheck" name="ver-<?php echo $modulo["id"]; ?>" >  </td> 
			  <td><input type="checkbox" class="FCheck" name="add-<?php echo $modulo["id"]; ?>" >  </td> 
			  <td><input type="checkbox"  class="FCheck" name="edit-<?php echo $modulo["id"]; ?>" >  </td> 
              <td><input type="checkbox" class="FCheck" name="delete-<?php echo $modulo["id"]; ?>" >  </td> 
       </tr>
	    <?php 
        }
	    ?>
	 </tbody>
 </table>
    </fieldset>

    <?= $this->Form->button(__('Submit') , ["class"=>"btn btn-success"]) ?>
    <?= $this->Form->end() ?>
</div>
