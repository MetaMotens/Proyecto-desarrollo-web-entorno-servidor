<?php
use models\AccountModel;
?>
<div class="home-wrappertable">
	<div class="container">
		<div class="row">
		
  <?php
  $cuentas = array();
  $accountmodel = new AccountModel();
  $cuentas = $accountmodel->conseguirCuentas();
  if ($cuentas != null):
  ?> 
<table class="table table-hover table-dark">
  <thead>
    <tr>
      <th scope="col">N� Cuenta</th>
      <th scope="col">Titular</th>
      <th scope="col">Direccion</th>
      <th scope="col">Dni</th>
      <th scope="col">Saldo actual</th>
      <th scope="col">Estado</th>
    </tr>
  </thead>
  <tbody>
  	<?php foreach ($cuentas as $cuenta):?>
  	<tr>
      <th scope="row"><?php echo $cuenta->getNum_Cuenta();?></th>
      <td><?php echo $cuenta->getTitular_Cuenta();?></td>
      <td><?php echo $cuenta->getDireccion();?></td>
      <td><?php echo $cuenta->getDni();?></td>
      <td><?php echo $cuenta->getSaldo();?></td>
      <td><?php echo $cuenta->getValidado();?></td>
      </tr>
      <?php endforeach;?>
    
  </tbody>
</table>
<?php else:?>
<div class="text-center"><p>No hay ninguna cuenta asociada. Si lo desea puede solicitar una nueva cuenta.</p></div>
<?php endif;?>
<div class="text-center">
<form action="<?php echo URL_BASE?>/account/vistacrearcuenta" method="post">
  <button type="submit" class="btn btn-primary" name="btncuenta">Nueva cuenta</button>
  <a class="btnvolver" href="<?php echo URL_BASE?>"><button type="button" class="btn btn-danger">Volver</button></a>
</form>
</div>
</div></div></div>