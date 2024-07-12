        <!-- http://localhost/piscine-php-contact/views/products.php   -->

<!--  appel de config et index.controleur  -->

<?php require_once('../config/config.php');?>
<?php require_once('../controller/products-Controller.php'); ?> 


<?php require_once('../partials/header.php');?>
<main class="reinit">
<section class="prod">
        <div class="entete">
        <H1>effectuer des filtres</H1>
        <form class="filtres">
                <div class ="marge">
                <label >Catégorie : </label>
                        <select  name="category" id="">
                                <option value="" selected disabled>categorie</option>
                                <?php foreach($cats as $cat) {
                                echo "<option value=".$cat.">".$cat."</option>";
                                };   ?>  
                        </select>
                </div>
                <div>
                        <label > prix minimum
                        <input class="inputProd" min="<?php echo $productMinPrice; ?>"  type="number" name="pricemin">
                        </label>
                </div>
                <div>
                        <label > prix maximum
                        <input class="inputProd" max="<?php echo $productMaxPrice; ?>"type="number" name="pricemax">
                        </label>
                </div>
                <div class ="marge">
                        <label >Trier par : </label>
	                <select class ="selection" name="sort">
                        <option value="default">Par défaut</option>
                        <option value="date">date</option>
                        <option value="name">nom</option>
                        <option value="price">prix</option>
                </div>
                <div class ="marge">
                        <input class="inputProd1" type="submit" value="envoyer">
                </div>
                <div class ="marge">
                        <button><a href="http://localhost/piscine-php-contact/views/products.php">RAZ</a></button>

                </div>
        </div>
        </form>
        <div class="produits">
                <?php foreach ($products as $product) {?>
                       <article class="produit">
                       <?php    echo "<h2>".$product['name']."</h2>";
                                echo "<p>prix : ".$product['price']."</p>";
                                echo "<p>".$product['description']."</p>";
                                echo "<p>".$product['category']."</p>";
                                $createDate= new DateTime($product['createdAt']);
                                echo "<p> date de création : ".$createDate->format("l d F "). romandate($createDate->format("Y"))."</p>";
                                $createDate->modify('+1 month');
                                echo "<p> date à 1 mois : ".$createDate->format("l d F Y")."</p>";
                        echo "</article>";
                } ?>
        </div>
</section>
<?php require_once('../partials/barrelaterale.php');?>
</main>
   
<?php require_once('../partials/footer.php');?>