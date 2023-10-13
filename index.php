<?php 

if( isset($_GET['url'])){
    $url = 'views/';
    $url .= $_GET['url'];   
    require_once($url);
}else{
    require_once('views/login.php');
}


 
?>