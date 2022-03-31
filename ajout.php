

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
          <li><a id="page"href="ajout.php">ajout dans le stock</a></li>
          <li><a href="delete.php">suprim</a></li>
          <li><a href="update.php">mise a jour</a></li>
        </ul>
      </nav>
    </header>
    <br />
    <div>
    
      <h1>ajout de nouveau produit</h1>
      <form  method="POST">
        <label>
          <p>la reference du produit</p>
          <input type="text" placeholder="La référence" name="reference" />
        </label>

        <label>
          <p>nom de larticle</p>
          <input type="text" placeholder="Le nom de l'article" name="nom" />
        </label>
        <label>type darticle:
          <select name="type" >
            <option value="E-cigarete">E-cigarete</option>
            <option value="E-liquide  ">E-liquide</option>
          </select>
        </label>
        <label>
          <p>La description de l'article</p>
          <input type="text" placeholder="La description de l'article" name="description"  />
        </label>
        <label>
          <p>Le prix d'achat unitaire</p>
          <input type="text" placeholder="Le prix d'achat unitaire" name="prix" />
        </label>

        <label>
          <p>vente_unitaire</p>
          <input type="text" placeholder="La vente_unitaire" name="vente_unitaire"  />
        </label>
        <label>
          <p>La quantité en stock</p>
          <input type="text" placeholder="La quantité en stock"name="quanttite"  />
        </label>
        <button id="sub" type="submit"  name="submit"  >submit</button>
      </form>
      
    </div>
              
      <?php
      include'conect.php';
      include'conn.php';
      $reference="";
      $nom="";
      $description="";
      $prix="";
      $vente="";
      $stock="";
      $type="";
      if (empty($_POST['reference'])){
        die();
           } else {
            
        $reference=htmlspecialchars($_POST['reference']);
        $requete = $bdd->prepare("SELECT `reference` FROM `stock` WHERE reference='$reference' "); 
        $requete->execute(); 
        $row = $requete->fetchAll(); 
        
         if (sizeof($row)>0) {
           echo"la reference existe deja";
           die();
         }     
            
          }
      
      if (empty($_POST['nom'])){
        die();
           } else {
         
        $nom=htmlspecialchars($_POST['nom']);
      }
      if(empty($_POST['type'])){
        die();
        // $err_stock = "Stock is required";
        } else { 
        $type=htmlspecialchars($_POST['type']);
      }
       
      if (empty($_POST['description'])){
        die();
        // $err_stock = "Stock is required";
           } else {
          
        $description=htmlspecialchars($_POST['description']);
      }
      
      if (empty($_POST['prix'])){
        die();
        // $err_stock = "Stock is required";
           } else {
          
        $prix=(int)htmlspecialchars($_POST['prix']);
      }
      
     
      
      if (empty($_POST['vente_unitaire'])){
        // $err_stock = "Stock is required";
        die();
           } else {
         
        $vente=(int)htmlspecialchars($_POST['vente_unitaire']); 
      }
      
      if (empty($_POST['quanttite'])){
        die();
        // $err_stock = "Stock is required";
           } else {
         
        $stock=(int)htmlspecialchars($_POST['quanttite']);
        
       
      }  
      

      $sql = "INSERT INTO `stock`( `reference`, `article`,`type`, `description`, `prix_achat`, `vente_unitaire`, `quantite`) VALUES ('$reference','$nom','$type','$description','$prix','$vente','$stock')";
      
      
      if (!$msqlClient) {
        die("Connection failed: " . mysqli_connect_error());
      }


      if (mysqli_query($msqlClient, $sql)) {
        echo "produits ajoutée";
      } 
        
      else {
       
        echo "Error: " . $sql . "<br>" . mysqli_error($msqlClient);
      }
      mysqli_close($msqlClient);

      ?>
     
    <script src="js/script.js"></script>
  </body>
</html>
