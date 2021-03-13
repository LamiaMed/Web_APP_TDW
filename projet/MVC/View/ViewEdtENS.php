<?php
require_once('../MVC/Controller/ControllerEdtENS.php');
?>
<style>
  <?php include '../MVC/css/accueil.css'; ?>
</style>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</style>
<?php
class ViewEdtENS
{


  public function logo()
  {
    echo '<img id= "logo" src="../../MVC/Image/LOGO.png" style="width: 8%;height: 16%;"/>';
  }
  public function contact()
  {
    $c = new ControllerEdtENS();
    $res = $c->contact();
    echo '<div id="icons"><ul>';

    foreach ($res as $row) {
      echo '<li class="icons-img"> <a href="' . $row["link"] . '"><img id="image' . $row["id"] . '" style="width: 2%;height: 4%;" src="../../MVC/Image/' . $row["nom"] . '"></a></li>';
    }

    echo '</ul></div>';
  }

  public function edt_Affichage()
  {
  
    $c = new ControllerEdtENS();
    $res = $c->listeENS();


    foreach ($res as $count) {

      if (!empty($_POST['nom' . $count["id"] . ''])) {
        if (isset($_POST['submit' . $count["id"] . ''])) {
          $nom = $_REQUEST['nom' . $count["id"] . ''];
          $prenom = $_REQUEST['prenom' . $count["id"] . ''];
          $grp = $count["id_classe"];
          $niv = $_REQUEST['niv' . $count["id"] . ''];
          $nbh = $_REQUEST['nbh' . $count["id"] . ''];
          $hrecp = $_REQUEST['hrecp' . $count["id"] . ''];

          $c = new ControllerEdtENS();
          $c->modif_EDT($count["id"], $nom, $prenom, $grp, $niv, $nbh, $hrecp);
        }
      }
    }
    if (isset($_POST['nomADD'])) {



      if (isset($_POST['submitADD'])) {
        $id = $_REQUEST['idADD'];
        $nom = $_REQUEST['nomADD'];
        $_SESSION['nomADD'] = $nom;
        $prenom = $_REQUEST['prenomADD'];
        $grp = $_REQUEST['grpADD'];
        $niv = $_REQUEST['nivADD'];
        $nbh = $_REQUEST['nbhADD'];
        $hrecp = $_REQUEST['hrecpADD'];
        $_POST = array();
        $c = new ControllerEdtENS();
        $c->add_EDT($id, $nom, $prenom, $grp, $niv, $nbh, $hrecp);
        echo '<META HTTP-EQUIV="Refresh" Content="0; URL= "/projet/index/ENS"">';
        $nom = "";
        $prenom = "";
        $grp = "";
        $niv = "";
        $nbh = "";
        $hrecp = "";
      }
    }

?>
    <h3 style="margin-left:25%;">Modifier les EDT des Enseignants et les heures de travail:</h3>
    <form action="" method="post" class="form">
      <table class="table table-bordered" style="table-layout:fixed;">
        <thead>
          <tr>
            <th>Identifiant</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Classe</th>
            <th>Niveau</th>
            <th>Nombre heures</th>
            <th>heure de reception</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $res2 = $c->listeENS();
          foreach ($res2 as $row) {

            echo ' <tr>';
            echo ' <td><input style="border:0px;" value="' . $row["id_ens"] . '" name="id' . $row["id"] . '"></td>';
            echo ' <td><input style="border:0px;" value="' . $row["nom"] . '" name="nom' . $row["id"] . '"></td>';
            echo ' <td><input style="border:0px;" value="' . $row["prenom"] . '" name="prenom' . $row["id"] . '"></td>';
            $rech = $c->nom_groupe($row["id_classe"]);
            foreach ($rech as $elem) {

              echo '<td><input style="border:0px;" value="' . $elem["nom"] . '" name="grp' . $row["id"] . '"></td>';

              echo '<td><input style="border:0px;" value="' . $elem["id_niveau"] . '" name="niv' . $row["id"] . '"></td>';
            }
            echo '<td><input style="border:0px;" value="' . $row["nb_heures"] . '" name="nbh' . $row["id"] . '"></td>';
            echo '<td><input style="border:0px;" value="' . $row["heure_reception"] . '" name="hrecp' . $row["id"] . '"></td>';
            echo '<td><button type="submit" class="btn btn-primary" name="submit' . $row["id"] . '" >Modifier</button></td>';

            echo '</tr>';
          }
          ?>
          <tr>
            <td><input type="text" name="idADD"></td>
            <td><input type="text" name="nomADD"></td>
            <td><input type="text" name="prenomADD"></td>
            <td><input type="text" name="grpADD"></td>
            <td><input type="text" name="nivADD"></td>
            <td><input type="text" name="nbhADD"></td>
            <td><input type="text" name="hrecpADD"></td>
            <td><button type="submit" class="btn btn-primary" name="submitADD">Ajouter</button></td>

          </tr>
        </tbody>
      </table>
    </form>
<?php
  }

  public function afficher_footer()
  {
    $c = new ControllerEdtENS();
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