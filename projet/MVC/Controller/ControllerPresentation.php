<?php
require_once('../MVC/Model/ModelPresentation.php');
require_once('../MVC/View/ViewPresentation.php');
class ControllerPresentation{
  
public function get_menu(){
    $model = new ModelPresentation();
    $res= $model->get_menu();
    return $res;
}
public function contact(){
    $model = new ModelPresentation();
    $res= $model->get_contact();
    return $res;
}
public function afficher_accueil(){
    $view= new ViewPresentation();
    $view->logo();
    $view->contact();
    $view->afficher_menu();
    $view->afficher_presentation();
    $view->afficher_footer();
}


}
