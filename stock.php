<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="utf-8" />
    <link rel="stylesheet" href="style/nav_bar.css?t=<? echo time(); ?>">
    
    <link rel="stylesheet" href="style/table.css?t=<? echo time(); ?>">
    <title>Vap Factory</title>
  </head>
  <body>
    <header>
      <nav>
      <ul>
          <li id="pre"><a href="index.php">accueil</a></li>
          <li><a href="stock.php">stock</a></li>
          <li><a href="ajout.php">ajout dans le stock</a></li>
          <li><a href="delete.php">suprim</a></li>
          <li><a href="update.php">mise a jour</a></li>
        </ul>
      </nav>
    </header>
    <br />
    <div>
      <!-- <p><?php include 'readexe.php';?></p> -->
      <table>
        <tr>
          <th>  reference  </th>
          <th>article</th>
          <th>type</th>
          <th>description</th>
          <th>prix_achat</th>
          <th>vente_unitaire</th>
          <th>quantité</th>
        </tr>
        <tr>
          <?php
      include "conect.php";
      $requete = $bdd->prepare("SELECT * from stock"); 
      $requete->execute(); 
      $row = $requete->fetchAll(); 
          for($i=0;$i<=sizeof($row)-1;$i++){
            foreach($row[$i] as $article => $value) { 
              if (!is_int($article) ) {
                ?>
                <td><?php echo  $value;?></td>
                <?php
                }  
            }
        ?>
        </tr>
        <?php
      }
      ?>
      </table>
      <?php  
      ?>
    </div>
  </body>
</html>
