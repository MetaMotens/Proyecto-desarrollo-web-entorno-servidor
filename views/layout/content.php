<div class="home-wrapper">
	<div class="container">
		<div class="row">


			<div class="col-md-10 col-md-offset-1">
				<div class="home-content">
					<h1 class="white-text">EL BANCO DE LAS MEJORES EMPRESAS</h1>
					<p class="white-text">Te estamos esperando, tú decides cuando.</p>
					<?php if(!isset($_SESSION['usuario'])):?>
					<button class="white-btn"><a href="<?php echo URL_BASE?>/user/mostraracceso">Acceso</a></button>
					<a class="btnregistro" href="<?php echo URL_BASE?>/user/mostrarregistro"><button class="main-btn">Registro</button></a>
					<?php else: echo $_COOKIE['bienvenida']?>
					<?php endif;?>
				</div>
			</div>


		</div>
	</div>
</div>
