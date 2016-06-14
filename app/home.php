<!doctype html>
<!--
@license
Copyright (c) 2015 The Polymer Project Authors. All rights Me interesa!d.
This code may only be used under the BSD style license found at http://polymer.github.io/LICENSE.txt
The complete set of authors may be found at http://polymer.github.io/AUTHORS.txt
The complete set of contributors may be found at http://polymer.github.io/CONTRIBUTORS.txt
Code distributed by Google as part of the polymer project is also
subject to an additional IP rights grant found at http://polymer.github.io/PATENTS.txt
-->
<?php 
include("includes/incl.php");
if(!isset($_POST['recolecta']) || !isset($_SESSION['user'])){
  header("Location: index.php");
}
$notif = new Notification();
$id_user = $_SESSION['user'][0]['id'];
?>

<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="generator" content="Polymer Starter Kit">
  <title>uGrow</title>

  <!-- Place favicon.ico in the `app/` directory -->

  <!-- Chrome for Android theme color -->
  <meta name="theme-color" content="#2E3AA1">

  <!-- Web Application Manifest -->
  <link rel="manifest" href="manifest.json">

  <!-- Tile color for Win8 -->
  <meta name="msapplication-TileColor" content="#3072DF">

  <!-- Add to homescreen for Chrome on Android -->
  <meta name="mobile-web-app-capable" content="yes">
  <meta name="application-name" content="PSK">
  <link rel="icon" sizes="192x192" href="images/touch/chrome-touch-icon-192x192.png">

  <!-- Add to homescreen for Safari on iOS -->
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <meta name="apple-mobile-web-app-title" content="Polymer Starter Kit">
  <link rel="apple-touch-icon" href="images/touch/apple-touch-icon.png">

  <!-- Tile icon for Win8 (144x144) -->
  <meta name="msapplication-TileImage" content="images/touch/ms-touch-icon-144x144-precomposed.png">

  <!-- build:css styles/main.css -->
  <link rel="stylesheet" href="styles/main.css">
  <link rel="stylesheet" href="styles/home.css">
  <!-- endbuild-->

  <!-- build:js bower_components/webcomponentsjs/webcomponents-lite.min.js -->
  <script src="bower_components/webcomponentsjs/webcomponents-lite.js"></script>
  <!-- endbuild -->

  <!-- Because this project uses vulcanize this should be your only html import
       in this file. All other imports should go in elements.html -->
  <link rel="import" href="elements/elements.html">

  <!-- For shared styles, shared-styles.html import in elements.html -->
  <style is="custom-style" include="shared-styles"></style>

  <link rel="stylesheet" type="text/css" href="styles/popup.css">
  <style type="text/css">
    .popup__form select{
          margin-bottom: 10px;
          margin-top: 10px;
          margin-left: 55px;
    }

    .title-text{
      color: #009688 !important;
      text-align: left !important;
    }
  </style>
</head>

