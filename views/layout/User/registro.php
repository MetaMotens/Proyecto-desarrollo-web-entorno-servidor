<div class="home-wrapper">
	<div class="container">
		<div class="row">
<?php if(isset($_GET['ok'])): ?>
<h3 class="text-success">Cuenta creada con exito</h3>
<?php endif;?>
<?php if(isset($_GET['error'])): ?>
<h3 class="text-danger">Error al crear cuenta</h3>
<?php endif;?>
			<form action="<?php echo URL_BASE?>/user/registro" class="registro"
				method="post">
				<div class="form-group">
					<label for="usuario">Usuario</label> <input type="text"
						class="form-control" aria-describedby="emailHelp" id="usuario"
						name="email">
				</div>
				<div class="form-group">
					<label for="passwd">Contraseña</label> <input type="password"
						class="form-control" id="passwd" name="passwd">
				</div>
				<div class="form-group">
					<select name="rol" class="custom-select custom-select-lg mb-3">
						<option selected>User</option>
						<option value="admin">Admin</option>
					</select>
				</div>
				<button type="submit" class="btn btn-primary" name="btnregistro">Registro</button>
				
					<a class="btnvolver" href="<?php echo URL_BASE?>"><button type="button" class="btn btn-danger">Volver</button></a>
				
			</form>

		</div>
	</div>
</div>