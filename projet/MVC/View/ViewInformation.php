<?php

require_once('C:/xampp/htdocs/projet/MVC/Controller/ControllerInformation.php');

require_once('C:/xampp/htdocs/projet/MVC/Model/ModelInformation.php');
?>
<style>
  <?php include '../MVC/css/accueil.css'; ?>
</style>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</style>
<?php
class ViewInformation
{


  public function logo()
  {
    echo '<img id= "logo" src="../../../../../../MVC/Image/LOGO.png" style="width: 8%;height: 16%;"/>';
  }
  public function contact()
  {
    $c = new ControllerInformation();
    $res = $c->contact();
    echo '<div id="icons"><ul>';

    foreach ($res as $row) {
      echo '<li class="icons-img"> <a href="' . $row["link"] . '"><img id="image' . $row["id"] . '" style="width: 2%;height: 4%;" src="../../../../../../MVC/Image/' . $row["nom"] . '"></a></li>';
    }

    echo '</ul></div>';
  }
  public function info_perso()
  {
    $url = '';

    if (isset($_GET['url'])) {
      $url = explode('/', $_GET['url']);
    }
    $user = $url[3];
    $matricule = $url[4] . "/" . $url[5];
    $c = new ControllerInformation();
    $res = $c->get_info($user, $matricule);

    $res1 = $c->get_info($user, $matricule);
    foreach ($res1 as $elem) {
      echo "<h2 style='margin-left:40%; margin-bottom:4%;'><b><u>Bienvenue " . $elem["nom"] . "</u></b></h2>";
    }
?>
    <h5 style="margin-bottom : 3%; text-align:center; margin-top:2%;">Consultez vos informations personnelles: </h5>
    <div class="container">
      <table class="table table-dark table-hover">
        <thead>
          <tr>
            <th>Matricule</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Date de Naissance</th>
            <th>Année</th>
            <th>Classe</th>
          </tr>
        </thead>
        <tbody>
          <?php

          foreach ($res as $row) {
            echo ' <tr>';
            echo ' <td>' . $row["matricule"] . '</td>';
            echo ' <td>' . $row["nom"] . '</td>';
            echo ' <td>' . $row["prenom"] . '</td>';
            echo '<td>' . $row["date_naissance"] . '</td>';
            echo '<td>' . $row["annee"] . '</td>';
            $rech = $c->get_classe($row["id_classe"]);
            foreach ($rech as $elem) {
              echo '<td>' . $elem["nom"] . '</td>';
            }


            echo '</tr>';
          }
          ?>

        </tbody>
      </table>
    </div>
  <?php
  }

