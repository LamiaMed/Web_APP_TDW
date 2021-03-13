<?php
require_once('../MVC/Model/ModelInformation.php');
require_once('../MVC/View/ViewInformation.php');

class ControllerInformation{
 

public function contact(){
    $model = new ModelInformation();
    $res= $model->get_contact();
    return $res;
}
public function afficher(){
    $view= new ViewInformation();
    $view->logo();
    $view->contact();
    $view->info_perso();
    $view->afficher_edt();
    $view->afficher_activ();
    $view->afficher_note();
    $view->afficher_footer();
}
public function afficherFORParents(){
    $view= new ViewInformation();
    $view->logo();
    $view->contact();
    $view->info_perso();
    $view->afficher_edt();
    $view->afficher_activ();
    $view->afficher_note_P();
    $view->afficher_footer();
}
public function get_info($user,$mdp){
    $model = new ModelInformation();
    $res= $model->get_info($user,$mdp);
    return $res;
}
public function get_classe($type){
    $model = new ModelInformation();
    $res= $model->get_classe($type);
    return $res;
}

public function get_matiereJour($jour,$id_classe){
    $model = new ModelInformation();
    $res= $model->get_matiereJour($jour,$id_classe);
    return $res; 
    
}
public function EDT($id_classe){
    $model = new ModelInformation();
    $res= $model->get_EDT($id_classe);
    return $res; 
}
public function nom_matiere($id_matiere){
    $model = new ModelInformation();
    $res= $model->get_nomMatiere($id_matiere);
    return $res; 
}
public function get_act($groupe){
    $model = new ModelInformation();
    $res= $model->get_act($groupe);
    return $res; 
}
public function get_note($matricule){
    $model = new ModelInformation();
    $res= $model->get_note($matricule);
    return $res; 
}
public function get_menu(){
    $model = new ModelInformation();
    $res= $model->get_menu();
    return $res;
}
}
