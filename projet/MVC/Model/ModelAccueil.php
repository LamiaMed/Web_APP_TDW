<?php
require_once('../MVC/Controller/ControllerAccueil.php');
class ModelAccueil{
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
    public function get_diaporama(){
        $c=$this->connexion_db($this->dbname,$this->host,$this->user,$this->password);
        $req="SELECT link FROM diaporama ";
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
    public function get_articles(){
        $c=$this->connexion_db($this->dbname,$this->host,$this->user,$this->password);
        $req="SELECT titre,description,image FROM article WHERE (tous='1') order by date desc limit 8";
        $res=$this->requete($c,$req);
        $this->deconnexion($c);
        return $res;
    }
 

}
