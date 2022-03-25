<?php
  try {
    $user = "root";
    $pass = "";
    $bdd = new PDO('mysql:host=localhost;dbname=vapfactory', $user, $pass);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
  } catch (PDOException $e) {
      print "Erreur !: " . $e->getMessage() . "<br/>";
      die();
  }
?>