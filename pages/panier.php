<h2>Votre panier</h2>
<?php
$mg = new ArticleManager($db);
$contenu_panier = $mg->getContenuPanier($_SESSION['id_client']);
$nbr = count($contenu_panier);

?>


<form action="<?php print $_SERVER['PHP_SELF']; ?>" method="get">

    <?php
    for ($i = 0; $i < $nbr; $i++) {
 ?>



                    <?php print $contenu_panier[$i]->quantite; ?>
                    <br>
                    <?php print $contenu_panier[$i]->prix_unitaire; ?>
                    <br/>
                    <?php print $contenu_panier[$i]->nom; ?>
                    <br/>
                  
                    <br/>



<?php
    
}

?>

</form>

