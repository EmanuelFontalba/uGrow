<!DOCTYPE html>
<!--
@license
Copyright (c) 2015 The Polymer Project Authors. All rights reserved.
This code may only be used under the BSD style license found at http://polymer.github.io/LICENSE.txt
The complete set of authors may be found at http://polymer.github.io/AUTHORS.txt
The complete set of contributors may be found at http://polymer.github.io/CONTRIBUTORS.txt
Code distributed by Google as part of the polymer project is also
subject to an additional IP rights grant found at http://polymer.github.io/PATENTS.txt
-->
<?php
    include("includes/incl.php");
    if(isset($_POST['register'])){
        $err_register   = false;
        $err_pass       = false;
        if($_POST['password']==$_POST['password2']){
            $user = new User();
            $is_registered = $user->register(
                $_POST['name'],
                $_POST['surname'],
                $_POST['user'],
                $_POST['password'],
                $_POST['mail'],
                $_POST['birthdate'],
                $_POST['description'],
                $_POST['address'],
                $_POST['city']
            );
            if($is_registered){
                header("Location: index.php");
            }else{
                $err_register = true;
            }
        }else{
            $err_pass = true;
        }
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
        <meta name="msapplication-TileColor" content="#3372DF">
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
        <link rel="stylesheet" href="styles/register.css">
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
            <paper-toolbar id="mainToolbar" class="tall toolbar">
                <span class="space"></span>
                <!-- Application name -->
                <div class="middle middle-container">
                    <div class="toolbar__logo"></div>
                </div>
                <div class="toolbar__links">
                    <span class="toolbar__left">Ya eres grower?</span>
                    <a href="#" class="toolbar__right" "Inicia Sesión">Inicia Sesión</a> <!-- enlazar este <a> con la pagina de inicia sesion. Recordar insertar dinámicamente clase para ocultar en caso de existir variable de sesion-->
                </div>
            </paper-toolbar>
            <div class="wellcome-image">
                <paper-card class="card">
                    <div class="card__content">
                        <h2 class="card__header">Regístrate!</h2>
                        <p id="error">
                            <?php 
                                if(isset($err_pass)){
                                    if($err_pass){
                                        echo "Las contraseñas no coinciden.";
                                    }

                                    if($err_register){
                                        echo "El usuario ya existe.";
                                    }
                                }
                            ?>
                        </p>
                        <style is="custom-style">
                            paper-checkbox.checkbox {
                                --paper-checkbox-checked-color: var(--primary-color);
                                --paper-checkbox-checked-ink-color: var(--primary-color);
                                --paper-checkbox-unchecked-color: var(--paper-green-900);
                                --paper-checkbox-unchecked-ink-color: var(--paper-green-900);
                                --paper-checkbox-label-color: var(--primary-color);
                            }
                        </style>
                        <form method="post" action="register.php" id="form">
                            <paper-input class="card__name" name="name" label="Nombre" required>Nombre</paper-input>
                            <paper-input class="card__surname" name="surname" label="Apellidos" required>Apellidos</paper-input>
                            <paper-input class="card__user" name="user" label="Usuario" required>Usuario</paper-input>
                            <paper-input type="password" id="password" class="card__password" name="password" label="Contraseña" required>Contraseña</paper-input>
                            <paper-input type="password" id="password2" class="card__password2" name="password2" label="Repita contraseña" required>Repita contraseña</paper-input>
                            <paper-input id="mail" class="card__mail" name="mail" label="Mail" required>Mail</paper-input>
                            <paper-input  id="birthdate" class="card__birthdate" name="birthdate" label="Fecha nacimiento" required>Fecha nacimiento</paper-input>
                            <paper-input id="address" class="card__address" name="address" label="Dirección huerto" required>Dirección huerto</paper-input>
                            <paper-dropdown-menu label="Ciudad">
                                <select class="dropdown-content" name="city">
                                    <?php 
                                    	$city = new City();
                                    	$city->createOptions("city");
                                    ?>
                                </select>
                            </paper-dropdown-menu>
                            <iron-autogrow-textarea class="card__about" name="description" rows="4" placeholder="Descripción"></iron-autogrow-textarea>
                            <paper-checkbox  id="checkbox" class="checkbox">Acepto las condiciones</paper-checkbox>
                            <div class="ripple-con">
                                <input class="btn" type="submit" name="register" value="Registrar">
                                <span class="ripple"></span>
                            </div>
                        </form>
                    </div>
                </paper-card>
                <div class="slogan">
                    <h1>"Comparte tu huerto, busca el origen"</h1>
                </div>
            <paper-toolbar class="middle footer">
                <div class="footer__left">
                    <a href="#" class="footer__links footer__contact" "Contacta">Contacta</a>
                    <a href="#" class="footer__links footer__faq" "Contacta">FAQ's</a>
                </div>
                <div class="footer__right">
                    <div class="footer__right--up">
                        <p>uGrow 2016</p>
                    </div>
                    <div class="footer__right--down-A">
                        <a href="#" class="footer__links" "Contacta">Política de privacidad</a>
                        <a href="#" class="footer__links" "Contacta">Política de cookies</a>
                        <a href="#" class="footer__links" "Contacta">Condiciones de uso</a>
                    </div>
                    <div class="footer__right--down-B">
                        <a href="#" class="footer__links" "Contacta">Privacidad</a>
                        <a href="#" class="footer__links" "Contacta">Cookies</a>
                        <a href="#" class="footer__links" "Contacta">Uso</a>
                    </div>
                </div>
            </paper-toolbar>
        </template>
        <!-- build:js scripts/app.js -->
        <script src="scripts/register.js"></script>
        <!-- endbuild-->
    </body>
</html>
