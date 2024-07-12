        <!-- http://localhost/piscine-php-contact/views/admin-createarticle.php   -->

<!--  appel de config et index.controleur  -->

<?php require_once('../config/config.php');?>
<?php require_once('../controller/admin-createarticle-Controller.php'); ?> 


<?php require_once('../partials/header.php');?>

<?php session_start();
if (!isset($_SESSION['idlogged'])) { 
header ("location:http://localhost/piscine-php-contact/views/connexion.php");
    }?>

<!-- <?php var_dump($_SERVER);?> -->
<!-- <?php var_dump($_REQUEST);?> -->


        <!-- formulaire de saisie des articles -->
<main>
    
<section class="prod">
    <H1>SAISIR UN ARTICLE</H1>
    <form  method="post">
        <div>
            <label > Titre
            <input type="text" name="title">
            </label>
        </div>
        <div>
            <label > Contenu
            <input type="text" name="content">
            </label>
        </div>
        <div>
            <label > Image
            <input type="text" name="image">
            </label>
        </div>
        <div>
        <input type="submit" value="Créer">
        </div>
    </form>

    <h2><a href="http://localhost/piscine-php-contact/views/admin-deletearticle.php">réinitialisation fichier</a></h2>
    
<?php
if (isRequestPost()) { 
     if (empty(getFormErrors())) {
        $retour=file_get_contents("../fichier.csv");
        echo "<p> l article a bien été enregistré </p>";
        echo "<p>".$retour."</p>";
        } else {
            foreach(getFormErrors() as $error) {
                echo "<p>".$error."</p>";
            }
    }
}    
?>
    </section>
     <?php require_once('../partials/barrelaterale.php');?>
</main>
   
<?php require_once('../partials/footer.php');?>