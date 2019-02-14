<div class="home-wrapper">
	<div class="container">
		<div class="row">
<?php if(isset($_GET['errorlogin'])): ?>
<h3 class="text-danger">Usuario o clave invalida</h3>
<?php endif;?>
<form action="<?php echo URL_BASE?>/user/login" class="registro" method="post">
  <div class="form-group">
    <label for="usuario">Usuario</label>
    <input type="text" class="form-control" aria-describedby="emailHelp" id="usuario" name="email">
  </div>
  <div class="form-group">
    <label for="passwd">Contraseña</label>
    <input type="password" class="form-control" id="passwd" name="passwd">
  </div>
  <button type="submit" class="btn btn-primary" name="btnlogin">Acceso</button>
  <a class="btnvolver" href="<?php echo URL_BASE?>"><button type="button" class="btn btn-danger">Volver</button></a>
</form>

</div></div></div>