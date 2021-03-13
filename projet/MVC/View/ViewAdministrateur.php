<?php
require_once('../MVC/Controller/ControllerAdministrateur.php');
?>
<style>
  <?php include '../MVC/css/accueil.css'; ?>
</style>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</style>
<?php
class ViewAdministrateur
{


  public function logo()
  {
    echo '<img id= "logo" src="../MVC/Image/LOGO.png" style="width: 8%;height: 16%;"/>';
  }
  public function contact()
  {
    $c = new ControllerAdministrateur();
    $res = $c->contact();
    echo '<div id="icons"><ul>';

    foreach ($res as $row) {
      echo '<li class="icons-img"> <a href="' . $row["link"] . '"><img id="image' . $row["id"] . '" style="width: 2%;height: 4%;" src="../MVC/Image/' . $row["nom"] . '"></a></li>';
    }

    echo '</ul></div>';
  }
  public function cadre_Article()
  {

    if (isset($_POST['titre'])) {
      $titre = $_REQUEST['titre'];
      $_SESSION['titre'] = $titre;
      $image = $_REQUEST['image'];
      $description = $_REQUEST['description'];
      if (!empty($_POST['type'])) {
        $type = $_REQUEST['type'];
      }

      $c = new ControllerAdministrateur();
      $c->inserer_Article($titre, $image, $description, $type);
    }


?>

    <form action="" method="POST" style="margin:2%;">

      <h5 style="text-align:center;">Gestion des Articles:</h5>
      <div class="form-group">
        <label for="usr">Titre:</label>
        <input type="text" class="form-control" id="titre" name="titre" required>
      </div>
      <div class="form-group">
        <label for="usr">Image:</label>
        <input type="text" class="form-control" id="image" name="image" required>
      </div>
      <div class="form-group">
        <label for="comment">Description:</label>
        <textarea class="form-control" rows="3" id="description" name="description" required></textarea>
      </div>
      <div>
        <label class="checkbox-inline"><input id="tous" name="type[]" type="checkbox" value="tous"> Tous</label>
        <label class="checkbox-inline"><input id="ens" name="type[]" type="checkbox" value="ens"> ENS</label>
        <label class="checkbox-inline"><input id="primaire" name="type[]" type="checkbox" value="primaire"> Primaire</label>
        <label class="checkbox-inline"><input id="moyen" name="type[]" type="checkbox" value="moyen"> Moyen</label>
        <label class="checkbox-inline"><input id="secondaire" name="type[]" type="checkbox" value="secondaire"> Secondaire</label>
        <label class="checkbox-inline"><input id="parents" name="type[]" type="checkbox" value="parents"> Parents</label>
      </div>
      <button type="submit" class="btn btn-primary" name="submit" style="margin-left:35% ;">Ajouter</button>
    </form>

  <?php
  }
  public function cadre_Presentation()
  { ?>
    <div style="margin: 1%;">
      <h5>Modifier la présentation:</h5>

      <p style="text-align: center;">Cliquez sur le <a>lien</a></p>
    </div>
  <?php
  }
  public function cadre_Edt()
  { ?>
    <div style="margin: 5%;">
      <h5>Modifier les EDTS des Elèves:</h5>
      <img src="../MVC/Image/article/cycles/edt.jpg" style="width: 100%;">
      <p style="text-align: center;">Cliquez sur le <a href="./Administrateur/EDT">lien</a></p>
    </div>
  <?php
  }
  public function cadre_Ens()
  {
  ?>
    <div style="margin: 5%;">
      <h5>Modifier les EDTS des Enseignants:</h5>
      <img src="../MVC/Image/article/cycles/ens.jpg" style="width: 100%;">

      <p style="text-align: center;">Cliquez sur le <a href="./Administrateur/ENS">lien</a></p>
    </div>
  <?php
  }
  public function cadre_Users()
  {
  ?>
    <div style="margin: 5%;">
      <h5>Gérer les utilisateurs:</h5>
      <img src="../MVC/Image/admin.png" style="width: 100%;">

      <p style="text-align: center;">Cliquez sur le <a href="./Administrateur/Utilisateurs">lien</a></p>
    </div>
  <?php
  }
  public function cadre_Rest()
  {
  ?>
    <div style="margin: 2%;">
      <h5>Modifier Repas:</h5>
      <img src="../MVC/Image/article/cycles/restauration.jpg" style="width: 100%;">

      <p style="text-align: center;">Cliquez sur le <a href="./Administrateur/Restauration">lien</a></p>
    </div>
  <?php
  }
  public function cadre_Contact()
  {
    if (isset($_POST['tlphn'])) {
      $tlphn = $_REQUEST['tlphn'];
      $_SESSION['tlphn'] = $tlphn;
      $faxe = $_REQUEST['faxe'];
      $adr = $_REQUEST['adr'];


      $c = new ControllerAdministrateur();
      $c->inserer_Contact($tlphn, $faxe, $adr);
    }

  ?>
    <form action="" method="POST" style="margin:2%;">

      <h5 style="text-align:center;">Gestion de la page Contact:</h5>
      <div class="form-group">
        <label for="usr">Téléphone:</label>
        <input type="tel" class="form-control" id="tlphn" name="tlphn" placeholder="(+213) 23 82 85 35">
      </div>
      <div class="form-group">
        <label for="usr">Faxe:</label>
        <input type="tel" class="form-control" id="faxe" name="faxe" placeholder="213 (0) 23 56 38 15">
      </div>
      <div class="form-group">
        <label for="usr">Adresse Mail:</label>
        <input type="email" class="form-control" id="adr" name="adr" placeholder="eformation@gmail.com">
      </div>
      <button type="submit" class="btn btn-primary" name="submit" style="margin-left:40% ;">Ajouter</button>
    </form>
  <?php
  }
  public function cadre_Diapo()
  {
    if (isset($_POST['lien'])) {
      if (!empty($_POST['lien'])) {
        $lien = $_REQUEST['lien'];
        $_SESSION['titre'] = $lien;
        if (!empty($_POST['action'])) {
          $action = $_REQUEST['action'];
        }

        $c = new ControllerAdministrateur();
        $c->inserer_Diapo($lien, $action);
      }
    }

  ?>

    <form action="" method="POST" style="margin:2%;">

      <h5 style="text-align:center; margin-top:4%;">Gestion de Diaporama:</h5>
      <div class="form-group">
        <label for="usr">Lien de l'image:</label>
        <input type="text" class="form-control" id="titre" name="lien" placeholder="nomImage.JPG" required>
      </div>
      <div style="margin-left:20%;">
        <label class="radio-inline"><input type="radio" name="action[]" value="supprimer"> Supprimer </label>
        <label class="radio-inline"><input type="radio" name="action[]" value="ajouter"> Ajouter </label>
      </div>
      <button type="submit" class="btn btn-primary" name="submit" style="margin-left:40% ;">Valider</button>
    </form>

  <?php
  }
  public function Cadres_Affichage()
  {
  ?>
    <div class="row" style=" height:60%; width:95%; margin-left:4%; display:flex;">

      <div class="border" style=" width:22%;"><?php $this->cadre_Article(); ?></div>
      <div class="border" style=" width:22%;"><?php $this->cadre_Presentation() ?></div>
      <div class="border" style=" width:22%;"><?php $this->cadre_Edt(); ?></div>
      <div class="border" style=" width:22%;"><?php $this->cadre_Ens(); ?></div>

    </div>
    </br>

    <div class="row" style=" height:60%; width:95%; margin-left:4%; display:flex; margin-top:2%;">
      <div class="border" style=" width:22%;"><?php $this->cadre_Diapo(); ?></div>
      <div class="border" style=" width:22%;"><?php $this->cadre_Users(); ?></div>
      <div class="border" style=" width:22%;"><?php $this->cadre_Rest(); ?></div>
      <div class="border" style=" width:22%;"><?php $this->cadre_Contact(); ?></div>

    </div>

<?php
  }

