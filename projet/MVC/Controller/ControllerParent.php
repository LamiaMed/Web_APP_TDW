<?php
require_once('C:/xampp/htdocs/projet/MVC/Model/ModelParent.php');
require_once('C:/xampp/htdocs/projet/MVC/View/ViewParent.php');



class ControllerParent{

   

public function get_menu(){
    $model = new ModelParent();
    $res= $model->get_menu();
    return $res;
}
public function contact(){
    $model = new ModelParent();
    $res= $model->get_contact();
    return $res;
}
public function afficher_accueil(){
    $view= new ViewParent();
    $view->logo();
    $view->contact();
    $view->afficher_menu();
    $view->login();
    $view->afficher_article();
    $view->afficher_footer();
}
public function articles(){
    $model = new ModelParent();
    $res= $model->get_articles();
    return $res;
}
public function login(){
  
    $view= new ViewParent();
    $view->login();
         
                //$model = new ModelParent();
               // $res= $model->authentification($username,$password);
                  
}
}
