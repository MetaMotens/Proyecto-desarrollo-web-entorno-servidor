<?php
use models\AccountModel;

$cuentasmodel = new AccountModel();

?>
<nav id="nav" class="navbar nav-transparent">
	<div class="container">

		<div class="navbar-header">

			<div class="navbar-brand">
				<a href="<?php echo URL_BASE?>"> <img class="logo" src="<?php echo URL_BASE;?>/assets/img/logo.png"
					alt="logo"> <img class="logo-alt" src="<?php echo URL_BASE;?>/assets/img/logo-alt.png" alt="logo">
				</a>
			</div>



			<div class="nav-collapse">
				<span></span>
			</div>

		</div>


		<ul class="main-nav nav navbar-nav navbar-right">
			<?php if(!isset($_SESSION))
                {
                    session_start();
                }
            ?>
			<?php if(isset($_SESSION['usuario'])):?>
			<?php if($_SESSION['usuario']->getRol() == "User"):?>
			<li><a href="<?php echo URL_BASE;?>/account/mostrar">Cuentas</a></li>
			<?php if($cuentasmodel->conseguirCuentasValidadas() != null):?>
			<li><a href="<?php echo URL_BASE;?>/transfer/mostrar">Transferencias</a></li>
			<li><a href="<?php echo URL_BASE;?>/card/mostrar">Tarjetas</a></li>
			<?php endif;?>
			<?php endif;?>
			<?php endif;?>
			<?php if(isset($_SESSION['usuario'])):?>
			<?php if($_SESSION['usuario']->getRol() == "admin"):?>
			<li><a href="<?php echo URL_BASE;?>/validation/mostrar">Validaciones</a></li>
			<?php endif;?>
			<?php endif;?>
			<li><a href="#contact">Contacto</a></li>
			<?php if(isset($_SESSION['usuario'])):?>
			<li><button type="button" class="btn btn-danger"><a class="btnvolver" href="<?php echo URL_BASE;?>/user/logout">Log out</a></buttton>
			<?php endif;?>
		</ul>
		


	</div>
</nav>