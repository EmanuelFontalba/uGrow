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
<?php include("includes/incl.php");?>
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
  <link rel="stylesheet" href="styles/admin-offer-session.css">
  <!-- endbuild-->

  <!-- build:js bower_components/webcomponentsjs/webcomponents-lite.min.js -->
  <script src="bower_components/webcomponentsjs/webcomponents-lite.js"></script>
  <!-- endbuild -->

  <!-- Because this project uses vulcanize this should be your only html import
       in this file. All other imports should go in elements.html -->
  <link rel="import" href="elements/elements.html">
  <link href='https://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet' type='text/css'>

  <!-- For shared styles, shared-styles.html import in elements.html -->
  <style is="custom-style" include="shared-styles"></style>
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
        <paper-menu attr-for-selected="data-route" selected="[[route]]">
            <a data-route="logout" href="{{baseUrl}}logout">
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
            <style is="custom-style">
                .slogan, .card-session__header {
                    color: var(--primary-color);
                }
            </style>
            <div class="forms">
                <paper-card class="card-session">
                    <div class="card-session__content">
                        <h3 class="card-session__header">Inicia Sesión</h3>
                        <form method="post" action="index.php" id="form">
                            <paper-input name="user" label="Usuario" required>Usuario</paper-input>
                            <paper-input type="password" name="password" label="Password" required>Password</paper-input>
                            <div class="ripple-con">
                                <input id="session" class="btn" type="submit" name="session" value="Entrar"> <!-- poner disabled="true" cuando haya visto Emanuel el efecto ripple-->
                                <span class="ripple"></span>
                            </div>
                        </form>
                    </div>
                </paper-card>
            </div>
            <div class="slogan">
                <h1>"Comparte!! Crea experiencia UGrow"</h1>
            </div>
        </div>
    </paper-scroll-header-panel>

    <paper-toast id="toast">
        <span class="toast-hide-button" role="button" tabindex="0" onclick="app.$.toast.hide()">Ok</span>
    </paper-toast>

    <!-- Uncomment next block to enable Service Worker support (1/2) -->
    <!--
    <paper-toast id="caching-complete"
                 duration="6000"
                 text="Caching complete! This app will work offline.">
    </paper-toast>

    <platinum-sw-register auto-register
                          clients-claim
                          skip-waiting
                          base-uri="bower_components/platinum-sw/bootstrap"
                          on-service-worker-installed="displayInstalledToast">
      <platinum-sw-cache default-cache-strategy="fastest"
                         cache-config-file="cache-config.json">
      </platinum-sw-cache>
    </platinum-sw-register>
    -->

  </template>

  <!-- build:js scripts/app.js -->
  <script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
  <!-- endbuild-->
</body>

</html>
