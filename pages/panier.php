<h2>Votre panier</h2>
<?php
$mg = new ArticleManager($db);
$contenu_panier = $mg->getContenuPanier($_SESSION['id_client']);
$nbr = count($contenu_panier);
?>

<?php
/*
if (isset($_GET['recalculer'])) {


    for ($i = 0; $i < $nbr; $i++) {
        $nom2 = "checkbox" . $i;
        if (!isset($_GET[$nom2])) {

            $mg->supprimerDuPanier($contenu_panier[$i]->id_panier);
        }
    }
}
 
 */
?>



<form action="<?php print $_SERVER['PHP_SELF']; ?>" method="get">


<?php
$somme = 0;
for ($i = 0; $i < $nbr; $i++) {
    ?>

        <?php print $contenu_panier[$i]->nom; ?>
        <br/>
        <?php print $contenu_panier[$i]->quantite; ?>
        <br>
        <?php print $contenu_panier[$i]->prix_unitaire; ?>
        <br/>

        <?php
        $somme+=$contenu_panier[$i]->prix_unitaire;
        ?>




        <?php
        $type = "checkbox";
        $nom = "checkbox" . $i;
        $id = "checkbox" . $i;


        print "<input type={$type}  name={$nom} id={$id}/>";
        ?>
        <br/><br/>
        <?php
    }
    ?>


        <input type="button" name="recalculer" id="recalculer" value="RECALCULER" onclick="check();" />
          <?php print "prix total:   $somme  € "; ?> 
        <p id="sommeEssai"></p>
    <input type="submit" name="valider_achats" id="valider_achats" value="VALIDER" />


    <?php
    
    if (isset($_GET['valider_achats'])) {


        for ($i = 0; $i < $nbr; $i++) {
            $nom2 = "checkbox" . $i;
            if (isset($_GET[$nom2])) {

                $mg->conclureUneVente($contenu_panier[$i]->id_article, $_SESSION['id_client'], $contenu_panier[$i]->quantite, $contenu_panier[$i]->prix_unitaire);
                $mg->supprimerDuPanier($_SESSION['id_client']);
                $mg->Prix_total_vente();
                $mg->Actualiser_total_client();
                $mg->Actualiser_le_stock($contenu_panier[$i]->id_article, $contenu_panier[$i]->quantite);
                
                
                
            }
        }
    }
    ?>


  






</form>

  