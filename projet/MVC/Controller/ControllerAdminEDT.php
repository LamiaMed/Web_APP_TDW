<?php
require_once('../MVC/Model/ModelAdminEDT.php');
require_once('../MVC/View/ViewAdminEDT.php');

class ControllerAdminEDT
{
    public function get_menu()
    {
        $model = new ModelAdminEDT();
        $res = $model->get_menu();
        return $res;
    }
    public function contact()
    {
        $model = new ModelAdminEDT();
        $res = $model->get_contact();
        return $res;
    }

    public function afficher_accueil()
    {
        $view = new ViewAdminEDT();
        $view->logo();
        $view->contact();
        $view->afficher_EDT_P();
        $view->afficher_EDT_M();
        $view->afficher_EDT_S();

        $view->afficher_footer();
    }
    public function get_matiereJour($jour, $id_classe)
    {
        $model = new ModelAdminEDT();
        $res = $model->get_matiereJour($jour, $id_classe);
        return $res;
    }
    public function EDT_P()
    {
        $model = new ModelAdminEDT();
        $res = $model->get_EDT_P();
        return $res;
    }
    public function nom_groupe($id_classe)
    {
        $model = new ModelAdminEDT();
        $res = $model->get_nomClasse($id_classe);
        return $res;
    }
    public function EDT_M()
    {
        $model = new ModelAdminEDT();
        $res = $model->get_EDT_M();
        return $res;
    }
    public function EDT_S()
    {
        $model = new ModelAdminEDT();
        $res = $model->get_EDT_S();
        return $res;
    }
    public function nom_matiere($id_matiere)
    {
        $model = new ModelAdminEDT();
        $res = $model->get_nomMatiere($id_matiere);
        return $res;
    }
}
