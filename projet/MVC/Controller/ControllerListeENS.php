<?php
require_once('../MVC/Model/ModelListeENS.php');
require_once('../MVC/View/ViewListeENS.php');
class ControllerListeENS{
public function get_menu(){
    $model = new ModelListeENS();
    $res= $model->get_menu();
    return $res;
}
public function contact(){
    $model = new ModelListeENS();
    $res= $model->get_contact();
    return $res;
}
public function afficher_ENS_P(){
    $view= new ViewListeENS();
    $view->logo();
    $view->contact();
    $view->afficher_menu();
    $view->afficher_ListeENS_P();
    $view->afficher_footer();
}
public function afficher_ENS_M(){
    $view= new ViewListeENS();
    $view->logo();
    $view->contact();
    $view->afficher_menu();
    $view->afficher_ListeENS_M();
    $view->afficher_footer();
}
public function afficher_ENS_S(){
    $view= new ViewListeENS();
    $view->logo();
    $view->contact();
    $view->afficher_menu();
    $view->afficher_ListeENS_S();
    $view->afficher_footer();
}
public function listeENS_P(){
    $model = new ModelListeENS();
    $res= $model->get_ListeENS_P();
    return $res; 
}
public function nom_groupe($id_classe){
    $model = new ModelListeENS();
    $res= $model->get_nomClasse($id_classe);
    return $res; 
}
public function listeENS_M(){
    $model = new ModelListeENS();
    $res= $model->get_ListeENS_M();
    return $res; 
}
public function listeENS_S(){
    $model = new ModelListeENS();
    $res= $model->get_ListeENS_S();
    return $res; 
}


}
