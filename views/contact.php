<!-- http://localhost/piscine-php-contact/views/contact.php   -->

 <!--  appel de config et index.controleur  -->

<?php require_once('../config/config.php');?>
<?php require_once('../controller/contact-Controller.php');?>

<?php require_once('../partials/header.php');?>

 <!-- <?php var_dump($_SERVER);?>  -->
<!-- <?php var_dump($_REQUEST);?> -->

<main>
            <!-- va envoyer les donner en post et pas en get -->
    <form method="post">
        <label> formulaire de saisie 
            <div>
            <input type="text" placeholder="Entrez votre nom" name="lastname">
            <input type="mail" placeholder="Entrez votre mail" name="mail">
            <input type="test" placeholder="Entrez votre message" name="message">
            <input type="submit" value="Envoyer">
            <?php if(isset($_REQUEST['lastname'])) { ?>
                <?php if(checkIfFormIsValid($_REQUEST)) { ?>
                    <p>Monsieur <?php echo $_REQUEST["lastname"]; ?> , le formulaire est bien renseigné</p>
                <?php }
                else { ?> 
                <p> Il manque des données</p>
                <? } ?> 
            <? } ?>     
            </div>
        </label>
    </form>
    <?php require_once('../partials/barrelaterale.php');?>

</main>

<?php require_once('../partials/footer.php');?>