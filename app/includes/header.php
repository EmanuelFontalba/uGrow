<?php 
	if($_SESSION['auth'] == true){
    $notif = new Notification();
    $id_user = $_SESSION['user'][0]['id'];
		?>

		        <span class="container" tabindex="0">
            <a href="profile.php"><span><?php echo $_SESSION['user'][0]['name'];?></span></a>
            <a href="notifications.php"><paper-badge label="<?php $notif->show_count($id_user);?>"></paper-badge></a></span>
          </a>
          <style is="custom-style">
            .container{
              display: inline-block;
              margin-left: 30px;
              margin-right: 30px;
            }
            .container > a {
              text-decoration: none;
              color: white;
              display: inline-block;
              
            }
            .container paper-badge {
              --paper-badge-margin-left: 10px;
              --paper-badge-margin-bottom: 30px;
              --paper-badge-background: #CDDC39;
            }
          </style>
        <?php 
          if($_SESSION['user'][0]['rol']=="admin"){
            ?>
             <a style="color: white;" href="admin.php" class="toolbar__left"><paper-icon-button icon="gavel"></paper-icon-button></a>
            <?php
          }
        ?>
		    <a style="color: white;" href="settings.php" class="toolbar__left"><paper-icon-button icon="settings"></paper-icon-button></a>
        <a style="color: white;" href="includes/logout.php" class="toolbar__right"><paper-icon-button icon="power-settings-new"></paper-icon-button></a>
       
		<?php
	}else{
		?>
		    <a href="session.php" class="toolbar__left">Inicia Sesión</a> <!-- hacer página de inicio sesion y enlazar aqui -->
        <a href="register.php" class="toolbar__right">Regístrate</a>
		<?php
	}