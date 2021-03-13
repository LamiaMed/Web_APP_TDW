<?php
require_once('C:/xampp/htdocs/projet/MVC/Model/ModelEleve.php');
require_once('C:/xampp/htdocs/projet/MVC/View/ViewEleve.php');



class ControllerEleve{

   

public function get_menu(){
    $model = new ModelEleve();
    $res= $model->get_menu();
    return $res;
}
public function contact(){
    $model = new ModelEleve();
    $res= $model->get_contact();
    return $res;
}
public function afficher_accueil(){
    $view= new ViewEleve();
    $view->logo();
    $view->contact();
    $view->afficher_menu();
    $view->login();
    $view->afficher_article();
    $view->afficher_footer();
}
public function articles(){
    $model = new ModelEleve();
    $res= $model->get_articles();
    return $res;
}
public function login(){
  
    $view= new ViewEleve();
    $view->login();
         
                  
}
}
