<?php

$products = [
    [
        'name' => 'Aspirateur',
        'price' => 200,
        'category' => 'electro-menager',
        'description' => 'Description du produit 1',
        'createdAt'=> '22-03-2024',
    ],
    [
        'name' => 'Frigo',
        'price' => 100,
        'category' => 'electro-menager',
        'description' => 'Description du produit 2',
        'createdAt'=> '22-03-2023',
    ],
    [
        
        'name' => 'Four',
        'price' => 300,
        'category' => 'electro-menager',
        'description' => 'Description du produit 3',
        'createdAt'=> '02-03-2024',
    ],
    [
        'name' => 'Télévision',
        'price' => 600,
        'category' => 'electro-menager',
        'description' => 'Description du produit 4',
        'createdAt'=> '20-03-2024',
    ],
    [
        'name' => 'Ordinateur',
        'price' => 900,
        'category' => 'informatique',
        'description' => 'Description du produit 5',
        'createdAt'=> '20-02-2024',
    ],
    [
        'name' => 'Tablette',
        'price' => 1100,
        'category' => 'informatique',
        'description' => 'Description du produit 6',
        'createdAt'=> '20-03-2012',
    ],
    [
        'name' => 'Smartphone',
        'price' => 800,
        'category' => 'informatique',
        'description' => 'Description du produit 7',
        'createdAt'=> '20-01-2024',
    ],
    [
        'name' => 'Appareil photo',
        'price' => 700,
        'category' => 'informatique',
        'description' => 'Description du produit 8',
        'createdAt'=> '20-09-2024',
    ],
    [
         'name' => 'Vélo',
        'price' => 1100,
        'category' => 'sport',
        'description' => 'Description du produit 9',
        'createdAt'=> '20-03-2024',
    ],
    [
        'name' => 'Tapis de course',
        'price' => 1000,
        'category' => 'sport',
        'description' => 'Description du produit 10',
        'createdAt'=> '20-03-2024',
    ],
    [
        'name' => 'Haltères',
        'price' => 400,
        'category' => 'sport',
        'description' => 'Description du produit 11',
        'createdAt'=> '20-03-2024',
    ],
    [
        'name' => 'Ballon de foot',
        'price' => 200,
        'category' => 'sport',
        'description' => 'Description du produit 12',
        'createdAt'=> '20-03-2024',
    ]
];

$cats=[];
$productMinPrice=$products[0]['price'];
$productMaxPrice=$products[0]['price'];

foreach($products as $product){
   if (!in_array($product['category'],$cats)) {
$cats[]=$product['category'];
};
    if ($product['price']<$productMinPrice) {
        $productMinPrice=$product['price'];
    };
    if ($product['price']>$productMaxPrice) {
        $productMaxPrice=$product['price'];
    };
}


if (!empty($_GET)) {
if  (!empty($_GET['category']))  { 
    $products = array_filter($products, function($product) {
        return $product['category'] === $_GET['category'];
    }
);
};
if  (!empty($_GET['pricemin']))  { 
    $products = array_filter($products, function($product) {
        return $product['price'] >= (float)$_GET['pricemin'];
    }
);
};
if  (!empty($_GET['pricemax']))  { 
    $products = array_filter($products, function($product) {
        return $product['price'] <= (float)$_GET['pricemax'];
    }
);
};
    // la fonction PHP usort  permet de trier un tableau
	// je trie en fonction du prix
	// usort ne retourne pas de nouveau tableau, mais modifie le tableau
	// original ($products)

if  (($_GET['sort']==='price'))  { 
    usort($products, function ($a, $b) {
		return $a['price'] <=> $b['price'];
	});
}
if  (($_GET['sort']==='name'))  { 
    usort($products, function ($a, $b) {
		return $a['name'] <=> $b['name'];
	});
}

if  (($_GET['sort']==='date'))  { 
    usort($products, function ($a, $b) {
        return (new DateTime($a['createdAt'])) <=> (new DateTime($b['createdAt']));
	});
}
}

 function romandate($year) {
    $n = $year;
    $rom='';
while ($n >= 1000){
	$n=$n-1000; $rom=$rom.'M';
}
if($n >= 900){
	$n=$n-900; $rom=$rom.'CM';
}
if($n >= 500){
	$n=$n-500; $rom=$rom.'D';
}
if($n >= 400){
	$n=$n-400; $rom=$rom.'CD';
}
while($n >= 100){
	$n=$n-100; $rom=$rom.'C';
}
if($n >= 90){
	$n=$n-90; $rom=$rom.'XC';
}
if($n >= 50){
	$n=$n-50; $rom=$rom.'L';
}
if($n >= 40){
	$n=$n-40; $rom=$rom.'XL';
}
while($n >= 10){
	$n=$n-10; $rom=$rom.'X';
}
if($n >= 9){
	$n=$n-9; $rom=$rom.'IX';
}
if($n >= 5){
	$n=$n-5; $rom=$rom.'V';
}
if($n >= 4){
	$n=$n-4; $rom=$rom.'IV';
}
while($n >= 1){
	$n=$n-1; $rom=$rom.'I';
}
return $rom;
 }

?>