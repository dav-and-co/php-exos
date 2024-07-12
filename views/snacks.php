<?php
// http://localhost/piscine-php-contact/views/snacks.php


class vendorMachine {

	public $snacks;
	public $cashAmount;
	public $isOn;

	function __construct() {
		$this->snacks = [
			[
				"name" => "Snickers",
				"price" => 1,
				"quantity" => 5,
			],
			[
				"name" => "Mars",
				"price" => 1.5,
				"quantity" => 5,
			],
			[
				"name" => "Twix",
				"price" => 2,
				"quantity" => 5,
			],
			[
				"name" => "Bounty",
				"price" => 2.5,
				"quantity" => 5,
			]
		];
		$this->cashAmount = 0;
		$this->isOn = false;
	}
	
	function turnOn() {
		// allume la machine 
		if ($this->isOn === false) {
			$this->isOn = true;
		}
	}

	function turnOff() {
		// s'il est après 18h (on ne peux pas éteindre la machine avant 18h)
		var_dump(intval(date("H")));
		if ($this->isOn === true && intval(date("H")) > (17-2)) {
			// éteint la machine			
			$this->isOn = false;
		}

	}

	function buySnack($snackName) {
		// si la machine est allumée
		if ($this->isOn) {
			// si le snack est présent dans la liste
			// et que la quantité est suffisante
			foreach ($this->snacks as $key => $snack) {
                if ($snack['name'] === $snackName && $snack['quantity'] > 0) {
					// on enlève une quantité pour ce snack
                    $this->snacks[$key]['quantity'] = $this->snacks[$key]['quantity'] - 1;
					// et on ajoute au cashAmount le montant du snack
                    $this->cashAmount = $this->cashAmount+$snack["price"];
				}
			}
		}
	}

	function shootWithFoot() {
		// si la machine est allumée
		if ($this->isOn == true) {	
			// et fait tomber un montant au hasard
			//donc decremente le cashAmount
			$this->cashAmount = round(round($this->cashAmount,2)-round((random_int(0,$this->cashAmount*100))/100,2), 2);
			// fais tomber un snack au hasard
			$rd=floor(rand(0,count($this->snacks)-1));
			if ($this->snacks[$rd]["quantity"]>1) {
				$this->snacks[$rd]["quantity"]=$this->snacks[$rd]["quantity"]-1;
			}
		}
	}

}

$date20240703 = new vendorMachine();
$date20240703->turnOn();
// $date20240703->buySnack("Snickers");
// $date20240703->buySnack("Twix");
// $date20240703->buySnack("Bounty");
// $date20240703->shootWithFoot();
// $date20240703->turnOff();
	var_dump($date20240703);

?>