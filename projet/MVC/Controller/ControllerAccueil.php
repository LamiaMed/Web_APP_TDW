<?php
require_once('../MVC/Model/ModelAccueil.php');
require_once('../MVC/View/ViewAccueil.php');
class ControllerAccueil{
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
    $model = new ModelAccueil();
    $res= $model->get_menu();
    return $res;
}
public function diaporama(){
    $model = new ModelAccueil();
    $res= $model->get_diaporama();
    return $res;
}
public function contact(){
    $model = new ModelAccueil();
    $res= $model->get_contact();
    return $res;
}
public function articles(){
    $model = new ModelAccueil();
    $res= $model->get_articles();
    return $res;
}

public function afficher_accueil(){
    $view= new ViewAccueil();

    $view->logo();
    $view->contact();
    $view->afficher_diaporama();
    $view->afficher_menu();
    $view->afficher_articleUP();
   // $view->afficher_articleDOWN();
    $view->afficher_footer();
}

}
