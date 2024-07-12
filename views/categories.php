        <!-- http://localhost/piscine-php-contact/views/categories.php   -->

<!--  appel de config et index.controleur  -->

<?php require_once('../config/config.php');?>
<?php require_once('../controller/categorie-Controller.php');?>

<?php require_once('../partials/header.php');?>

<!-- <?php var_dump($_SERVER);?> -->
<!-- <?php var_dump($_REQUEST);?> -->

<main>
        <!-- afficher les catégories -->

    <?php foreach ($categories as $categorie) { 
                echo "<div>";
                    echo "<p>".($categorie['name'])."</p>";
                echo "</div>";
            } ?>


    <?php require_once('../partials/barrelaterale.php');?>

</main>

<?php require_once('../partials/footer.php');?>