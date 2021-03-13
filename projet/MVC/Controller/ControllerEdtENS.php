<?php
require_once('../MVC/Model/ModelEdtENS.php');
require_once('../MVC/View/ViewEdtENS.php');

class ControllerEdtENS
{
  public function contact()
  {
    $model = new ModelEdtENS();
    $res = $model->get_contact();
    return $res;
  }
  public function afficher_accueil()
  {
    $view = new ViewEdtENS();
    $view->logo();
    $view->contact();
    $view->edt_Affichage();
    $view->afficher_footer();
  }
  public function listeENS()
  {
    $model = new ModelEdtENS();
    $res = $model->get_ListeENS();
    return $res;
  }
  public function nom_groupe($id_classe)
  {
    $model = new ModelEdtENS();
    $res = $model->get_nomClasse($id_classe);
    return $res;
  }
  public function modif_EDT($id, $nom, $prenom, $grp, $niv, $nbh, $hrecp)
  {
    $model = new ModelEdtENS();
    $res = $model->modif_EDT($id, $nom, $prenom, $grp, $niv, $nbh, $hrecp);
  }
  public function add_EDT($id, $nom, $prenom, $grp, $niv, $nbh, $hrecp)
  {
    $model = new ModelEdtENS();
    $res = $model->add_EDT($id, $nom, $prenom, $grp, $niv, $nbh, $hrecp);
  }
  public function get_menu()
  {
    $model = new ModelEdtENS();
    $res = $model->get_menu();
    return $res;
  }
}
