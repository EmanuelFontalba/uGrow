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
    if(isset($_POST['modify'])){
        $user = new User();
        $user->modify(
                'fonty',//cambiar por el de la sesion cuando exista
                $_POST['name'],
                $_POST['surname'],
                $_POST['user'],
                $_POST['password'],
                $_POST['mail'],
                $_POST['birthdate'],
                $_POST['description'],
                $_POST['address']
            );
    }
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
                <style is="custom-style">
                    paper-card.profile__basic, paper-card.profile__offer, paper-card.profile__map, paper-card.profile__opinions, paper-card.profile__tips, paper-card.profile__future {
                        --paper-card-header-color: var(--primary-color);
                    }
                    iron-icon.star {
                        --iron-icon-width: 16px;
                        --iron-icon-height: 16px;
                        color: var(--paper-amber-500);
                    }
                    iron-icon.star:last-of-type { color: var(--paper-grey-500); }
                    .profile__collect { color: var(--primary-color); }
                    google-map {
                        height: 150px;
                    }
                </style>
                <div class="up-block">
                    <div class="left-block">
                        <paper-card class="profile__basic" heading="Amanda Lopez" image="./images/1.jpg">
                            <div class="card-content">
                                Tengo más de diez años de experiencia en horticultura urbana, el ecologismo es mi pasión, todas mis recolectas son sostenibles.
                            </div>
                            <div class="card-actions">
                                <span class="left">35 años</span>
                                <div class="left">
                                    <iron-icon class="star" icon="star"></iron-icon>
                                    <iron-icon class="star" icon="star"></iron-icon>
                                    <iron-icon class="star" icon="star"></iron-icon>
                                </div>
                                <span class="left">Pozoblanco</span>
                            </div>
                        </paper-card>
                        <paper-card class="profile__offer" heading="Ofrezco">
                            <div class="card-content">
                                <paper-listbox multi>
                                    <paper-item>Tomate<span class="right">15kg</span></paper-item>
                                    <paper-item>Calabacín<span class="right">7kg</span></paper-item>
                                    <paper-item>Pimiento<span class="right">9kg</span></paper-item>
                                </paper-listbox>
                            </div>
                            <div class="card-actions">
                                <paper-button class="profile__collect">Recolectar!</paper-button>
                            </div>
                        </paper-card>
                    </div>
                    <div class="right-block">
                        <div class="right-block__up">
                            <paper-card class="profile__map" heading="C/ Arcos de la Frontera, 34. Córdoba">
                            <div class="card-content">
                                <google-map latitude="37.77493" longitude="-122.41942" zoom></google-map>
                            </div>
                        </paper-card>
                        <paper-card class="profile__opinions" heading="Opiniones">
                            <div class="card-content">
                                <template is="dom-bind">
                                    <iron-ajax url="data.json" last-response="{{data}}" auto></iron-ajax>
                                    <iron-list items="[[data]]" as="item">
                                        <template>
                                            <div><p>Nombre: [[item.name]]</p></div>
                                            <div><p>Opinion: [[item.opinion]]</p></div>
                                        </template>
                                    </iron-list>
                                </template>
                            </div>
                        </paper-card>
                        </div>
                        <div class="right-block__down">
                            <paper-card class="profile__tips" heading="Tips">
                                <div class="card-content">
                                    <template is="dom-bind">
                                        <iron-ajax url="data.json" last-response="{{data}}" auto></iron-ajax>
                                        <iron-list items="[[data]]" as="item">
                                            <template>
                                                <div>Título: [[item.title]]</div>
                                                <div>Texto: [[item.text]]</div>
                                            </template>
                                        </iron-list>
                                    </template>
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
            <paper-fab icon="add" class="fixed"></paper-fab>
      	</paper-scroll-header-panel>
    </paper-drawer-panel>

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
