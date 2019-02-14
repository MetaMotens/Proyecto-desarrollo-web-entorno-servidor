<?php
use models\CardModel;
?>
<div class="home-wrappertable">
	<div class="container">
		<div class="row">
		
		 <?php
  $tarjetas = array();
  $cardmodel = new CardModel();
  $tarjetas = $cardmodel->conseguirTarjetas();
  if ($tarjetas != null):
  ?> 
		
<table class="table table-hover table-dark">
  <thead>
    <tr>
      <th scope="col">N� Tarjeta</th>
      <th scope="col">Fecha inicio</th>
      <th scope="col">Fecha caducidad</th>
      <th scope="col">Estado</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($tarjetas as $tarjeta):?>
    <tr>
      <th scope="row"><?php echo $tarjeta->getNum_tarjeta();?></th>
      <td><?php echo $tarjeta->getFecha_inicio();?></td>
      <td><?php echo $tarjeta->getFecha_fin();?></td>
      <td><?php echo $tarjeta->getValidado();?></td>
    </tr>
    <?php endforeach;?>
  </tbody>
</table>
<?php else:?>
<div class="text-center"><p>No hay ninguna tarjeta activa. Si lo desea puede solicitar una nueva tarjeta.</p></div>
<?php endif;?>
<div class="text-center">
<form action="<?php echo URL_BASE?>/card/vistacreartarjeta" method="post">
  <button type="submit" class="btn btn-primary" name="btntarjeta">Nueva tarjeta</button>
  <a class="btnvolver" href="<?php echo URL_BASE?>"><button type="button" class="btn btn-danger">Volver</button></a>
</form></div></div></div></div>