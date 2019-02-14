<div class="home-wrappertable">
	<div class="container">
		<div class="row">
<form action="<?php echo URL_BASE?>/transfer/creartransferencia" method="post">
<div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Beneficiario</label>
      <input type="text" class="form-control" name="beneficiario">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Num.cuenta</label>
      <input type="text" class="form-control" name="num_cuenta">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Cantidad</label>
      <input type="number" class="form-control" name="cantidad">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Concepto</label>
      <input type="text" class="form-control" name="concepto">
    </div>
  </div>
  <div class="text-center">
  <button type="submit" class="btn btn-primary" name="btntransferencia">Crear transferencia</button>
  <a class="btnvolver" href="<?php echo URL_BASE?>/transfer/mostrar"><button type="button" class="btn btn-danger">Volver</button></a>
</div></form></div></div></div>