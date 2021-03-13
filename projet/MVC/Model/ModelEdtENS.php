<?php
require_once('../MVC/Controller/ControllerEdtENS.php');
class ModelEdtENS
{
    private $dbname = "TDW";
    private $host = "127.0.0.1";
    private $user = "root";
    private $password = "";

    private function connexion_db($dbname, $host, $user, $password)
    {
        $dsn = "mysql:dbname=$dbname; host=$host;";
        try {
            $c = new PDO($dsn, $user, $password);
        } catch (PDOException $ex) {
            printf("erreur de connexion à la base de donnée", $ex->getMessage());
            exit();
        }
        return $c;
    }
    private function deconnexion(&$c)
    {
        $c = null;
    }
    private function requete($c, $req)
    {
        return $c->query($req);
    }

    public function get_contact()
    {
        $c = $this->connexion_db($this->dbname, $this->host, $this->user, $this->password);
        $req = "SELECT id,nom,link FROM contact ";
        $res = $this->requete($c, $req);
        $this->deconnexion($c);
        return $res;
    }
    public function get_menu()
    {
        $c = $this->connexion_db($this->dbname, $this->host, $this->user, $this->password);
        $req = "SELECT menu , types FROM menu_accueil ";
        $res = $this->requete($c, $req);
        $this->deconnexion($c);
        return $res;
    }
    public function get_ListeENS()
    {
        $c = $this->connexion_db($this->dbname, $this->host, $this->user, $this->password);
        $req = "SELECT id,id_ens, nom,prenom,heure_reception,id_classe,nb_heures FROM ens ORDER BY nom ";
        $res = $this->requete($c, $req);
        $this->deconnexion($c);
        return $res;
    }
    public function get_nomClasse($id_classe)
    {
        $c = $this->connexion_db($this->dbname, $this->host, $this->user, $this->password);
        $req = "SELECT nom,id_niveau FROM classe where(id='$id_classe') ";
        $res = $this->requete($c, $req);
        $this->deconnexion($c);
        return $res;
    }
    public function modif_EDT($id, $nom, $prenom, $grp, $niv, $nbh, $hrecp)
    {
        $c = $this->connexion_db($this->dbname, $this->host, $this->user, $this->password);
        if (!empty($nom)) {
            $req = "UPDATE ens SET nom='$nom' WHERE (id='$id') ";
            $res = $this->requete($c, $req);
        }
        if (!empty($prenom)) {
            $req = "UPDATE ens SET prenom='$prenom' WHERE (id='$id') ";
            $res = $this->requete($c, $req);
        }
        if (!empty($grp)) {
            $req = "UPDATE ens SET id_classe='$grp' WHERE (id='$id') ";
            $res = $this->requete($c, $req);
        }
        if (!empty($hrecp)) {
            $req = "UPDATE ens SET heure_reception='$hrecp' WHERE (id='$id') ";
            $res = $this->requete($c, $req);
        }
        if (!empty($nbh)) {
            $req = "UPDATE ens SET nb_heures='$nbh' WHERE (id='$id') ";
            $res = $this->requete($c, $req);
        }


        $this->deconnexion($c);
        return $res;
    }
    public function add_EDT($id, $nom, $prenom, $grp, $niv, $nbh, $hrecp)
    {
        $c = $this->connexion_db($this->dbname, $this->host, $this->user, $this->password);
        $req = "INSERT INTO ens (id_ens,nom,prenom ,id_classe,heure_reception,nb_heures) VALUES('$id','$nom','$prenom','$grp','$hrecp','$nbh') ";
        $res = $this->requete($c, $req);
    }
}
