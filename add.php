
<?php
  include'conect.php';
  $reference=$_GET['ref'];?>
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
          <li id="pre"><a  href="index.php">accueil</a></li>
          <li><a href="stock.php">stock</a></li>
          <li><a href="ajout.php">ajout dans le stock</a></li>
          <li><a href="delete.php">suprim</a></li>
          <li><a id="page" href="update.php">mise a jour</a></li>
        </ul>
      </nav>
    </header>
    <br />  
<div>
    
<h1>modification de  produit</h1>
      <form  method="POST">
  
        
      <label>
          <p>nom de larticle</p>
          <input type="text" placeholder="Le nom de l'article" name="nom" <?php include'conect.php'; 
                                                                                  $requete = $bdd->prepare("SELECT `article` FROM `stock`  WHERE `reference`=$reference"); 
                                                                                  $requete->execute(); 
                                                                                  $row = $requete->fetchAll(); 
                                                                                  
                                                                                  ?>value="<?php echo  $row[0]['article'];?>"/>
        </label>
        <label name="type">type darticle:
          <?php
            $requete = $bdd->prepare("SELECT `type` FROM `stock`  WHERE `reference`=$reference"); 
                                                                                  $requete->execute(); 
                                                                                  $row = $requete->fetchAll(); 
                                                                                  
                                                                                  echo  $row[0]['type'];?>
            

        </label>
        <label>
          
          <p>La description de l'article</p>
          <input type="text" placeholder="La description de l'article" name="description" <?php include'conect.php'; 
                                                                                  $requete = $bdd->prepare("SELECT `description` FROM `stock`  WHERE `reference`=$reference"); 
                                                                                  $requete->execute(); 
                                                                                  $row = $requete->fetchAll(); 
                                                                                  
                                                                                  ?>value="<?php echo  $row[0]['description'];?>"/>
        </label>
        <label>
          <p>Le prix d'achat unitaire</p>
          <input type="number" placeholder="Le prix d'achat unitaire" name="prix" <?php include'conect.php'; 
                                                                                  $requete = $bdd->prepare("SELECT `prix_achat` FROM `stock`  WHERE `reference`=$reference"); 
                                                                                  $requete->execute(); 
                                                                                  $row = $requete->fetchAll(); 
                                                                                  
                                                                                  ?>value="<?php echo  $row[0]['prix_achat'];?>"/>
        </label>

        <label>
          <p>vente_unitaire</p>
          <input type="number" placeholder="La vente_unitaire" name="vente_unitaire"<?php include'conect.php'; 
                                                                                  $requete = $bdd->prepare("SELECT `vente_unitaire` FROM `stock` WHERE `reference`=$reference"); 
                                                                                  $requete->execute(); 
                                                                                  $row = $requete->fetchAll(); 
                                                                                  
                                                                                  ?>value="<?php echo  $row[0]['vente_unitaire'];?>"/> 
        </label>
        <label>
          <p>La quantité en stock</p>
          <input type="number" placeholder="La quantité en stock"name="quanttite"  <?php include'conect.php'; 
                                                                                  $requete = $bdd->prepare("SELECT `quantite` FROM `stock`  WHERE `reference`=$reference"); 
                                                                                  $requete->execute(); 
                                                                                  $row = $requete->fetchAll(); 
                                                                                  
                                                                                  ?>value="<?php echo $row[0]['quantite'];?>"/> 
        </label>
        <button id="sub" type="submit"  name="submit"  >submit</button>
      </form>
      
    </div>
              
      <?php
      
      
   
      $nom="";
      $description="";
      $prix="";
      $vente="";
      $stock="";
      $conn="";
      $type="";
      if (empty($_POST['nom'])){
        die();
           } else {
         
        $nom=htmlspecialchars($_POST['nom']);
      }
      
      
      if (empty($_POST['description'])){
        die();
           } else {
          
        $description=htmlspecialchars($_POST['description']);
      }
      
      if (empty($_POST['prix'])){
        die();
           } else {
          
        $prix=(float)htmlspecialchars($_POST['prix']);
      }
      if (empty($_POST['vente_unitaire'])){
        die();
           } else {
         
        $vente=(int)htmlspecialchars($_POST['vente_unitaire']); 
      }
      
      if (empty($_POST['quanttite'])){
        die();
           } else {
         
        $stock=(int)htmlspecialchars($_POST['quanttite']);
      }      
      $sql = "UPDATE `stock` SET `article`='$nom',`description`='$description',`prix_achat`=$prix,`vente_unitaire`=$vente,`quantite`=$stock  WHERE `reference`=$reference ";
    
      include'conn.php';
      if (!$msqlClient) {
        die("Connection failed: " . mysqli_connect_error());
      }
      if (mysqli_query($msqlClient, $sql)===TRUE) {
        echo "donnée mis a jour";
      } 
      else {
       
        echo "Error: " . $sql . "<br>" . mysqli_error($msqlClient);
      }
      mysqli_close($msqlClient);
      // header("Refresh:0.1")      ?>
    <script src="js/script.js"></script>
  </body>
</html>
