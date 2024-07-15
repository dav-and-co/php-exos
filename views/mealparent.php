

<!--  appel de config et index.controleur  -->

<?php require_once('../config/config.php');?>
<?php require_once('../controller/commande-Controller.php'); ?> 

<main>

<!-- créez une classe Meal, qui contient toutes les propriétés communes aux deux classes + méthodes ship et pay
Faites hériter les classes Pizza et Hotdog ("enfants") de la classe Meal ("parent"), pour qu'elles beneficient des propriétés et méthodes de la classe parente
Attention à utiliser la bonne visibilité (private, protected ou public) pour les propriétés et méthodes de la classe Meal -->

<?php
class Mealparent {
	// initialisation des données privées
	protected $price;
	protected $size;
	protected $statut;


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
}

?>
</main>


