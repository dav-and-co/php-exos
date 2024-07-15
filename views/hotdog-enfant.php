
    <!-- http://localhost/piscine-phpgi-contact/views/hotdog-enfant.php   -->

<!--  appel de config et index.controleur  -->

<?php require_once('../config/config.php');?>
<?php require_once('../controller/commande-Controller.php'); ?> 
<?php require_once('./mealparent.php');?>

<main>

<!-- créez une classe Meal, qui contient toutes les propriétés communes aux deux classes + méthodes ship et pay
Faites hériter les classes Pizza et Hotdog ("enfants") de la classe Meal ("parent"), pour qu'elles beneficient des propriétés et méthodes de la classe parente
Attention à utiliser la bonne visibilité (private, protected ou public) pour les propriétés et méthodes de la classe Meal -->

<?php
class Hotdog extends Mealparent{
	// initialisation des données privées
	private $orderedat;
	private $bread;

	// fonction qui initialise les données lors du passage de la commande : new 
	function __construct($size,$bread) {
		$this->size=$size;
		$this->statut="en cours de commande";
		$this->orderedat=new DateTime();
		$this->bread=$bread;


		if ($size==="s") {
			$this->price=8;
		}
		if ($size==="m") {
			$this->price=10;
		}
		if ($size==="l") {
			$this->price=12;
		}
		if ($size==="xl") {
			$this->price=14;
		}
	}
	public function getdonnees() {
		return " la taille est ". $this->size. " et son prix : ".$this->price;
	}

}

// initialisation de l'instance de class pizza
$claudeHD = new Hotdog ("m","cereales");




echo "<p> --------------------------------------------------------- </p>";
echo $claudeHD -> getdonnees();

echo "<p> --------------------------------------------------------- </p>";
$claudeHD	-> pay(10);
echo "<p> --------------------------------------------------------- </p>";
$claudeHD	-> ship();

?>
</main>


