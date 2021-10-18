<?php 
    class photo{
        private $pdo;

	// Connexion à la base de données
	public function __construct() {
		$config = parse_ini_file("config.ini");
		
		try {
			$this->pdo = new \PDO("mysql:host=".$config["host"].";dbname=".$config["database"].";charset=utf8", $config["user"], $config["password"]);
		} catch(Exception $e) {
			echo $e->getMessage();
		}
	}
    public function getPhotos($idProduit) {

		$sql = "SELECT imageProd FROM photos INNER JOIN produit ON photos.refProduit= produit.codeProduit where refProduit = :code";

		$req = $this->pdo->prepare($sql);
        
		$req->bindParam(':code', $idProduit, PDO::PARAM_STR);
		$req->execute();

		return $req->fetchAll();
	}

	

    }
?>