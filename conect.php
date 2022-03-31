<?php
  // try {
    $user = "root";
    $pass = "";
    

try{


  if (strcmp($_SERVER['ENVIRONMENT_TYPE'], "development") == 0) {
    $bdd = new PDO(
        'mysql:host=localhost;dbname=vapfactory;charset=utf8',
        'root',
        ''
    );
}
  if (strcmp($_SERVER['ENVIRONMENT_TYPE'], "production") == 0){
    $bdd=new PDO(
      'mysql:host=109.234.164.161;dbname=sc1lgvu9627_bocace-stephane.sprint-06;charset=utf8',
      $_SERVER['DB_USER'],
      $_SERVER['DB_PASSWORD']
    );
    
  }
} catch(Exception $e){
  die('erreur : '.$e->getMessage());
}
?>