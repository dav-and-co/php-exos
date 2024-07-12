
    <!-- http://localhost/piscine-php-contact/views/commande.php   -->

<!--  appel de config et index.controleur  -->

<?php require_once('../config/config.php');?>
<?php require_once('../controller/commande-Controller.php'); ?> 


<?php require_once('../partials/header.php');?>
<main>

<!-- commentaires destinés à David, le beau -->


<!-- Pacours du tableau pour afficher chacune des lignes -->
<?php foreach ($orders as $order) { 
                echo "<div>";
                    echo "<h2>".($order['id'])." - ".($order['customer'])."</h2>";
					echo "<p> montant : ".($order['amount'])."</p>";
					// affiche de la date sous un format <>
					$date = new DateTime($order['date']);
					echo "<p> date : " . $date->format('F d, Y') . "</p>";
					// parcours du tableau produits pour afficher chacune des lignes
					echo "<h3> PRODUITS COMMANDES</h3>";
					foreach ($order['products'] as $product) { 
						echo "<p>".$product."</p>";
					} 
                echo "</div>";
            } ?>

</main>
<?php require_once('../partials/footer.php');?>

