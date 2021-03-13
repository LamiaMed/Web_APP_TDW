<?php
require_once('../MVC/Model/ModelUtilisateurs.php');
require_once('../MVC/View/ViewUtilisateurs.php');

class ControllerUtilisateur
{
  public function contact()
  {
    $model = new ModelUtilisateur();
    $res = $model->get_contact();
    return $res;
  }
  public function listeUsers()
  {
    $model = new ModelUtilisateur();
    $res = $model->get_User();
    return $res;
  }
  public function get_type($id)
  {
    $model = new ModelUtilisateur();
    $res = $model->get_type($id);
    return $res;
  }
  public function afficher_accueil()
  {
    $view = new ViewUtilisateur();
    $view->logo();
    $view->contact();
    $view->Users_Affichage();
    $view->afficher_footer();
  }

  public function get_menu()
  {
    $model = new ModelUtilisateur();
    $res = $model->get_menu();
    return $res;
  }
  public function modif_User($id, $id_type, $nom, $prenom, $sexe, $adr, $tlphn1, $tlphn2, $tlphn3, $email)
  {
    $model = new ModelUtilisateur();
    $res = $model->modif_User($id, $id_type, $nom, $prenom, $sexe, $adr, $tlphn1, $tlphn2, $tlphn3, $email);
  }
  public function add_User($type, $nom, $prenom, $adr, $sexe, $tlphn1, $tlphn2, $tlphn3, $email)
  {
    $model = new ModelUtilisateur();
    $res = $model->add_User($type, $nom, $prenom, $adr, $sexe, $tlphn1, $tlphn2, $tlphn3, $email);
  }
}
