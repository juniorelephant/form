<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $_POST['name'];
    if(!empty($name)){
        echo $name;
    }else{
        echo 'enter your name';
    }
}else{
    echo 'no value postd';
}