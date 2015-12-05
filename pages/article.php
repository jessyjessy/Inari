<h1>D&eacute;couvrez nos articles en vente</h1>
<?php
$mg = new ArticleManager($db);
$liste_types = $mg->getListeTypes();
$liste_articles = $mg->getListeArticles();
//nombre d'élt du tableau de resultset
$nbr = count($liste_types);
$nbr2 = count($liste_articles);
?>



<!--                           TOUS LES ARTICLES                          --> 


<form action="<?php print $_SERVER['PHP_SELF']; ?>" method="get">


    <h2>Tous nos articles</h2>


    <?php
    /*
      permet d'éviter une erreur car à la base il n'y a pas de valeur pour par
      exemple $liste_articles[-1]->description_type_article donc j'en attribu
      par défaut.
      Un message d'erreur s'affiche quand même, je le dissimule grâce aux '@',
      car ces erreurs en questions n'interfèrent pas dans le bon déroulement
      du site.
     */


    @$liste_articles[-1]->sous_type = "";
    @$liste_articles[-1]->description_type_article = " ";


    for ($i = 0; $i < $nbr2; $i++) {
        ?>




    <?php
    if ($liste_articles[$i]->description_type_article <> $liste_articles[$i - 1]->description_type_article) {
        ?>


            <h3><?php print $liste_articles[$i]->description_type_article ?></h3>
 

        <?php } ?>




        <?php
        if ($liste_articles[$i]->sous_type <> $liste_articles[$i - 1]->sous_type) {
            ?>

            <h4><?php print $liste_articles[$i]->sous_type ?></h4>

        <?php } ?>




        <table border="1">


            <tr> 
                <td colspan="3"><?php print $liste_articles[$i]->nom_article; ?> </td>

            </tr>

            <tr>
                <td rowspan="4">image à venir</td>
                <td colspan="2"><?php print $liste_articles[$i]->description; ?></td>

            </tr>

            <tr>

                <td><?php print $liste_articles[$i]->quantite_en_stock; ?></td>
                <td>
    <?php
    $name = "quantite_voulue" . $i;
    ?>
                    <select name="<?php print $name; ?>" id="quantite_voulue"> 

    <?php
    $quantite_max = $liste_articles[$i]->quantite_en_stock;
    for ($i2 = 0; $i2 < $quantite_max; $i2++) {
        ?>
                            <option value="<?php print $i2 + 1; ?>"> 
                        <?php print $i2 + 1; ?>

                            </option>
                            <?php
                        }
                        ?>
                    </select>
                </td>

            </tr>

            <tr>

                <td colspan="2"><?php print $liste_articles[$i]->prix_vente; ?></td>

            </tr>

            <tr>

                <td colspan="2">


    <?php
    $type = "submit";
    $nom = "ajouter" . $i;
    $value = "ajouter" . $i;
    $id = "ajouter" . $i;

    print "<input type={$type} name={$nom} value={$value} id={$id}/>";
    ?>


                </td>

            </tr>




    <?php
    if (isset($_GET['ajouter' . $i])) {




        $mg->insererDansPanier($liste_articles[$i]->id_article, $_SESSION['id_client'], $_GET['quantite_voulue' . $i], $liste_articles[$i]->prix_vente, $liste_articles[$i]->nom_article);
        $mg->Prix_total_panier();
//  id_article,id_client,quantite,prix_unitaire,nom)
    }
    ?>



            <br/>
        </table>


            <?php
        }
        ?>




</form>  