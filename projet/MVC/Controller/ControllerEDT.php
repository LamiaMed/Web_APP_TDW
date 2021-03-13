<?php
require_once('../MVC/Model/ModelEDT.php');
require_once('../MVC/View/ViewEDT.php');
class ControllerEDT{
public function get_menu(){
    $model = new ModelEDT();
    $res= $model->get_menu();
    return $res;
}
public function contact(){
    $model = new ModelEDT();
    $res= $model->get_contact();
    return $res;
}
public function afficher_EDT_P(){
    $view= new ViewEDT();
    $view->logo();
    $view->contact();
    $view->afficher_menu();
    $view->afficher_EDT_P();
    $view->afficher_footer();
}
public function afficher_EDT_M(){
    $view= new ViewEDT();
    $view->logo();
    $view->contact();
    $view->afficher_menu();
    $view->afficher_EDT_M();
    $view->afficher_footer();
}
public function afficher_EDT_S(){
    $view= new ViewEDT();
    $view->logo();
    $view->contact();
    $view->afficher_menu();
    $view->afficher_EDT_S();
    $view->afficher_footer();
}
public function get_matiereJour($jour,$id_classe){
    $model = new ModelEDT();
    $res= $model->get_matiereJour($jour,$id_classe);
    return $res; 
    
}
public function EDT_P(){
    $model = new ModelEDT();
    $res= $model->get_EDT_P();
    return $res; 
}
public function nom_groupe($id_classe){
    $model = new ModelEDT();
    $res= $model->get_nomClasse($id_classe);
    return $res; 
}
public function EDT_M(){
    $model = new ModelEDT();
    $res= $model->get_EDT_M();
    return $res; 
}
public function EDT_S(){
    $model = new ModelEDT();
    $res= $model->get_EDT_S();
    return $res; 
}
public function nom_matiere($id_matiere){
    $model = new ModelEDT();
    $res= $model->get_nomMatiere($id_matiere);
    return $res; 
}

}
