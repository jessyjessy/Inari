<h2>D&eacute;couvrez nos articles en vente</h2>
<?php
$mg = new ArticleManager($db);
$liste_types = $mg->getListeTypes();
$liste_articles = $mg->getListeArticles();
//nombre d'élt du tableau de resultset
$nbr = count($liste_types);
$nbr2 = count($liste_articles);
?>


<form action="<?php print $_SERVER['PHP_SELF']; ?>" method="get">
 

</form>



<form action="<?php print $_SERVER['PHP_SELF']; ?>" method="get">
    <table>
        <tr>
            <td>
                <select name="choix" id="choix"> 
                    <option value="">Faites votre choix</option>
<?php
for ($i = 0; $i < $nbr; $i++) {
    ?>
                        <option value="<?php print $liste_types[$i]->id_type_article; ?>">
                        <?php print $liste_types[$i]->description_type_article; ?>
                        </option>
                        <?php
                    }
                    ?>
                </select>
            </td>
            <td>
                <input type="submit" name="envoi_choix" value="Go" id="envoi_choix"/>                
            </td>
        </tr>
    </table>

    <table>
            <tr>
                <td>Votre recherche : </td>
                <td><input type="text" name="mot_recherche" id="mot_recherche" /></td>
            </tr>
            <tr>
                <td>
                <input type="submit" name="rechercher" id="submit_reserv" value="Rechercher" />
                </td>
            </tr>
    </table>
    
<?php
if (isset($_GET['envoi_choix'])) {
    $liste_sous_types = $mg->getListeSousTypes($_GET['choix']);
    $nbr3 = count($liste_sous_types);
  
    ?>

        <table>
            <tr>
                <td>
                    <select name="choix2" id="choix"> 
                        <option value="">choisissez un sous type</option>
    <?php
    for ($i = 0; $i < $nbr3; $i++) {
        ?>
            <option value="<?php print $liste_sous_types[$i]->id_sous_type_article; ?>">
                <?php print $liste_sous_types[$i]->description; ?>
            </option>
                        <?php
                        }
                        ?>
                    </select>
                </td>
                <td>
                    <input type="submit" name="envoi_choix2" value="Go" id="envoi_choix"/>                
                </td>
            </tr>
        </table>
    </form>  


<?php
}
?>


<form action="<?php print $_SERVER['PHP_SELF']; ?>" method="get">
    <table>
        <tr>
            <td>

                <h2>Tous nos articles</h2>
                       <?php 
 
          if($_SESSION['login']<>null)
           echo $_SESSION['login'];
          
                    



?>
  
<?php
for ($i = 0; $i < $nbr2; $i++) {
?>



                    <?php print $liste_articles[$i]->nom_article; ?>
                    <br>
                    <?php print $liste_articles[$i]->description; ?>
                    <br/>
                    <?php print $liste_articles[$i]->quantite_en_stock; ?>
                    <br/>
                    <?php print $liste_articles[$i]->prix_vente; ?>
                    <br/>
                    <br/>

<?php
$type="submit";
$nom="ajouter".$i;
$value="ajouter".$i;
$id="ajouter".$i;
 

print "<input type={$type} name={$nom} value={$value} id={$id}/>";

    
?>


<?php

if (isset($_GET['ajouter'.$i])) {
    
 
    
 
    $mg->insererDansPanier($liste_articles[$i]->id_article,$_SESSION['id_client'],5,$liste_articles[$i]->prix_vente,$liste_articles[$i]->nom_article);
  //  id_article,id_client,quantite,prix_unitaire,nom)
    
}


?>















<?php
}
?>

            </td>

        </tr>
    </table>
</form>


<?php
if (isset($_GET['envoi_choix'])) {
    
    $liste_article_type = $mg->getListeTypesArticle($_GET['choix']);
    $nbr5 = count($liste_article_type);
  
    ?>
<h2>ARTICLES FILTRES PAR TYPE</h2>
       
    <?php
    for ($i = 0; $i < $nbr5; $i++) {
 ?>



                    <?php print $liste_article_type[$i]->nom_article; ?>
                    <br>
                    <?php print $liste_article_type[$i]->description; ?>
                    <br/>
                    <?php print $liste_article_type[$i]->quantite_en_stock; ?>
                    <br/>
                    <?php print $liste_article_type[$i]->prix_vente; ?>
                    <br/>
                    <br/>



<?php
    
}
?>
<?php
}
?>




<?php
if (isset($_GET['envoi_choix2'])) {
    
    $liste_article_sous_type = $mg->getListeSousTypesArticle($_GET['choix2']);
    $nbr4 = count($liste_article_sous_type);
  
    ?>
<h2>ARTICLES FILTRES PAR SOUS TYPE</h2>
       
    <?php
    for ($i = 0; $i < $nbr4; $i++) {
 ?>



                    <?php print $liste_article_sous_type[$i]->nom_article; ?>
                    <br>
                    <?php print $liste_article_sous_type[$i]->description; ?>
                    <br/>
                    <?php print $liste_article_sous_type[$i]->quantite_en_stock; ?>
                    <br/>
                    <?php print $liste_article_sous_type[$i]->prix_vente; ?>
                    <br/>
                    <br/>



<?php
    
}
?>
<?php
}
?>


<?php
if (isset($_GET['rechercher'])) {
    
    $liste_recherche = $mg->getListeRecherche($_GET['mot_recherche']);
    $nbr6 = count($liste_recherche);
  
    ?>
<h2>RESULTAT DE VOTRE RECHERCHE</h2>
       
    <?php
    for ($i = 0; $i < $nbr6; $i++) {
 ?>



                    <?php print $liste_recherche[$i]->nom_article; ?>
                    <br>
                    <?php print $liste_recherche[$i]->description; ?>
                    <br/>
                    <?php print $liste_recherche[$i]->quantite_en_stock; ?>
                    <br/>
                    <?php print $liste_recherche[$i]->prix_vente; ?>
                    <br/>
                    <br/>



<?php
    
}
?>
<?php
}
?>

                    
                    