<?php
use models\ValidationModel;
?>
<div class="home-wrappertable">
	<div class="container">
		<div class="row">
		
		<?php
  $cuentas = array();
  $validationmodel = new ValidationModel();
  $cuentas = $validationmodel->conseguirCuentas();
  if ($cuentas != null):
  ?> 
  <div class="text-center">Cuentas pendientes de activacion.</div>
<table class="table table-hover table-dark">
  <thead>
    <tr>
      <th scope="col">N� Cuenta</th>
      <th scope="col">Titular</th>
      <th scope="col">Direccion</th>
      <th scope="col">Dni</th>
      <th scope="col">Estado</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
  	<?php foreach ($cuentas as $cuenta):?>
  	<tr>
      <th scope="row"><?php echo $cuenta->getNum_Cuenta();?></th>
      <td><?php echo $cuenta->getTitular_Cuenta();?></td>
      <td><?php echo $cuenta->getDireccion();?></td>
      <td><?php echo $cuenta->getDni();?></td>
      <td><?php echo $cuenta->getValidado();?></td>
      <td class="text-right">
      	<a href="<?php echo URL_BASE?>/validation/validarcuenta/<?php echo $cuenta->getNum_Cuenta();?>"><button type="button" class="btn btn-success" name="btnvalidar">Validar</button></a>
      </td>
      </tr>
      <?php endforeach;?>
    
  </tbody>
</table>
<?php else:?>
<div class="text-center"><p>No hay ninguna cuenta pendiente de validacion.</p></div>
<?php endif;?>
<div>



<?php
  $tarjetas = array();
  $tarjetas = $validationmodel->conseguirTarjetas();
  if ($tarjetas != null):
  ?> 

  <div class="text-center">Tarjetas pendientes de activacion.</div>		
<table class="table table-hover table-dark">
  <thead>
    <tr>
      <th scope="col">N� Tarjeta</th>
      <th scope="col">Fecha inicio</th>
      <th scope="col">Fecha caducidad</th>
      <th scope="col">Estado</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($tarjetas as $tarjeta):?>
    <tr>
      <th scope="row"><?php echo $tarjeta->getNum_tarjeta();?></th>
      <td><?php echo $tarjeta->getFecha_inicio();?></td>
      <td><?php echo $tarjeta->getFecha_fin();?></td>
      <td><?php echo $tarjeta->getValidado();?></td>
      <td class="text-right"><a href="<?php echo URL_BASE?>/validation/validartarjeta/<?php echo $tarjeta->getNum_tarjeta();?>"><button type="button" class="btn btn-success" name="btnvalidar">Validar</button></a></td>
    </tr>
    <?php endforeach;?>
  </tbody>
</table>
<?php else:?>
<div class="text-center"><p>No hay ninguna tarjeta pendiente de validacion.</p></div>
<?php endif;?>
<div class="text-center">





  <a class="btnvolver" href="<?php echo URL_BASE?>"><button type="button" class="btn btn-danger">Volver</button></a>
</div>
</div></div></div>