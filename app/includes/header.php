<?php 
	if($_SESSION['auth'] == true){
    $notif = new Notification();
    $id_user = $_SESSION['user'][0]['id'];
		?>
		<a href="notifications.php" class="container" tabindex="0">
            <span><?php echo $_SESSION['user'][0]['name'];?></span>
            <paper-badge label="<?php $notif->show_count($id_user);?>"></paper-badge>
          </a>
          <style is="custom-style">
            .container {
              text-decoration: none;
              color: white;
              display: inline-block;
              margin-left: 30px;
              margin-right: 30px;
            }
            .container > paper-badge {
              --paper-badge-margin-left: 20px;
              --paper-badge-margin-bottom: 0px;
              --paper-badge-background: #CDDC39;
            }
          </style>
		    <a style="color: white;" href="settings.php" class="toolbar__left"><paper-icon-button icon="settings"></paper-icon-button></a>
        <a style="color: white;" href="includes/logout.php" class="toolbar__right"><paper-icon-button icon="power-settings-new"></paper-icon-button></a>
       
		<?php
	}else{
		?>
		    <a href="session.php" class="toolbar__left">Inicia Sesión</a> <!-- hacer página de inicio sesion y enlazar aqui -->
        <a href="register.php" class="toolbar__right">Regístrate</a>
		<?php
	}