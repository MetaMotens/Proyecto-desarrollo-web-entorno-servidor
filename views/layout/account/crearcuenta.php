<div class="home-wrappertable">
	<div class="container">
		<div class="row">
<form action="<?php echo URL_BASE?>/account/crearcuenta" method="post">
<div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Titular</label>
      <input type="text" class="form-control" name="titular">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Direccion</label>
      <input type="text" class="form-control" name="direccion">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">DNI</label>
      <input type="text" class="form-control" name="dni">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Saldo inicial</label>
      <input type="number" class="form-control" name="saldo">
    </div>
  </div>
  <div class="text-center">
  <button type="submit" class="btn btn-primary" name="btncuenta">Crear cuenta</button>
  <a class="btnvolver" href="<?php echo URL_BASE?>/account/mostrar"><button type="button" class="btn btn-danger">Volver</button></a>
</div></form></div></div></div>