  public function afficher_edt()
  {
    $c = new ControllerInformation();
    $url = '';

    if (isset($_GET['url'])) {
      $url = explode('/', $_GET['url']);
    }
    $user = $url[3];
    $matricule = $url[4] . "/" . $url[5];
    $res1 = $c->get_info($user, $matricule);
    $groupe = "";
    foreach ($res1 as $row) {
      $groupe = $row["id_classe"];
    }

    $res = $c->EDT($groupe);
    $old = 0;
  ?>
    <h5 style="margin-bottom : 3%; text-align:center; margin-top:2%;">Consultez votre EDT: </h5>
    <div class="container">

      <?php
      foreach ($res as $row) {
        if ($row["id"] !== $old) {
          if ($old != 0) {
            echo '</tbody>
           </table>';
          }
          $classe = $c->get_classe($groupe);
          foreach ($classe as $elmt) {
            echo '<h5 style="text-align:center; font-weight:bold;">' . $elmt["nom"] . '</h5>';
          }

      ?>

          <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">08:00-10:00</th>
                <th scope="col">10:00-12:00</th>
                <th scope="col">13:00-15:00</th>
                <th scope="col">15:00-16:00</th>
              </tr>
            </thead>
            <tbody>
            <?php
          }
            ?>



            <tr>
              <th scope="row">Dimanche</th>
              <?php
              $matiere = $c->get_matiereJour('Dimanche', $row["id"]);
              foreach ($matiere as $elemt) {
                $rech = $c->nom_matiere($elemt["id_matiere"]);
                foreach ($rech as $mod) {
                  echo '<td>' . $mod["nom"] . '</td>';
                }
              }
              ?>
            </tr>
            <tr>
              <th scope="row">Lundi</th>
              <?php
              $matiere = $c->get_matiereJour('Lundi', $row["id"]);
              foreach ($matiere as $elemt) {
                $rech = $c->nom_matiere($elemt["id_matiere"]);
                foreach ($rech as $mod) {
                  echo '<td>' . $mod["nom"] . '</td>';
                }
              }
              ?>
            </tr>
            <tr>
              <th scope="row">Mardi</th>
              <?php
              $matiere = $c->get_matiereJour('Mardi', $row["id"]);
              foreach ($matiere as $elemt) {
                $rech = $c->nom_matiere($elemt["id_matiere"]);
                foreach ($rech as $mod) {
                  echo '<td>' . $mod["nom"] . '</td>';
                }
              }
              ?>
            </tr>
            <tr>
              <th scope="row">Mercredi</th>
              <?php
              $matiere = $c->get_matiereJour('Mercredi', $row["id"]);
              foreach ($matiere as $elemt) {
                $rech = $c->nom_matiere($elemt["id_matiere"]);
                foreach ($rech as $mod) {
                  echo '<td>' . $mod["nom"] . '</td>';
                }
              }
              ?>
            </tr>
            <tr>
              <th scope="row">Jeudi</th>
              <?php
              $matiere = $c->get_matiereJour('Jeudi', $row["id"]);
              foreach ($matiere as $elemt) {
                $rech = $c->nom_matiere($elemt["id_matiere"]);
                foreach ($rech as $mod) {
                  echo '<td>' . $mod["nom"] . '</td>';
                }
              }
              ?>
            </tr>


          <?php
          $old = $row["id"];
        }
        echo ' </tbody>
      </table>
      </div> ';
      }
      public function afficher_activ()
      {
        $c = new ControllerInformation();
        $url = '';

        if (isset($_GET['url'])) {
          $url = explode('/', $_GET['url']);
        }
        $user = $url[3];
        $matricule = $url[4] . "/" . $url[5];
        $res1 = $c->get_info($user, $matricule);
        $groupe = "";
        foreach ($res1 as $row) {
          $groupe = $row["id_classe"];
        }

        $res = $c->get_act($groupe);
          ?>
          <h5 style="margin-bottom : 3%; text-align:center; margin-top:2%;">Consultez les activités extrascolaires: </h5>
          <div class="container">
            <table class="table table-dark table-hover">
              <thead>
                <tr>

                  <th>Nom</th>
                  <th>Description</th>
                  <th>Heure</th>
                  <th>Date</th>
                </tr>
              </thead>
              <tbody>
                <?php

                foreach ($res as $row) {
                  echo ' <tr>';
                  echo ' <td>' . $row["nom"] . '</td>';
                  echo ' <td>' . $row["description"] . '</td>';
                  echo ' <td>' . $row["heure"] . '</td>';
                  echo '<td>' . $row["date"] . '</td>';


                  echo '</tr>';
                }
                ?>

              </tbody>
            </table>
          </div>
        <?php
      }
      public function afficher_note()
      {
        $c = new ControllerInformation();
        $url = '';

        if (isset($_GET['url'])) {
          $url = explode('/', $_GET['url']);
        }
        $user = $url[3];
        $matricule = $url[4] . "/" . $url[5];
        $res = $c->get_note($matricule);
        ?>
          <h5 style="margin-bottom : 3%; text-align:center; margin-top:2%;">Consultez vos notes: </h5>
          <div class="container">
            <table class="table table-bordered">
              <thead>
                <tr>

                  <th>Matiére</th>
                  <th>Coeff</th>
                  <th>Note</th>

                </tr>
              </thead>
              <tbody>
                <?php

                foreach ($res as $row) {
                  echo ' <tr>';
                  $res1 = $c->nom_matiere($row["id_matiere"]);
                  foreach ($res1 as $result) {
                    echo ' <td>' . $result["nom"] . '</td>';
                    echo ' <td>' . $result["coeff"] . '</td>';
                    echo ' <td>' . $row["note"] . '</td>';
                  }






                  echo '</tr>';
                }
                ?>

              </tbody>
            </table>
          </div>
        <?php
      }
      public function afficher_note_P()
      {
        $c = new ControllerInformation();
        $url = '';

        if (isset($_GET['url'])) {
          $url = explode('/', $_GET['url']);
        }
        $user = $url[3];
        $matricule = $url[4] . "/" . $url[5];
        $res = $c->get_note($matricule);
        ?>
          <h5 style="margin-bottom : 3%; text-align:center; margin-top:2%;">Consultez les notes: </h5>
          <div class="container">
            <table class="table table-bordered">
              <thead>
                <tr>

                  <th>Matiére</th>
                  <th>Coeff</th>
                  <th>Note</th>
                  <th>Remarques</th>

                </tr>
              </thead>
              <tbody>
                <?php

                foreach ($res as $row) {
                  echo ' <tr>';
                  $res1 = $c->nom_matiere($row["id_matiere"]);
                  foreach ($res1 as $result) {
                    echo ' <td>' . $result["nom"] . '</td>';
                    echo ' <td>' . $result["coeff"] . '</td>';
                    echo ' <td>' . $row["note"] . '</td>';
                    echo ' <td>' . $row["Remarques"] . '</td>';
                  }






                  echo '</tr>';
                }
                ?>

              </tbody>
            </table>
          </div>
      <?php
      }

      public function afficher_footer()
      {
        $c = new ControllerInformation();
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