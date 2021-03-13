<?php
require_once('../MVC/Controller/ControllerRest.php');
?>
<style>
  <?php include '../MVC/css/accueil.css'; ?>
</style>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</style>
<?php
class ViewRest
{


  public function logo()
  {
    echo '<img id= "logo" src="../../MVC/Image/LOGO.png" style="width: 8%;height: 16%;"/>';
  }
  public function contact()
  {
    $c = new ControllerRest();
    $res = $c->contact();
    echo '<div id="icons"><ul>';

    foreach ($res as $row) {
      echo '<li class="icons-img"> <a href="' . $row["link"] . '"><img id="image' . $row["id"] . '" style="width: 2%;height: 4%;" src="../../MVC/Image/' . $row["nom"] . '"></a></li>';
    }

    echo '</ul></div>';
  }

  public function rest_Affichage()
  {

    $c = new ControllerRest();
    $res = $c->listeREST();
    echo "<h3 style='margin-left:40%; margin-bottom:4%;'>Gestion de la Restauration</h3>";

    foreach ($res as $count) {

      if (!empty($_POST['jour' . $count["id"] . ''])) {
        if (isset($_POST['submit' . $count["id"] . ''])) {
          $jour = $_REQUEST['jour' . $count["id"] . ''];
          $date = $_REQUEST['date' . $count["id"] . ''];
          $repas = $_REQUEST['repas' . $count["id"] . ''];

          $c = new ControllerRest();
          $c->modif_REST($jour, $date, $repas);
        }
      }
    }

?>

    <form action="" method="post" class="form">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Jour</th>
            <th>Date</th>
            <th>Repas</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $res2 = $c->listeREST();
          foreach ($res2 as $row) {

            echo ' <tr>';
            echo ' <td><input style="border:0px;" value="' . $row["jour"] . '" name="jour' . $row["id"] . '"></td>';
            echo ' <td><input style="border:0px;" type="date" value="' . $row["date"] . '" name="date' . $row["id"] . '"></td>';
            echo ' <td><input style="border:0px;" value="' . $row["repas"] . '" name="repas' . $row["id"] . '"></td>';
            echo '<td><button type="submit" class="btn btn-primary" name="submit' . $row["id"] . '" >Modifier</button></td>';
            echo '</tr>';
          }
          ?>
        </tbody>
      </table>
    </form>
<?php
  }

  public function afficher_footer()
  {
    $c = new ControllerRest();
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