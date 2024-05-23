<?php
    $url='localhost';
    $username='root';
    $password='';
    $link=mysqli_connect($url,$username,$password,"restaurant");
    if(!$link){
        die('Could not Connect My Sql:' ); 
    }
?>