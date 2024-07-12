
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
                    echo "<p>".($order['id'])."</p>";
					echo "<p>".($order['customer'])."</p>";
					echo "<p>".($order['amount'])."</p>";
					// affiche de la date sous un format <>
					$date = new DateTime($order['date']);
					echo "<p>" . $date->format('F d, Y') . "</p>";
					// parcours du tableau produits pour afficher chacune des lignes
					echo "<p> PRODUITS COMMANDES</p>";
					foreach ($order['products'] as $product) { 
						echo "<p>".$product."</p>";
					} 
                echo "</div>";
            } ?>

</main>
<?php require_once('../partials/footer.php');?>

