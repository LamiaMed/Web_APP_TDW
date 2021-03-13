<?php
require_once('../MVC/Model/ModelRest.php');
require_once('../MVC/View/ViewRest.php');

class ControllerRest
{
  public function contact()
  {
    $model = new ModelRest();
    $res = $model->get_contact();
    return $res;
  }
  public function afficher_accueil()
  {
    $view = new ViewRest();
    $view->logo();
    $view->contact();
    $view->rest_Affichage();
    $view->afficher_footer();
  }
  public function listeREST()
  {
    $model = new ModelRest();
    $res = $model->get_ListeREST();
    return $res;
  }
  public function modif_REST($jour, $date, $repas)
  {
    $model = new ModelREST();
    $res = $model->modif_REST($jour, $date, $repas);
  }
  public function get_menu()
  {
    $model = new ModelRest();
    $res = $model->get_menu();
    return $res;
  }
}
