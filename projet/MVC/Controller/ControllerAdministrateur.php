<?php
require_once('../MVC/Model/ModelAdministrateur.php');
require_once('../MVC/View/ViewAdministrateur.php');

class ControllerAdministrateur
{
    public function contact()
    {
        $model = new ModelAdministrateur();
        $res = $model->get_contact();
        return $res;
    }
    public function afficher_accueil()
    {
        $view = new ViewAdministrateur();
        $view->logo();
        $view->contact();
        $view->Cadres_Affichage();
        $view->afficher_footer();
    }
    public function inserer_Article($titre, $image, $description, $type)
    {
        $model = new ModelAdministrateur();
        $res = $model->inserer_Article($titre, $image, $description, $type);
    }
    public function inserer_Diapo($lien, $action)
    {
        $model = new ModelAdministrateur();
        $res = $model->inserer_Diapo($lien, $action);
    }
    public function inserer_Contact($tlphn, $faxe, $adr)
    {
        $model = new ModelAdministrateur();
        $res = $model->inserer_Contact($tlphn, $faxe, $adr);
    }
    public function get_menu()
    {
        $model = new ModelAdministrateur();
        $res = $model->get_menu();
        return $res;
    }
}
