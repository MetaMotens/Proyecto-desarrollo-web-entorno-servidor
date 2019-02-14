<?php
use models\TransferModel;
?>
<div class="home-wrappertable">
	<div class="container">
		<div class="row">
		
		<?php
  $transferencias = array();
  $transfermodel = new TransferModel();
  $transferencias = $transfermodel->conseguirTransferencias();
  if ($transferencias != null):
  ?> 
<table class="table table-hover table-dark">
  <thead>
    <tr>
      <th scope="col">Nº Transferencia</th>
      <th scope="col">Beneficiario</th>
      <th scope="col">Cuenta beneficiario</th>
      <th scope="col">Fecha</th>
      <th scope="col">Concepto</th>
      <th scope="col">Cantidad</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($transferencias as $transferencia):?>
    <tr>
      <th scope="row"><?php echo $transferencia->getIdtransferencia();?></th>
      <td><?php echo $transferencia->getBeneficiario();?></td>
      <td><?php echo $transferencia->getNum_cuenta_beneficiario();?></td>
      <td><?php echo $transferencia->getFecha_transferencia();?></td>
      <td><?php echo $transferencia->getConcepto();?></td>
      <td><?php echo $transferencia->getCantidad();?></td>
    </tr>
    <?php endforeach;?>
  </tbody>
</table>
<?php else:?>
<div class="text-center"><p>No hay ninguna transferencia asociada a esta cuenta.</p></div>
<?php endif;?>
<div class="text-center">
<form action="<?php echo URL_BASE?>/transfer/vistacreartransferencia" method="post">
  <button type="submit" class="btn btn-primary">Nueva transferencia</button>
  <a class="btnvolver" href="<?php echo URL_BASE?>"><button type="button" class="btn btn-danger">Volver</button></a>
</form></div></div></div></div>