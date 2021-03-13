<?php
require_once('../MVC/Controller/ControllerAdminEDT.php');
class ModelAdminEDT{
    private $dbname="TDW";
    private $host="127.0.0.1";
    private $user="root";
    private $password ="";

    private function connexion_db($dbname,$host,$user,$password){
        $dsn= "mysql:dbname=$dbname; host=$host;";
        try{
        $c=new PDO($dsn,$user,$password);
        }catch(PDOException $ex){
          printf("erreur de connexion à la base de donnée",$ex->getMessage());
          exit();
        }
        return $c;
    }
    private function deconnexion(&$c){
        $c=null;
    }
    private function requete($c,$req){
       return $c->query($req);
    }
    public function get_menu(){
        $c=$this->connexion_db($this->dbname,$this->host,$this->user,$this->password);
        $req="SELECT menu , types FROM menu_accueil ";
        $res=$this->requete($c,$req);
        $this->deconnexion($c);
        return $res;
    }
   
    public function get_contact(){
        $c=$this->connexion_db($this->dbname,$this->host,$this->user,$this->password);
        $req="SELECT id,nom,link FROM contact ";
        $res=$this->requete($c,$req);
        $this->deconnexion($c);
        return $res;
    }
    public function get_EDT_P(){
        $c=$this->connexion_db($this->dbname,$this->host,$this->user,$this->password);
        $req="SELECT id FROM classe where(id IN (select id_classe from edt ) AND id_cycle='1') ";
        $res=$this->requete($c,$req);
        $this->deconnexion($c);
        return $res;
    }
    public function get_matiereJour($jour,$id_classe){
        $c=$this->connexion_db($this->dbname,$this->host,$this->user,$this->password);
        $req="SELECT id_matiere FROM edt where(id_classe =$id_classe AND jour = '$jour') ";
        $res=$this->requete($c,$req);
        $this->deconnexion($c);
        return $res;
    }
    public function get_nomClasse($id_classe){
        $c=$this->connexion_db($this->dbname,$this->host,$this->user,$this->password);
        $req="SELECT nom,id_niveau FROM classe where(id='$id_classe') ";
        $res=$this->requete($c,$req);
        $this->deconnexion($c);
        return $res;
    }
    public function get_nomMatiere($id_matiere){
        $c=$this->connexion_db($this->dbname,$this->host,$this->user,$this->password);
        $req="SELECT nom FROM matiere where(id='$id_matiere') ";
        $res=$this->requete($c,$req);
        $this->deconnexion($c);
        return $res;
    }
    public function get_EDT_M(){
        $c=$this->connexion_db($this->dbname,$this->host,$this->user,$this->password);
        $req="SELECT id FROM classe where(id IN (select id_classe from edt ) AND id_cycle='2') ";
        $res=$this->requete($c,$req);
        $this->deconnexion($c);
        return $res;
    }
    public function get_EDT_S(){
        $c=$this->connexion_db($this->dbname,$this->host,$this->user,$this->password);
        $req="SELECT id FROM classe where(id IN (select id_classe from edt ) AND id_cycle='3') ";
        $res=$this->requete($c,$req);
        $this->deconnexion($c);
        return $res;
    }

}