  public function afficher_footer()
  {
    $c = new ControllerAdministrateur();
    $res = $c->get_menu();
    echo '
        <footer class="bg-light text-center text-lg-start">
        <!-- Grid container -->
        <div class="container p-4">
          <!--Grid row-->
          <div class="row" >
            <!--Grid column-->';
    foreach ($res as $row) {
      if (strcmp($row["menu"], 'Cycles') !== 0 && strcmp($row["menu"], 'Espace') !== 0) {
        if (strcmp($row["menu"], 'Parents') == 0) {
          echo ' <div class="col-lg-3 col-md-6 mb-4 mb-md-0" >
        <ul class="list-unstyled mb-0">
          <li>
            <a href="/projet/index/Espace/' . $row["menu"] . '" class="text-dark">' . $row["menu"] . '</a>
          </li>
        </ul>
      </div>
      <!--Grid column-->';
        } else  if ($row["menu"] == 'Primaire') {
          echo ' <div class="col-lg-3 col-md-6 mb-4 mb-md-0" >
        <ul class="list-unstyled mb-0">
          <li>
            <a href="/projet/index/Cycles/' . $row["menu"] . '" class="text-dark">' . $row["menu"] . '</a>
          </li>
        </ul>
      </div>
      <!--Grid column-->';
        } else if (strcmp($row["menu"], 'Moyen') == 0) {

          echo ' <div class="col-lg-3 col-md-6 mb-4 mb-md-0" >
        <ul class="list-unstyled mb-0">
          <li>
            <a href="/projet/index/Cycles/' . $row["menu"] . '" class="text-dark">' . $row["menu"] . '</a>
          </li>
        </ul>
      </div>
      <!--Grid column-->';
        } else if (strcmp($row["menu"], 'Secondaire') == 0) {
          echo ' <div class="col-lg-3 col-md-6 mb-4 mb-md-0" >
        <ul class="list-unstyled mb-0">
          <li>
            <a href="/projet/index/Cycles/' . $row["menu"] . '" class="text-dark">' . $row["menu"] . '</a>
          </li>
        </ul>
      </div>
      <!--Grid column-->';
        } else if (strcmp($row["menu"], 'Élève') == 0) {
          echo ' <div class="col-lg-3 col-md-6 mb-4 mb-md-0" >
        <ul class="list-unstyled mb-0">
          <li>
            <a href="/projet/index/Espace/' . $row["menu"] . '" class="text-dark">' . $row["menu"] . '</a>
          </li>
        </ul>
      </div>
      <!--Grid column-->';
        } else {

          echo ' <div class="col-lg-3 col-md-6 mb-4 mb-md-0" >
              <ul class="list-unstyled mb-0">
                <li>
                  <a href="/projet/index/' . $row["menu"] . '" class="text-dark">' . $row["menu"] . '</a>
                </li>
              </ul>
            </div>
            <!--Grid column-->';
        }
      }
    };
    echo '</div>
          <!--Grid row-->
        </div>
       
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
          © 2021 Copyright:
          <a class="text-dark">ECOLE DE FORMATION.com</a>
        </div>
      </footer>';
  }
}

?>