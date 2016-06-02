<?php 
	if($_SESSION['auth'] == true){
		?>
		<a href="settings.php" class="toolbar__left">Panel de administración</a> <!-- hacer página de inicio sesion y enlazar aqui -->
        <a href="includes/logout.php" class="toolbar__right">Cerrar Sesión</a>
		<?php
	}else{
		?>
		<a href="session.php" class="toolbar__left">Inicia Sesión</a> <!-- hacer página de inicio sesion y enlazar aqui -->
        <a href="register.php" class="toolbar__right">Regístrate</a>
		<?php
	}