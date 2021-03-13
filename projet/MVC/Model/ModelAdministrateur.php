<?php
require_once('../MVC/Controller/ControllerAdministrateur.php');
class ModelAdministrateur
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
    public function inserer_Article($titre, $image, $description, $type)
    {
        $date = date('y-m-d');
        $c = $this->connexion_db($this->dbname, $this->host, $this->user, $this->password);
        $req = "INSERT INTO article (titre,image ,description,date) VALUES('$titre','$image','$description','$date') ";
        $res = $this->requete($c, $req);
        foreach ($type as $row) {
            if ($row == 'tous') {
                $req1 = "UPDATE article SET tous='1' WHERE (titre='$titre' AND description='$description') ";
                $res1 = $this->requete($c, $req1);
            }
            if ($row == 'ens') {
                $req2 = "UPDATE article SET ens='1' WHERE (titre='$titre' AND description='$description') ";
                $res2 = $this->requete($c, $req2);
            }
            if ($row == 'primaire') {
                $req3 = "UPDATE article SET primaire='1' WHERE (titre='$titre' AND description='$description') ";
                $res3 = $this->requete($c, $req3);
            }
            if ($row == 'moyen') {
                $req4 = "UPDATE article SET moyen='1' WHERE (titre='$titre' AND description='$description') ";
                $res4 = $this->requete($c, $req4);
            }
            if ($row == 'secondaire') {
                $req5 = "UPDATE article SET secondaire='1' WHERE (titre='$titre' AND description='$description') ";
                $res5 = $this->requete($c, $req5);
            }
            if ($row == 'parents') {
                $req6 = "UPDATE article SET parents='1' WHERE (titre='$titre' AND description='$description') ";
                $res6 = $this->requete($c, $req6);
            }
        }

        $this->deconnexion($c);
        return $res;
    }
    public function inserer_Diapo($lien, $action)
    {
        $c = $this->connexion_db($this->dbname, $this->host, $this->user, $this->password);
        foreach ($action as $act) {
            if ($act == "supprimer") {
                $req = "DELETE  FROM diaporama WHERE link='$lien' ";
                $res = $this->requete($c, $req);
            } else if ($act == "ajouter") {
                $req = "INSERT IGNORE INTO diaporama (link) VALUES ('$lien') ";
                $res = $this->requete($c, $req);
            }
        }

        $this->deconnexion($c);
        return $res;
    }
    public function inserer_Contact($tlphn, $faxe, $adr)
    {
        $c = $this->connexion_db($this->dbname, $this->host, $this->user, $this->password);
        if (!empty($tlphn)) {
            $req = "UPDATE information SET information='$tlphn' WHERE (titre='Numéro de téléphone :') ";
            $res = $this->requete($c, $req);
        }
        if (!empty($faxe)) {
            $req = "UPDATE information SET information='$faxe' WHERE (titre='Fax:') ";
            $res = $this->requete($c, $req);
        }
        if (!empty($adr)) {
            $req = "UPDATE information SET information='$adr' WHERE (titre='Mail :') ";
            $res = $this->requete($c, $req);
        }

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
}
