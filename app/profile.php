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
    $user_obj = new User();
    if($_SESSION['auth']==false){
        header("Location: index.php");
    }

    if(isset($_GET['id'])){
        $user = $user_obj->getAllUser_ForId($_GET['id'])[0];
    }else{
        $user = $_SESSION['user'][0];
    }

    $notif = new Notification();
    $id_user = $_SESSION['user'][0]['id'];

    //---code----//
    $city_obj = new City();
    $city_array = $city_obj->get($user['idCity'])[0];
    $city = $city_array['city'];

    $comment_obj = new Comment();
    $offer_obj = new Offer();

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
    <link rel="stylesheet" href="styles/profile.css">
    <!-- endbuild-->

    <!-- build:js bower_components/webcomponentsjs/webcomponents-lite.min.js -->
    <script src="bower_components/webcomponentsjs/webcomponents-lite.js"></script>
    <!-- endbuild -->

    <!-- Because this project uses vulcanize this should be your only html import
       in this file. All other imports should go in elements.html -->
    <link rel="import" href="elements/elements.html">

    <!-- For shared styles, shared-styles.html import in elements.html -->
    <style is="custom-style" include="shared-styles"></style>
    <style type="text/css">
    .comment{
      border-top: 1px solid #CCC;
      padding-top: 10px;
    }
    .tip .title-text{
        color: white !important;
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
                    <iron-icon icon="exit-to-app"></iron-icon>
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
                    <span><?php echo $_SESSION['user'][0]['name']." ".$_SESSION['user'][0]['lastname'];?></span>
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
                <a style="color: white;" href="index.php"><paper-icon-button icon="refresh"></paper-icon-button></a>
                <paper-icon-button icon="search" id="search"></paper-icon-button>

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
                <style is="custom-style">
                    paper-card.profile__basic, paper-card.profile__offer, paper-card.profile__map, paper-card.profile__opinions, paper-card.profile__tips, paper-card.profile__future {
                        --paper-card-header-color: var(--primary-color);
                    }
                    iron-icon.star {
                        --iron-icon-width: 16px;
                        --iron-icon-height: 16px;
                        color: var(--paper-amber-500);
                    }
                    iron-icon.star.grey { color: var(--paper-grey-500); }
                    .profile__collect { color: var(--primary-color); }
                    google-map {
                        height: 150px;
                    }
                </style>
                <div class="up-block">
                    <div class="left-block">
                        <paper-card class="profile__basic" heading="<?php echo $user['name'].' '.$user['lastname'];?>" image="users/<?php echo $user['user'];?>/profile.jpeg">
                            <div class="card-content">
                                <?php echo $user['description'];?>
                            </div>
                            <div class="card-actions">
                                
                                <div class="left">
                                    <?php echo($comment_obj->showStars($user['id']));?>
                                </div>
                                <span class="left"><?php echo $city;?></span>
                            </div>
                        </paper-card>
                        <paper-card class="profile__offer" heading="Ofrezco">
                            <div class="card-content">
                                <paper-listbox multi>
                                    <?php $offer_obj->show_ForUser($user['id']);?>
                                </paper-listbox>
                            </div>
                        </paper-card>
                    </div>
                    <div class="right-block">
                        <div class="right-block__up">
                        <paper-card class="profile__map" heading="<?php echo $user['location'];?>">
                            <div class="card-content">
                                <paper-listbox multi>
                                    <paper-item>Email:</paper-item>
                                    
                                    <paper-item><?php echo $user['mail'];?></paper-item>
                                </paper-listbox>
                            </div>
                        </paper-card>
                        <paper-card class="profile__opinions" heading="Opiniones">
                            <div class="card-content">
                                
                                <?php $comment_obj->showComments($user['id']);?>
                                
                            </div>
                        </paper-card>
                        </div>
                        <div class="right-block__down">
                            <paper-card class="profile__tips" heading="Tips">
                                <div class="card-content">
                                    <?php 
                                      $tip_obj = new Tip();
                                      $tip_obj->show_recent_user($user['id']);
                                    ?>
                                </div>
                            </paper-card>
                        </div>
                    </div>
                </div>
                <paper-card class="profile__future" heading="Próximas siembras">
                    <div class="card-content">
                        <template is="dom-bind">
                            <iron-ajax url="data.json" last-response="{{data}}" auto></iron-ajax>
                            <iron-list items="[[data]]" as="item">
                                <template>
                                    <div>Producto: [[item.product]]</div>
                                    <div>Fecha recogida: [[item.date]]</div>
                                </template>
                            </iron-list>
                        </template>
                    </div>
                </paper-card>
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
</body>

</html>
