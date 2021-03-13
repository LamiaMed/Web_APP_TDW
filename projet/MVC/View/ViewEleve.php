<?php

require_once('../MVC/Controller/ControllerEleve.php');

require_once('../MVC/Model/ModelEleve.php');
?>

<link href="../../MVC/css/login.css" rel="stylesheet" type="text/css">
<link href="../../MVC/css/accueil.css" rel="stylesheet" type="text/css">


<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</style>
<?php
class ViewEleve
{


  public function logo()
  {
    echo '<img id= "logo" src="../../MVC/Image/LOGO.png" style="width: 8%;height: 16%;"/>';
  }
  public function contact()
  {
    $c = new ControllerEleve();
    $res = $c->contact();
    echo '<div id="icons"><ul>';

    foreach ($res as $row) {
      echo '<li class="icons-img"> <a href="' . $row["link"] . '"><img id="image' . $row["id"] . '" style="width: 2%;height: 4%;" src="../../MVC/Image/' . $row["nom"] . '"></a></li>';
    }

    echo '</ul></div>';
  }

  public function afficher_menu()
  {
?>
    <nav>
      <ul class="nav">
        <?php
        $c = new ControllerEleve();
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

  public function afficher_article()
  {

    $c = new ControllerEleve();
    $res = $c->articles();
    $i = 0;

    echo '<div class="row" style="margin:4%; margin-left:4% ;">';
    foreach ($res as $row) {
      if ($i < 4) {
    ?>

        <div class="card text-black" style="max-width: 23% ;margin-right:2%;">
          <div class="card-body">
            <?php echo ' <h5 class="card-title">' . $row["titre"] . '</h5>'; ?>
            <?php echo ' <img src="../../MVC/Image/article/cycles/' . $row["image"] . '"  style="width: 100%;"</img>'; ?>
            <?php echo '<p class="card-text">' . $row["description"] . '</p>'; ?>
            <?php echo '<p class="card-text"><a href="#">Consulter</a></p>'; ?>

          </div>
        </div>

        <?php
        if ($i == 3) {
          echo '</div>';
        }
        $i = $i + 1;
      } else {
        if ($i == 4) {
          echo '<div class="row" style="margin:4%; margin-left:4% ;">';
        }
        ?>
        <div class="card text-black" style="max-width: 23% ;margin-right:2%;">
          <!--<div class="card-header">'.$row["titre"].'</div>-->
          <div class="card-body">
            <?php echo ' <h5 class="card-title">' . $row["titre"] . '</h5>'; ?>
            <?php echo ' <img src="../../MVC/Image/article/cycles/' . $row["image"] . '"  style="width: 100%;"</img>'; ?>
            <?php echo '<p class="card-text">' . $row["description"] . '</p>'; ?>
            <?php echo '<p class="card-text"><a href="#">Consulter</a></p>'; ?>

          </div>
        </div>
      <?php
        $i = $i + 1;
      }
    }
    if ($i !== 3) {
      echo '</div>';
    }
  }
  public function login()
  {

    if (isset($_POST['username'])) {
      $username = stripslashes($_REQUEST['username']);
      $password = stripslashes($_REQUEST['password']);
      $matricule = stripslashes($_REQUEST['id']);

      $c = new ModelEleve();
      $result = $c->authentification($username, $password);
      $count = count($result->fetchAll());
      if ($count == 1) {


        header('location: ./Élève/information/' . $username . '/' . $matricule . '');
      } else {
      ?>
        <script>
          alert("Le nom d'utilisateur ou le mot de passe est incorrect.")
        </script>
    <?php
      }
    }



    ?>
    <form id="form" method="POST" action="">
      <h4 style="margin-right:50%">Login :</h4>

      <div class="container">
        <input type="text" placeholder="Entrez Adresse" name="username" id="username" required>
        <input type="text" placeholder="Entrez Matricule" name="id" id="id" required>
        <input type="password" placeholder="Entrez Mot de Passe" name="password" id="password" required>
        <input type="submit" id="MyButton" value="Se connecter"></input>


        <?php if (!empty($message)) { ?>
          <p class="errorMessage"><?php echo $message; ?></p>
        <?php } ?>
      </div>
    </form>
<?php

  }

  public function afficher_footer()
  {
    $c = new ControllerEleve();
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