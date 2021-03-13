<?php
require_once('../MVC/Model/ModelRestauration.php');
require_once('../MVC/View/ViewRestauration.php');

class ControllerRestauration{

    
public function get_menu(){
    $model = new ModelRestauration();
    $res= $model->get_menu();
    return $res;
}
public function contact(){
    $model = new ModelRestauration();
    $res= $model->get_contact();
    return $res;
}
public function afficher_accueil(){
    $view= new ViewRestauration();
    $view->logo();
    $view->contact();
    $view->afficher_menu();
    $view->afficher_repas();
    $view->afficher_footer();
}
public function get_repas(){
    $model = new ModelRestauration();
    $res= $model->get_repas();
    return $res;
}

}
