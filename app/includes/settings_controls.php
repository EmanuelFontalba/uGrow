<?php
    if(isset($_POST['modify'])){
        $user = new User();
        
        $user->modify(
                $_SESSION['user'][0]['user'],
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

    if(isset($_POST['publish'])){
        $tip = new Tip();
        $tip->add(
                $_SESSION['user'][0]['id'],
                $_POST['title'],
                $_POST['content'],
                $_POST['link']
            );
    }

    include("includes/img_profile.php");

    if(isset($_POST['close'])){
        $user = new User();
        $user->close_account($_SESSION['user'][0]['id']);
        header("Location: includes/logout.php");
    } 
?>