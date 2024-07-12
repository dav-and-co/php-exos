
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
class pizza {
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
	function pay($montant) {
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
	function ship() {
		if ($this->statut==="payé") {
			$this->statut="livré";
			echo "<p> livraison en cours  </p>";
		} else {
			echo "<p> pizza non payée </p>";
		}
	}

}

// commande de la pizza de Claude
$claude = new pizza ("m", "creme","fromage","olives","comcombre");
	var_dump($claude);
$claude	-> pay(10);
	var_dump($claude);
$claude	-> ship();
	var_dump($claude);

?>
</main>


