<?php
require_once('../MVC/View/ViewLoginAdmin.php');
require_once('../MVC/Model/ModelLoginAdmin.php');

class ControllerLoginAdmin{

    public function afficher_accueil(){
        $view= new ViewLoginAdmin();
    
        $view->logo();
        $view->contact();
        $view->afficher_menu();
        $view->login();
    $view->afficher_footer();
       
    }
    public function contact(){
        $model = new ModelLoginAdmin();
        $res= $model->get_contact();
        return $res;
    }
    public function get_menu(){
        $model = new ModelLoginAdmin();
        $res= $model->get_menu();
        return $res;
    }
    
}
