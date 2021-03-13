<?php
require("../MVC/Controller/ControllerAccueil.php");

$url = '';

if (isset($_GET['url'])) {
       $url = explode('/', $_GET['url']);
}
if ($url == NULL) {

       $c = new ControllerAccueil();
       $c->afficher_accueil();
} elseif ($url[0] == 'Accueil') {
       header("Location:./#");
} elseif ($url[0] == 'Contact') {
       require("../MVC/Controller/ControllerContact.php");

       $c = new ControllerContact();
       $c->afficher_accueil();
} elseif ($url[0] == 'Login') {
       require("../MVC/Controller/ControllerLoginAdmin.php");

       $c = new ControllerLoginAdmin();
       $c->afficher_accueil();
} elseif ($url[0] == 'Présentation') {
       require("../MVC/Controller/ControllerPresentation.php");

       $c = new ControllerPresentation();
       $c->afficher_accueil();
} elseif ($url[0] == 'Cycles') {
       if ($url[1] == 'Primaire') {
              if (sizeof($url) == 3) {
                     if ($url[2] == 'Liste ENS') {
                            require("../MVC/Controller/ControllerListeENS.php");

                            $c = new ControllerListeENS();
                            $c->afficher_ENS_P();
                     }
                     if ($url[2] == 'EDT') {
                            require("../MVC/Controller/ControllerEDT.php");

                            $c = new ControllerEDT();
                            $c->afficher_EDT_P();
                     }
                     if ($url[2] == 'Rest') {
                            require("../MVC/Controller/ControllerRestauration.php");

                            $c = new ControllerRestauration();
                            $c->afficher_accueil();
                     }
              } else {
                     require("../MVC/Controller/ControllerPrimaire.php");

                     $c = new ControllerPrimaire();
                     $c->afficher_accueil();
              }
       }
       if ($url[1] == 'Moyen') {
              if (sizeof($url) == 3) {
                     if ($url[2] == 'Liste ENS') {
                            require("../MVC/Controller/ControllerListeENS.php");

                            $c = new ControllerListeENS();
                            $c->afficher_ENS_M();
                     }
                     if ($url[2] == 'EDT') {
                            require("../MVC/Controller/ControllerEDT.php");

                            $c = new ControllerEDT();
                            $c->afficher_EDT_M();
                     }
                     if ($url[2] == 'Rest') {
                            require("../MVC/Controller/ControllerRestauration.php");

                            $c = new ControllerRestauration();
                            $c->afficher_accueil();
                     }
              } else {
                     require("../MVC/Controller/ControllerMoyen.php");

                     $c = new ControllerMoyen();
                     $c->afficher_accueil();
              }
       }
       if ($url[1] == 'Secondaire') {
              if (sizeof($url) == 3) {
                     if ($url[2] == 'Liste ENS') {
                            require("../MVC/Controller/ControllerListeENS.php");

                            $c = new ControllerListeENS();
                            $c->afficher_ENS_S();
                     }
                     if ($url[2] == 'EDT') {
                            require("../MVC/Controller/ControllerEDT.php");

                            $c = new ControllerEDT();
                            $c->afficher_EDT_S();
                     }
                     if ($url[2] == 'Rest') {
                            require("../MVC/Controller/ControllerRestauration.php");

                            $c = new ControllerRestauration();
                            $c->afficher_accueil();
                     }
              } else {
                     require("../MVC/Controller/ControllerSecondaire.php");
                     $c = new ControllerSecondaire();
                     $c->afficher_accueil();
              }
       }
} elseif ($url[0] == 'Espace') {

       if (sizeof($url) >= 3) {
              if ($url[1] == "Parent") {
                     if ($url[2] == 'information') {
                            require("../MVC/Controller/ControllerInformation.php");
                            $c = new ControllerInformation();
                            $c->afficherFORParents();
                            //  $c->login();    
                     }
              } else if ($url[1] == "Élève") {
                     if ($url[2] == 'information') {
                            require("../MVC/Controller/ControllerInformation.php");
                            $c = new ControllerInformation();
                            $c->afficher();
                            //  $c->login();    
                     }
              }
       } else {
              if ($url[1] == "Parent") {
                     require("../MVC/Controller/ControllerParent.php");
                     $c = new ControllerParent();
                     $c->afficher_accueil();
              } else {
                     require("../MVC/Controller/ControllerEleve.php");
                     $c = new ControllerEleve();
                     $c->afficher_accueil();
              }
       }
} elseif ($url[0] == "Administrateur") {
       if (sizeof($url) == 2) {
              if ($url[1] == 'Restauration') {
                     require_once('../MVC/Controller/ControllerRest.php');
                     $c = new ControllerRest();
                     $c->afficher_accueil();
              }
              if ($url[1] == 'ENS') {
                     require_once('../MVC/Controller/ControllerEdtENS.php');
                     $c = new ControllerEdtENS();
                     $c->afficher_accueil();
              }
              if ($url[1] == 'Utilisateurs') {
                     require("../MVC/Controller/ControllerUtilisateurs.php");
                     $c = new ControllerUtilisateur();
                     $c->afficher_accueil();
              }
              if ($url[1] == 'EDT') {
                     require("../MVC/Controller/ControllerAdminEDT.php");
                     $c = new ControllerAdminEDT();
                     $c->afficher_accueil();
              }
       } else {
              require("../MVC/Controller/ControllerAdministrateur.php");
              $c = new ControllerAdministrateur();
              $c->afficher_accueil();
       }
} else {

       echo 'Page introuvable!';
}
