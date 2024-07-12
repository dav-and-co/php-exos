
    <!-- http://localhost/piscine-php-contact/views/pizza.php   -->

<!--  appel de config et index.controleur  -->

<?php require_once('../config/config.php');?>
<?php require_once('../controller/commande-Controller.php'); ?> 

<main>

<!-- Créez un nouveau fichier contenant une classe Pizza.
Ajoutez en propriétés privées : size, price, base, ingredient1, ingredient2, ingredient3, status, orderedAt
Faites en sorte que quand une nouvelle Pizza est créée (nouvelle instance), toutes les propriétés soient obligatoirement remplies, soit par l'utilisateur, soit calculées.
Faites une méthode pay() qui permet de passer la pizza en status "payé" uniquement si le statut actuel est "en cours"
Faites une méthode ship() qui permet de passer la pizza en status "livré" uniquement si le status actuel est "payé"
Commentez votre code -->

<?php
class Pizza {
	// initialisation des données privées
	private $price;
	private $size;
	private $statut;
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
	public function pay($montant) {
		if ($this->statut==="en cours de commande") {
			if ($montant===$this->price) {
				echo "<p> C'est bon, merci ! </p>";
				$this->statut="payé";
			} else {
				echo "<p> Merci de payer le bon montant : ".$this->price." </p>";
			}
		} else {
			echo "<p> Commande non enregistrée </p>";
		}
	}
	public function ship() {
		if ($this->statut==="payé") {
			$this->statut="livré";
			echo "<p> livraison en cours  </p>";
		} else {
			echo "<p> pizza non payée </p>";
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

echo $claude -> getingredients();
echo $claude -> getdonnees();

$synthese =  $claude -> gettableau();
$i = 0;
foreach ($claude as $composant) {
	$i=$i+1;
	if ($i===5) {
		echo "<h2> le prix est : ".$composant."</h2>";
	} elseif ($i===4) {
			echo "<p> la taille est : ".$composant."</p>";
		} elseif ($i===1) {
				echo "<p> la composition est : </p>";
				echo "<p>".$composant."</p>";
			} else {
				echo "<p>";$composant."</p>";
			}
}



$claude	-> pay(10);

$claude	-> ship();
	var_dump($claude);

?>
</main>


