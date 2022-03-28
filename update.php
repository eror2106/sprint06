

<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="utf-8" />
    <link rel="stylesheet" href="style/nav_bar.css">    
    <title>Vap Factory</title>
  </head>
  <body>
    <header>
    <nav>
      <ul>
          <p id="logo">Vap Factory</p>
          <li id="pre"><a href="index.php">accueil</a></li>
          <li><a href="stock.php">stock</a></li>
          <li><a href="ajout.php">ajout dans le stock</a></li>
          <li><a href="delete.php">suprim</a></li>
          <li><a id="page" href="update.php">mise a jour</a></li>
        </ul>
      </nav>
    </header>
    <br />
    <div>
    
      <h1>mise a jour de produit</h1>
      <form  method="POST">
        <label>
          <p>la reference du produit</p>
          <input type="text" placeholder="La référence" name="reference" />
        </label>
        
        <button id="sub" type="submit"  name="submit"  >submit</button>
      </form>
      
    </div>
              
      <?php
      include "conect.php";
    
      if (empty($_POST['reference'])){
        die();
        // $err_stock = "Stock is required";
           } else {
          
        $reference=htmlspecialchars($_POST['reference']);
        $requete = $bdd->prepare("SELECT `reference` FROM `stock` WHERE reference='$reference' "); 
        $requete->execute(); 
        $row = $requete->fetchAll(); 
        if (sizeof($row)<0) {
          echo"la reference n'existe pas";
          die();
        }  else{
          $requete = $bdd->prepare("SELECT  `reference`FROM `stock` WHERE `reference`='$reference' "); 
          $requete->execute(); 
          $row = $requete->fetchAll(); 
    
            if(!empty($row)){
              echo "la reference ".$reference." existe voulez vous modifier ce produit";
              header("location: add.php?ref='$reference'");
              
            }
            else{
              echo "la reference n'existe pas";
              die();
            }
        } 
      }
      
      
     
      ?>
     
    <script src="js/script.js"></script>
  </body>
</html>
