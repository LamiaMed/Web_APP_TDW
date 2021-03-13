<?php
require_once('C:/xampp/htdocs/projet/MVC/Controller/ControllerParent.php');
class ModelParent{
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
    public function get_articles(){
        $c=$this->connexion_db($this->dbname,$this->host,$this->user,$this->password);
        $req="SELECT titre,description,image FROM article WHERE (parents='1') order by date desc limit 8";
        $res=$this->requete($c,$req);
        $this->deconnexion($c);
        return $res;
    }
    public function authentification($username,$password){
        $c=$this->connexion_db($this->dbname,$this->host,$this->user,$this->password);
        $req="SELECT user,pass FROM compte WHERE (user='$username' AND pass='$password' AND (type='4' OR type='1'))";
        $res=$this->requete($c,$req);
        $this->deconnexion($c);
        return $res;
    }
   

}
