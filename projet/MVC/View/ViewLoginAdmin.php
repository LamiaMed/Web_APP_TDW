<?php
require_once('../MVC/Controller/ControllerLoginAdmin.php');
?>

<link href="../MVC/css/login.css" rel="stylesheet" type="text/css">
<link href="../MVC/css/accueil.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</style>
<?php
class ViewLoginAdmin
{
  private $logo = "";

  public function logo()
  {
    echo '<img id= "logo" src="../MVC/Image/LOGO.png" style="width: 8%;height: 16%;"/>';
  }
  public function contact()
  {
    $c = new ControllerLoginAdmin();
    $res = $c->contact();
    echo '<div id="icons"><ul>';

    foreach ($res as $row) {

      echo '<li class="icons-img"> <a href="' . $row["link"] . '"><img id="image' . $row["id"] . '" style="width: 2%;height: 4%;" src="../MVC/Image/' . $row["nom"] . '"></a></li>';
    }
    echo '</ul></div>';
  }
  public function login()
  {

    if (isset($_POST['username'])) {
      $username = stripslashes($_REQUEST['username']);
      $password = stripslashes($_REQUEST['password']);
      $c = new ModelLoginAdmin();
      $result = $c->authentification($username, $password);
      $count = count($result->fetchAll());
      if ($count == 1) {
        header('location: ./Administrateur');
      } else {
?>
        <script>
          alert("Le nom d'utilisateur ou le mot de passe est incorrect.")
        </script>
    <?php
      }
    }



    ?>
    <h3 style="margin-left:41%; margin-top:2%; margin-bottom:2%;">Login Admin: </h3>
    <form id="form" method="POST" action="">

      <div class="container">
        <input type="text" placeholder="Enter Username" name="username" id="username" required>
        <input type="password" placeholder="Enter Password" name="password" id="password" required>
        <input type="submit" id="MyButton" value="Se connecter"></input>


        <?php if (!empty($message)) { ?>
          <p class="errorMessage"><?php echo $message; ?></p>
        <?php } ?>
      </div>
    </form>
  <?php

  }

  public function afficher_menu()
  {
  ?>
    <nav>
      <ul class="nav">
        <?php
        $c = new ControllerLoginAdmin();
        $res = $c->get_menu();
        foreach ($res as $row) {

          if ($row["types"] == 0) {

            if (strcmp($row["menu"], 'Cycles') == 0 || strcmp($row["menu"], 'Espace') == 0) {

              if (strcmp($row["menu"], 'Cycles') == 0) {
                echo '<li ><a href="/projet/index/">' . $row["menu"] . '</a><ul>';
                $res1 = $c->get_menu();
                foreach ($res1 as $row1) {
                  if (strcmp($row1["menu"], 'Primaire') == 0 || strcmp($row1["menu"], 'Moyen') == 0 || strcmp($row1["menu"], 'Secondaire') == 0) {
                    echo '<li class="smenu"><a  href="/projet/index/Cycles/' . $row1["menu"] . '"</a>' . $row1["menu"] . '</li>';
                  }
                }
                echo '</ul></li>';
              } else {
                echo '<li ><a  href="/projet/index/">' . $row["menu"] . '</a><ul>';
                $res2 = $c->get_menu();
                foreach ($res2 as $row2) {
                  if (strcmp($row2["menu"], 'Élève') == 0 || strcmp($row2["menu"], 'Parent') == 0) {
                    echo '<li ><a  href="/projet/index/Espace/' . $row2["menu"] . '"</a>' . $row2["menu"] . '</li>';
                  }
                }
                echo '</ul></li>';
              }
            } else {
              if (strcmp($row["menu"], 'Accueil') == 0) {
                echo '<li ><a  href="/projet/index/#">' . $row["menu"] . '</a></li>';
              } else {
                echo '<li ><a  href="/projet/index/' . $row["menu"] . '">' . $row["menu"] . '</a></li>';
              }
            }
          }
        }
        ?>
      </ul>
    </nav>
<?php
  }


  public function afficher_footer()
  {
    $c = new ControllerLoginAdmin();
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