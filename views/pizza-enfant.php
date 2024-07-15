
    <!-- http://localhost/piscine-php-contact/views/pizza-enfant.php   -->

<!--  appel de config et index.controleur  -->

<?php require_once('../config/config.php');?>
<?php require_once('../controller/commande-Controller.php'); ?> 
<?php require_once('./mealparent.php');?>

<main>

<!-- créez une classe Meal, qui contient toutes les propriétés communes aux deux classes + méthodes ship et pay
Faites hériter les classes Pizza et Hotdog ("enfants") de la classe Meal ("parent"), pour qu'elles beneficient des propriétés et méthodes de la classe parente
Attention à utiliser la bonne visibilité (private, protected ou public) pour les propriétés et méthodes de la classe Meal -->

<?php
class Pizza extends Mealparent{ 
	// initialisation des données privées
	private $orderedat;
	private $base;
	private $ingredient1;
	private $ingredient2;
	private $ingredient3;

	// fonction qui initialise les données lors du passage de la commande : new 
	function __construct($size,$base,$ingredient1,$ingredient2,$ingredient3) {
		$this->size=$size;
		$this->statut="en cours de commande";
		$this->orderedat=new DateTime();
		$this->base=$base;
		$this->ingredient1=$ingredient1;
		$this->ingredient2=$ingredient2;
		$this->ingredient3=$ingredient3;

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
	public function getingredients() {
		return " les ingrédients : ".$this->ingredient1. " - ". $this->ingredient2. " - ".$this->ingredient3;
	}

	public function getdonnees() {
		return " la taille est ". $this->size. " et son prix : ".$this->price;
	}
	public function gettableau() {
		return [$this->ingredient1,$this->ingredient2,$this->ingredient3,$this->size,$this->price];
	}
}

// initialisation de l'instance de class pizza
$claude = new Pizza ("m", "creme","fromage","olives","comcombre");

// Créez une pizza avec new Pizza. Puis, affichez avec du HTML, la base de la pizza, les ingredients, 
// la taille et le prix. Pour ça, générez des getters pour les propriétés que vous voulez utiliser en dehors de la classe.

echo "<p> --------------------------------------------------------- </p>";
echo $claude -> getingredients();
echo "<p> --------------------------------------------------------- </p>";
echo $claude -> getdonnees();
echo "<p> --------------------------------------------------------- </p>";
$i = 0;
foreach ($claude -> gettableau() as $composant) {
	$i=$i+1;
	if ($i===5) {
		echo "<h2> le prix est : ".$composant."</h2>";
	} elseif ($i===4) {
			echo "<p> la taille est : ".$composant."</p>";
		} elseif ($i===1) {
				echo "<h4> la composition est : </h4>";
				echo "<p>".$composant."</p>";
			} else {
				echo "<p>".$composant."</p>";
			}
}
echo "<p> --------------------------------------------------------- </p>";
$claude	-> pay(10);
echo "<p> --------------------------------------------------------- </p>";
$claude	-> ship();

?>
</main>


