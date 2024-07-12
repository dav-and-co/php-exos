<!-- http://localhost/piscine-php-contact/views/connexion.php -->

<!-- appel de config et index.controleur  -->
<?php require_once('../config/config.php');?>
<?php require_once('../controller/connexion-Controller.php');?>
<head>
    <html lang="fr">    
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../assets/connexionstyle.css">
</head>

<main>
    <div class="box">
        <div>
            <img src="../assets/img/images (1).png" alt="">
        </div>
        <section>
            <H1>Connexion</H1>
            <form  method="post">
                <div class="admininput">
                    <label > Identifiant
                    <input type="text" name="identifiant" required>
                    </label>
                </div>
                <div class="admininput">
                    <label > Mot de passe
                    <input type="text" name="MDP"required>
                    </label>
                </div>
                <div class="button">
                <input class="submit" type="submit" value="Connexion">
                </div>
            </form>
        </section>
    </div>

    <div class="result">
        <?php if ($_SERVER["REQUEST_METHOD"]==="POST") {
            $user=(idIfAdmin ($_POST['identifiant'],$_POST['MDP'],$admins));
            if ($user==='-1') {
                echo "<p> Identifiant et/ou mot de passe invalide ! </p>";
            } else {
                if ($user==='-2') {
                    echo "<p> Merci de contacter votre administrateur.</p>";
                } else {
                getUser($user);
                redirectToAdmin();
        }}} ?>
    </div>
</main>







