<?php
if(isset($_FILES['img'])){
    echo "<script type='text/javascript'>console.log('estoy en files');</script>";
    $type = "Imagen";
    $path = "users/".$_SESSION['user'][0]['user']."/profile."; 
    $name_ext = explode(".",$_FILES['img']['name']);
    $ext = $name_ext[count($name_ext)-1];
    $path = $path."jpeg";
    if($ext == "jpg" || $ext == "jpeg" || $ext == "png" || $ext == "gif"){
        if(!move_uploaded_file($_FILES['img']['tmp_name'], $path)){
            echo "Ha ocurrido un error en la subida";
            $lerror=true;
        }
    }else{
        echo "Formato de imagen no válido.";
        $lerror=true;
    }                             
}