<?php
require_once('../MVC/Controller/ControllerUtilisateurs.php');
?>
<style>
  <?php include '../MVC/css/accueil.css'; ?>
</style>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</style>
<?php
class ViewUtilisateur
{


  public function logo()
  {
    echo '<img id= "logo" src="../../MVC/Image/LOGO.png" style="width: 8%;height: 16%;"/>';
  }
  public function contact()
  {
    $c = new ControllerUtilisateur();
    $res = $c->contact();
    echo '<div id="icons"><ul>';

    foreach ($res as $row) {
      echo '<li class="icons-img"> <a href="' . $row["link"] . '"><img id="image' . $row["id"] . '" style="width: 2%;height: 4%;" src="../../MVC/Image/' . $row["nom"] . '"></a></li>';
    }

    echo '</ul></div>';
  }

  public function Users_Affichage()
  {

    $c = new ControllerUtilisateur();
    $res = $c->listeUsers();


    foreach ($res as $count) {

      if (!empty($_POST['nom' . $count["id"] . ''])) {
        if (isset($_POST['submit' . $count["id"] . ''])) {
          $id =  $count["id"];
          $id_type =  $_REQUEST['type' . $count["id"] . ''];
          $nom = $_REQUEST['nom' . $count["id"] . ''];
          $prenom = $_REQUEST['prenom' . $count["id"] . ''];
          $sexe = $_REQUEST['sexe' . $count["id"] . ''];
          $adr = $_REQUEST['adr' . $count["id"] . ''];
          $tlphn1 = $_REQUEST['tlphn1' . $count["id"] . ''];
          $tlphn2 = $_REQUEST['tlphn2' . $count["id"] . ''];
          $tlphn3 = $_REQUEST['tlphn3' . $count["id"] . ''];
          $email = $_REQUEST['email' . $count["id"] . ''];
          $c = new ControllerUtilisateur();
          $c->modif_User($id, $id_type, $nom, $prenom, $sexe, $adr, $tlphn1, $tlphn2, $tlphn3, $email);
        }
      }
    }
    if (isset($_POST['nomADD'])) {



      if (isset($_POST['submitADD'])) {
        $type = $_REQUEST['idADD'];
        $nom = $_REQUEST['nomADD'];
        $_SESSION['nomADD'] = $nom;
        $prenom = $_REQUEST['prenomADD'];
        $adr = $_REQUEST['adrADD'];
        $sexe = $_REQUEST['sexeADD'];
        $tlphn1 = $_REQUEST['tlphn1ADD'];
        $tlphn2 = $_REQUEST['tlphn2ADD'];
        $tlphn3 = $_REQUEST['tlphn3ADD'];
        $email = $_REQUEST['emailADD'];

        $_POST = array();
        $c = new ControllerUtilisateur();
        $c->add_User($type, $nom, $prenom, $adr, $sexe, $tlphn1, $tlphn2, $tlphn3, $email);
        echo '<META HTTP-EQUIV="Refresh" Content="0; URL= "/projet/index/Administrateur/Utilisateurs"">';
      }
    }

?>
    <h3 style="margin-left:35%;">Gérer les utilisateurs:</h3>
    <form action="" method="post" class="form">
      <table class="table table-bordered" style="table-layout:fixed;">
        <thead>
          <tr>
            <th>type</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Sexe</th>
            <th>Adresse</th>
            <th>Telephone1</th>
            <th>Telephone2</th>
            <th>Telephone3</th>
            <th>E-Mail</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $res2 = $c->listeUsers();
          foreach ($res2 as $row) {

            echo ' <tr>';
            $rech = $c->get_type($row["id_type"]);
            foreach ($rech as $elem) {
              echo '<td><input style="border:0px; max-width:90%;" value="' . $elem["type_utilisateur"] . '" name="type' . $row["id"] . '"></td>';
            }
            echo ' <td><input style="border:0px; max-width:90%;" value="' . $row["nom"] . '" name="nom' . $row["id"] . '"></td>';
            echo ' <td><input style="border:0px; max-width:90%;" value="' . $row["prenom"] . '" name="prenom' . $row["id"] . '"></td>';
            echo ' <td><input style="border:0px; max-width:90%;" value="' . $row["sexe"] . '" name="sexe' . $row["id"] . '"></td>';

            echo '<td><input style="border:0px; max-width:90%;" value="' . $row["adr"] . '" name="adr' . $row["id"] . '"></td>';
            echo '<td><input style="border:0px; max-width:90%;" tel="tel" value="' . $row["tlphn1"] . '" name="tlphn1' . $row["id"] . '"></td>';
            echo '<td><input style="border:0px; max-width:90%;" type"tel" value="' . $row["tlphn2"] . '" name="tlphn2' . $row["id"] . '"></td>';
            echo '<td><input style="border:0px; max-width:90%;" type="tel" value="' . $row["tlphn3"] . '" name="tlphn3' . $row["id"] . '"></td>';
            echo '<td><input style="border:0px; max-width:90%;" type="email" value="' . $row["email"] . '" name="email' . $row["id"] . '"></td>';

            echo '<td><button type="submit" class="btn btn-primary" name="submit' . $row["id"] . '" >Modifier</button></td>';

            echo '</tr>';
          }
          ?>
          <tr>
            <td><input type="text" style="max-width:90%;" name="idADD"></td>
            <td><input type="text" style="max-width:90%;" name="nomADD"></td>
            <td><input type="text" style="max-width:90%;" name="prenomADD"></td>
            <td><input type="text" style="max-width:90%;" name="sexeADD"></td>
            <td><input type="text" style="max-width:90%;" name="adrADD"></td>
            <td><input type="tel" style="max-width:90%;" name="tlphn1ADD"></td>
            <td><input type="tel" style="max-width:90%;" name="tlphn2ADD"></td>
            <td><input type="tel" style="max-width:90%;" name="tlphn3ADD"></td>
            <td><input type="email" style="max-width:90%;" name="emailADD"></td>

            <td><button type="submit" class="btn btn-primary" name="submitADD">Ajouter</button></td>

          </tr>
        </tbody>
      </table>
    </form>
<?php
  }

  public function afficher_footer()
  {
    $c = new ControllerUtilisateur();
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