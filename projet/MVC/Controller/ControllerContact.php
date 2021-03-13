<?php
require_once('../MVC/Model/ModelContact.php');
require_once('../MVC/View/ViewContact.php');

class ControllerContact{

    
public function get_menu(){
    $model = new ModelContact();
    $res= $model->get_menu();
    return $res;
}
public function contact(){
    $model = new ModelContact();
    $res= $model->get_contact();
    return $res;
}
public function afficher_accueil(){
    $view= new ViewContact();
    $view->logo();
    $view->contact();
    $view->afficher_menu();
    $view->afficher_coordonnees();
    $view->afficher_footer();
}
public function coordonnees(){
    $model = new ModelContact();
    $res= $model->get_coordonnees();
    return $res; 
}

}
