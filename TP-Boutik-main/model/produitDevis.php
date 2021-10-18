<?php
class produitDevis{
    private $pdo;
    public $codeProduit;
    public $description;

    public function __construct() {
		$config = parse_ini_file("config.ini");
		
		try {
			$this->pdo = new \PDO("mysql:host=".$config["host"].";dbname=".$config["database"].";charset=utf8", $config["user"], $config["password"]);
		} catch(Exception $e) {
			echo $e->getMessage();
		}
	}

    public function insert($description,$codeProduit){
        $sql = "INSERT INTO `devis`(`description`, `codeProduit`) VALUES (:description, :codeP)";
        $req = $this->pdo->prepare($sql);
        $req->bindParam(':description', $description);
		$req->bindParam(':codeP', $codeProduit);
        
		$req->execute();
        //var_dump($req);

    }

    public function afficher(){
        $sql = "SELECT * FROM `devis`";
        $req = $this->pdo->prepare($sql);
        $req->execute(); 
        echo "<form action='index.php?action=repondre' method='POST' name='ajoutArticle'>";
        echo "<table>";
        while($resultat=$req->fetch()){
            
            echo "<tr>";
            echo "<td>".$resultat['description']."</td>";
            echo "<td><input type='submit' name='devis' value='Valider'/></tr>";
        }
        echo "</table></form>";
    
    }

    public function repondre(){
        echo "<form action='' method='POST' name='ajoutArticle'>";
        echo "<h1>Repondre au devis </h1> <br>
        <p>tarif</p><input type='text' name ='tarif'> <br>
        <p>commentaire</p><input type='text' name='commentaire'><br>
        <input type='submit' name='devis' value='Valider'/>";
        echo "</form>";
    }

    
}