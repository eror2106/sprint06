<?php

function getDatabaseConnexion() {
  try {
      $user = "root";
    $pass = "";
    $pdo = new PDO('mysql:host=localhost;dbname=vapfactory', $user, $pass);
     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $pdo;
    
  } catch (PDOException $e) {
      print "Erreur !: " . $e->getMessage() . "<br/>";
      die();
  }
}


function getAllUsers() {
  $con = getDatabaseConnexion();
  $requete = 'SELECT * from stock';
  $rows = $con->query($requete);
  return $rows;
}


function createUser($reference, $article, $descrition, $prix_achat,$vente_unitaire, $quantité) {
  try {
    $con = getDatabaseConnexion();
    $sql = "INSERT INTO utilisateurs (reference, article, descrition, prix_achat,vente_unitaire,quantité) 
        VALUES ('$reference', '$article', '$descrition' ,'$prix_achat','$vente_unitaire','$quantité')";
      $con->exec($sql);
  }
    catch(PDOException $e) {
      echo $sql . "<br>" . $e->getMessage();
    }
}

//recupere un user
function readUser($id) {
  $con = getDatabaseConnexion();
  $requete = "SELECT * from stock where id = '$id' ";
  $stmt = $con->query($requete);
  $row = $stmt->fetchAll();
  if (!empty($row)) {
    return $row[0];
  }
  
}

//met à jour le user
function updateUser($reference, $article, $descrition, $prix_achat,$vente_unitaire, $quantité) {
  try {
    $con = getDatabaseConnexion();
    $requete = "UPDATE stock set 
          reference = '$reference',
          article = '$article',
          descrition = '$descrition',
          prix_achat = '$prix_achat' ,
          vente_unitaire = '$vente_unitaire' ,
          quantité = '$quantité' 
          where id = '$id' ";
    $stmt = $con->query($requete);
  }
    catch(PDOException $e) {
      echo $sql . "<br>" . $e->getMessage();
    }
}

// suprime un user
function deleteUser($id) {
  try {
    $con = getDatabaseConnexion();
    $requete = "DELETE from stock where id = '$id' ";
    $stmt = $con->query($requete);
  }
    catch(PDOException $e) {
      echo $sql . "<br>" . $e->getMessage();
    }
}
?>