<?php
require_once('../MVC/Controller/ControllerUtilisateurs.php');
class ModelUtilisateur
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
    public function get_User()
    {
        $c = $this->connexion_db($this->dbname, $this->host, $this->user, $this->password);
        $req = "SELECT id,id_type,nom,prenom,sexe,adr,tlphn1,tlphn2,tlphn3,email FROM utilisateur ";
        $res = $this->requete($c, $req);
        $this->deconnexion($c);
        return $res;
    }
    public function get_type($id)
    {
        $c = $this->connexion_db($this->dbname, $this->host, $this->user, $this->password);
        $req = "SELECT type_utilisateur FROM type_utilisateur where (id='$id')";
        $res = $this->requete($c, $req);
        $this->deconnexion($c);
        return $res;
    }

    public function modif_User($id, $id_type, $nom, $prenom, $sexe, $adr, $tlphn1, $tlphn2, $tlphn3, $email)
    {
        $c = $this->connexion_db($this->dbname, $this->host, $this->user, $this->password);
        if (!empty($nom)) {
            $req = "UPDATE utilisateur SET nom='$nom' WHERE (id='$id') ";
            $res = $this->requete($c, $req);
        }
        if (!empty($prenom)) {
            $req = "UPDATE utilisateur SET prenom='$prenom' WHERE (id='$id') ";
            $res = $this->requete($c, $req);
        }
        if (!empty($sexe)) {
            $req = "UPDATE utilisateur SET sexe='$sexe' WHERE (id='$id') ";
            $res = $this->requete($c, $req);
        }
        if (!empty($id_type)) {
            $val = $this->return_type($id_type);
            $idt = 0;
            foreach ($val as $elm) {
                $idt = $elm["id"];
            }
            $req = "UPDATE utilisateur SET id_type='$idt' WHERE (id='$id') ";
            $res = $this->requete($c, $req);
        }
        if (!empty($adr)) {
            $req = "UPDATE utilisateur SET adr='$adr' WHERE (id='$id') ";
            $res = $this->requete($c, $req);
        }
        if (!empty($tlphn1)) {
            $req = "UPDATE utilisateur SET tlphn1='$tlphn1', tlphn2='$tlphn2',tlphn3='$tlphn3' WHERE (id='$id') ";
            $res = $this->requete($c, $req);
        }
        if (!empty($email)) {
            $req = "UPDATE utilisateur SET email='$email' WHERE (id='$id') ";
            $res = $this->requete($c, $req);
        }


        $this->deconnexion($c);
        return $res;
    }
    private function return_type($type)
    {
        $c = $this->connexion_db($this->dbname, $this->host, $this->user, $this->password);
        $req = "SELECT id FROM type_utilisateur where (type_utilisateur='$type')";
        $res = $this->requete($c, $req);
        $this->deconnexion($c);
        return $res;
    }
    public function add_User($type, $nom, $prenom, $adr, $sexe, $tlphn1, $tlphn2, $tlphn3, $email)
    {
        $val = $this->return_type($type);
        $id = 0;
        foreach ($val as $elem) {
            $id = $elem["id"];
        }

        $c = $this->connexion_db($this->dbname, $this->host, $this->user, $this->password);
        $req = "INSERT INTO utilisateur (id_type,nom,prenom ,adr,sexe,tlphn1,tlphn2,tlphn3,email) VALUES('$id','$nom','$prenom','$adr','$sexe','$tlphn1','$tlphn2','$tlphn3','$email') ";
        $res = $this->requete($c, $req);
    }
}
