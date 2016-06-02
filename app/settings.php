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
    include("includes/settings_controls.php");
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
    <link rel="stylesheet" href="styles/settings.css">
    <!-- endbuild-->

    <!-- build:js bower_components/webcomponentsjs/webcomponents-lite.min.js -->
    <script src="bower_components/webcomponentsjs/webcomponents-lite.js"></script>
    <!-- endbuild -->

    <!-- Because this project uses vulcanize this should be your only html import
       in this file. All other imports should go in elements.html -->
    <link rel="import" href="elements/elements.html">

    <!-- For shared styles, shared-styles.html import in elements.html -->
    <style is="custom-style" include="shared-styles"></style>
</head>

<body unresolved>
    <span id="browser-sync-binding"></span>

    <paper-drawer-panel id="paperDrawerPanel" force-narrow="true">
        <!-- Drawer Scroll Header Panel -->
        <paper-scroll-header-panel drawer fixed>

            <!-- Drawer Toolbar -->
            <paper-toolbar id="drawerToolbar">
                <span class="toolbar__logo toolbar__logo--menu"></span>
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
                <a>
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
                <paper-icon-button icon="refresh"></paper-icon-button>
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
                <div class="mobile-size">
                    <paper-menu>
                        <paper-tabs>
                            <paper-tab link>
                                <a class="mobile-size__tab" id="info-tab-sm">
                                    <span>Info</span>
                                </a>
                            </paper-tab>
                            <paper-tab link>
                                <a class="mobile-size__tab" id="image-tab-sm">
                                    <span>Imagen</span>
                                </a>
                            </paper-tab>
                            <paper-tab link>
                                <a class="mobile-size__tab" id="tip-tab-sm">
                                    <span>Tip</span>
                                </a>
                            </paper-tab>
                            <paper-tab link>
                                <a class="mobile-size__tab" id="publish-tab-sm">
                                    <span>Siembra</span>
                                </a>
                            </paper-tab>
                            <paper-tab link>
                                <a class="mobile-size__tab" id="close-tab-sm">
                                    <span>Cerrar</span>
                                </a>
                            </paper-tab>
                        </paper-tabs>
                    </paper-menu>
                </div>
                <div class="rest-size">
                    <paper-menu>
                        <paper-tabs>
                            <paper-tab link>
                                <a class="rest-size__tab" id="info-tab-lg">
                                    <span>Editar Info</span>
                                </a>
                            </paper-tab>
                            <paper-tab link>
                                <a class="rest-size__tab" id="image-tab-lg">
                                    <span>Cambiar Imagen</span>
                                </a>
                            </paper-tab>
                            <paper-tab link>
                                <a class="rest-size__tab" id="tip-tab-lg">
                                    <span>Crear Tip</span>
                                </a>
                            </paper-tab>
                            <paper-tab link>
                                <a class="rest-size__tab" id="publish-tab-lg">
                                    <span>Insertar Siembra</span>
                                </a>
                            </paper-tab>
                            <paper-tab link>
                                <a class="rest-size__tab" id="close-tab-lg">
                                    <span>Cerrar Cuenta</span>
                                </a>
                            </paper-tab>
                        </paper-tabs>
                    </paper-menu>
                </div>
                <section id="info">
                    <paper-card class="card" elevation="1">
                        <div class="card__content">
                            <h3 class="card__header">Edita tus datos</h3>
                            <form method="post" action="settings.php" id="form">
                                <paper-input class="card__name" name="name" label="Nombre" required>Nombre</paper-input>
                                <paper-input class="card__surname" name="surname" label="Apellidos" required>Apellidos</paper-input>
                                <paper-input class="card__user" name="user" label="Usuario" required>Usuario</paper-input>
                                <paper-input type="password" id="password" class="card__password" name="password" label="Contraseña" required>Contraseña</paper-input>
                                <paper-input type="password" id="password2" class="card__password2" name="password2" label="Repita contraseña" required>Repita contraseña</paper-input>
                                <paper-input id="mail" class="card__mail" name="mail" label="Mail" required>Mail</paper-input>
                                <paper-input id="birthdate" class="card__birthdate" name="birthdate" label="Fecha nacimiento" required>Fecha nacimiento</paper-input>
                                <paper-input id="address" class="card__address" name="address" label="Dirección huerto" required>Dirección huerto</paper-input>
                                <iron-autogrow-textarea class="card__about" name="description" rows="4" placeholder="Descripción"></iron-autogrow-textarea>
                                <div class="ripple-con">
	                                <input id="modify" class="btn" type="submit" name="modify" value="Guardar"> <!-- poner disabled="true" cuando haya visto Emanuel el efecto ripple-->
	                                <span class="ripple"></span>
	                            </div>
                            </form>
                        </div>
                    </paper-card>
                </section>
                <section id="image">
                    <paper-card class="card" elevation="1">
                        <div class="card__content">
                            <h3 class="card__header">Elige Tu foto</h3>
                            <form method="post" action="settings.php" id="form" enctype='multipart/form-data'>
                                <paper-input label="Foto" type="file"
                                    placeholder="Elija su foto de perfil" name="img">
                                </paper-input>
                                <div class="ripple-con">
	                                <input class="btn" type="submit" name="save_img" value="Guardar">
	                                <span class="ripple"></span>
	                            </div>
                            </form>
                        </div>
                    </paper-card>
                </section>
                <section id="tip">
                    <paper-card class="card" elevation="1">
                        <div class="card__content">
                            <h3 class="card__header">Inserta Un Tip</h3>
                            <form method="post" action="settings.php" id="form">
                                <paper-input class="card__name" name="title" label="Título" required>Título</paper-input>
                                <paper-input class="card__link" name="link" label="Link" required>Link</paper-input>
                                <iron-autogrow-textarea class="card__post" rows="4" name="content" placeholder="Resumen del Post"></iron-autogrow-textarea>
                                <div class="ripple-con">
                                    <input class="btn" type="submit" name="publish" value="Publicar">
                                    <span class="ripple"></span>
                                </div>
                            </form>
                        </div>
                    </paper-card>
                </section>
                <section id="publish">
                    <paper-card class="card" elevation="1">
                        <div class="card__content">
                            <h3 class="card__header">Crea Futura Siembra</h3>
                            <form method="post" action="settings.php" id="form">
                                <paper-dropdown-menu label="Producto">
                                    <paper-listbox class="dropdown-content" selected="1">
                                        <paper-item>Acelga</paper-item>
                                        <paper-item>Tomate</paper-item>
                                        <paper-item>Zanahoria</paper-item>
                                        <paper-item>Lechuga</paper-item>
                                    </paper-listbox>
                                </paper-dropdown-menu>
                                <paper-input id="date" class="card__date" name="date" label="Fecha prevista recolecta" required>Fecha prevista recolecta</paper-input>
                                <div class="ripple-con">
                                    <input class="btn" type="submit" name="publish" value="Publicar"> <!-- poner disabled="true" cuando haya visto Emanuel el efecto ripple-->
                                    <span class="ripple"></span>
                                </div>
                            </form>
                        </div>
                    </paper-card>
                </section>
                <section id="close">
                    <paper-card class="card" elevation="1">
                        <div class="card__content">
                            <h3 class="card__header">Cierra tu cuenta UGrow</h3>
                            <form method="post" action="settings.php" id="form">
                                <!-- <h3>Estás seguro de esta acción?</h3> CREAR POPUP QUE HAGA ESTA PREGUNTA -->
                                <div class="ripple-con">
                                    <input class="btn" type="submit" name="close" value="Cerrar"> <!-- poner disabled="true" cuando haya visto Emanuel el efecto ripple-->
                                    <span class="ripple"></span>
                                </div>
                            </form>
                        </div>
                    </paper-card>
                </section>
            </div>
            <a href="offer.php"><paper-fab icon="add" class="fixed"></paper-fab></a>
        </paper-scroll-header-panel>
    </paper-drawer-panel>




  
  <script src="scripts/settings.js"></script>
  
</body>

</html>