<body unresolved>
  <span id="browser-sync-binding"></span>
  <template is="dom-bind" id="app">

    <paper-drawer-panel id="paperDrawerPanel" force-narrow="true">
      <!-- Drawer Scroll Header Panel -->
      <paper-scroll-header-panel drawer fixed>

        <!-- Drawer Toolbar -->
        <paper-toolbar id="drawerToolbar">
          <span class="toolbar__logo toolbar__logo--home"></span>
        </paper-toolbar>

        <!-- Drawer Content -->
        <paper-menu>
	        <a  href="profile.php">
	            <iron-icon icon="face"></iron-icon>
	            <span>Perfil</span>
	        </a>
	        <a href="offer.php">
	            <iron-icon icon="shopping-basket"></iron-icon>
	            <span>Publicar Recolecta</span>
	        </a>
	        <a href="settings.php">
	            <iron-icon icon="settings"></iron-icon>
	            <span>Settings</span>
	        </a>
	        <a href="includes/logout.php">
	            <iron-icon icon="power-settings-new"></iron-icon>
	            <span>Logout</span>
	        </a>
    	</paper-menu>
      </paper-scroll-header-panel>

      <!-- Main Area -->
      <paper-scroll-header-panel main id="headerPanelMain" condenses keep-condensed-header>
        <!-- Main Toolbar -->
        <paper-toolbar id="mainToolbar" class="tall">
          <paper-icon-button id="paperToggle" icon="menu" paper-drawer-toggle></paper-icon-button>

          <span class="space"></span>

          <!-- Toolbar icons -->
          <a href="notifications.php" class="container" tabindex="0">
            <span><?php echo $_SESSION['user'][0]['name']." ";?></span>
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
                          <a style="color: white;" href="index.php"><paper-icon-button icon="home"></paper-icon-button></a>


          <!-- Application name -->
          <div class="middle middle-container">
            <div class="app-name">uGrow</div>
          </div>

          <!-- Application sub title -->
          <div class="bottom bottom-container">
            <div class="bottom-title">Comparte tu huerto, busca el origen</div>
          </div>
        </paper-toolbar>

        <!-- Main Content -->
        <div class="content">
          <my-popup></my-popup>
            <div class="sticky-anchor"></div>
            <paper-card heading="TIPS" class="tips" elevation="1" animated-shadow="true">
            	<!-- <my-tip title="Pre-fab homes" image="./images/tip3.jpg"></my-tip> -->
                <style is="custom-style">
                    paper-card.tips__tip {
                        --paper-card-header-color: #fff;
                    }
                </style>
                <?php 
                  $tip_obj = new Tip();
                  $tip_obj->show_recent();
                ?>
            </paper-card>
            <div class="sticky-anchor"></div>
            <div class="search-results">
                <paper-card id="sticky" class="form">
                    <form method="post" action="home.php" id="form">
                        <paper-input class="form__town" name="town" label="Localidad" >Localidad</paper-input>
                        <paper-input class="form__search" name="search" label="Busco" required>Busco</paper-input>
                        
                        <div class="ripple-con">
                            <input class="btn" type="submit" name="recolecta" value="Recolecta!"> <!-- poner disabled="true" cuando haya visto Emanuel el efecto ripple-->
                            <span class="ripple"></span>
                        </div>
                    </form>
                </paper-card>
                <div class="results">
                	<!-- <my-search image="./images/1.jpg" name="Amanda Lopez" location="Priego de Córdoba" about="Blablablablablablabla blablablab" product="Calabacín" amount="15"></my-search> -->
                        <style is="custom-style">
                            .results__name { @apply(--paper-font-headline); }
                            .results__location { color: var(--paper-grey-600); }
                            iron-icon.star {
                                --iron-icon-width: 16px;
                                --iron-icon-height: 16px;
                                color: var(--paper-amber-500);
                            }
                            iron-icon.star.grey { color: var(--paper-grey-500); }
                            .results__button { color: var(--primary-color); }
                        </style>
                        <?php 
                          if(isset($_POST['recolecta'])){
                            $offer_obj = new Offer();
                            echo $offer_obj->show($_POST['town'], $_POST['search']);
                          }
                        ?>
            </div>
            

          <iron-pages attr-for-selected="data-route" selected="{{route}}">
            <section data-route="home">
          </iron-pages>
        </div>
        <a href="offer.php"><paper-fab icon="shopping-basket" class="fixed"></paper-fab></a>
      </paper-scroll-header-panel>
    </paper-drawer-panel>

    <paper-toast id="toast">
      <span class="toast-hide-button" role="button" tabindex="0" onclick="app.$.toast.hide()">Ok</span>
    </paper-toast>

  </template>

  <!-- build:js scripts/app.js -->
  <script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
  
  <!-- endbuild-->

  <script type="text/javascript">
    window.addEventListener('load', function(){

      
      setTimeout(function(){
        var botones = document.getElementsByClassName('dealButton');
        
        for(var i=0; i<botones.length; i++){
		      var ev = botones[i];
		      ev.addEventListener("click", function(event){
		      	event.preventDefault();
		      	var id = this.getAttribute("go");
		      	var element = document.getElementById(id);
		        element.style.display="block";
		      });
        }
        console.log("Listo");
      }, 1);
      

    });

  </script>
</body>

</html>
