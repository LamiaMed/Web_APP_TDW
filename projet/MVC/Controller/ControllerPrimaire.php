<?php
require_once('../MVC/Model/ModelPrimaire.php');
require_once('../MVC/View/ViewPrimaire.php');
class ControllerPrimaire{
public function __construct(){
   
    $arguments = func_get_args();
    $numberOfArguments = func_num_args();

    if (method_exists($this, $function = '__construct'.$numberOfArguments)) {
        call_user_func_array(array($this, $function), $arguments);
    }
    
}
public function __construct1($url){
     $this->afficher_accueil();
}
 
public function get_menu(){
    $model = new ModelPrimaire();
    $res= $model->get_menu();
    return $res;
}
public function contact(){
    $model = new ModelPrimaire();
    $res= $model->get_contact();
    return $res;
}
public function articles(){
    $model = new ModelPrimaire();
    $res= $model->get_articles();
    return $res;
}
public function afficher_accueil(){
    $view= new ViewPrimaire();
    $view->logo();
    $view->contact();
    $view->afficher_menu();
    $view->afficher_article();
    $view->afficher_footer();
}

}
