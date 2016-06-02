<?php
    session_start();
    header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
    header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
    header("Cache-Control: no-store, no-cache, must-revalidate");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
    $errorAuth = "";

    if(!isset($_SESSION['auth'])){
        $_SESSION['auth'] = false;
    }
    if(!isset($_SESSION['user'])){
        $_SESSION['user'] = null;
    }

    function login($user,$pass){
        $usr = new User();
        return $usr->login($user, $pass);
    }

    if(isset($_POST['session'])){
        $try = login($_POST['user'], $_POST['password']);
        if($try){
            $usr_obj = new User();
            $usr = $usr_obj->getUser_forUserName($_POST['user']);
            $_SESSION['auth'] = true;
            $_SESSION['user'] = $usr;
            $errorAuth = "";
        }
        else{
            $errorAuth = "El usuario y/o contraseña no son correctos";
            $_SESSION['auth'] = false;
        }
    }
?>