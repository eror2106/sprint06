<?php
  $servername="localhost";
  $dbname="vapfactory";
  $user = "root";
  $pass = "";
  
try{
  if (strcmp($_SERVER['ENVIRONMENT_TYPE'], "development") == 0){
    $msqlClient= mysqli_connect($servername,$user,$pass,$dbname); 
  }
  if (strcmp($_SERVER['ENVIRONMENT_TYPE'], "production") == 0){
    $msqlClient= mysqli_connect('109.234.164.161',$_SERVER['DB_USER'],$_SERVER['DB_PASSWORD'],'sc1lgvu9627_bocace-stephane.sprint-06');
    
  }
} catch(Exception $e){
  die('erreur : '.$e->getMessage());
}
  ?>