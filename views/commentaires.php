        <!-- http://localhost/piscine-php-contact/views/commentaires.php   -->

<!--  appel de config et index.controleur  -->

<?php require_once('../config/config.php');?>
<?php require_once('../controller/commentaires-Controller.php');?>

<?php require_once('../partials/header.php');?>

<!-- <?php var_dump($_SERVER);?> -->
<!-- <?php var_dump($_REQUEST);?> -->

<main>
        <!-- afficher les catégories -->

    <?php foreach ($reviews as $commentaire) { 
                echo "<article>";
                    echo "<h2>".($commentaire['user'])."</h2>";
                    echo "<p>".($commentaire['message'])."</p>";
                    echo "<p>".($commentaire['rating'])."</p>";
                echo "</article>";
            } ?>


    <?php require_once('../partials/barrelaterale.php');?>

</main>

<?php require_once('../partials/footer.php');?>