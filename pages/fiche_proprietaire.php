<?php
$mg = new ArticleManager($db);
$total_vente = $mg->getTotalVente();
$top_client = $mg->getTopClient();
$nbr = count($top_client);
$produits_les_mieux_vendus = $mg->getProduitsLesMieuxVendus();
$nbr2 = count($produits_les_mieux_vendus);
$benefices = $mg->getBenefices();
$nbr3 = count($benefices);
?>



    <h1>Voici diverses informations sur vos ventes</h1>


    <h2>Montant total de vos ventes</h2>

    <?php print $total_vente[0]->sum; ?>


    <h2>Vos meilleurs clients</h2>
    <?php
    if ($nbr > 5)
        $nbr = 5;
    ?>

    <table>
        <?php
        for ($i = 0; $i < $nbr; $i++) {
            ?>
            <tr>
                <td> <?php print ($i + 1).")" ?></td>
                <td> <?php print $top_client[$i]->login; ?></td>
                <td> <?php print "---------->" ?></td>
                <td> <?php print $top_client[$i]->total_achat; ?></td>

            </tr>
            <?php
        }
        ?>
    </table>
    
    
    <h2>Vos produits les mieux vendus</h2>
    <?php
    if ($nbr2 > 10)
        $nbr2 = 10;
    ?>

    <table>
        <?php
        for ($i = 0; $i < $nbr2; $i++) {
            ?>
            <tr>
                <td> <?php print ($i + 1).")" ?></td>
                <td> <?php print $produits_les_mieux_vendus[$i]->nom_article; ?></td>
                <td> <?php print "---------->" ?></td>
                <td> <?php print $produits_les_mieux_vendus[$i]->sum." ventes"; ?></td>

            </tr>
            <?php
        }
        ?>
    </table>
    
    <h2>Top 10 des produits qui ont générés le plus de bénéfices</h2>
    <?php
    if ($nbr3 > 10)
        $nbr3 = 10;
    ?>

    <table>
        <?php
        for ($i = 0; $i < $nbr3; $i++) {
            ?>
            <tr>
                <td> <?php print ($i + 1).")" ?></td>
                <td> <?php print $benefices[$i]->nom_article; ?></td>
                <td> <?php print "---------->" ?></td>
                <td> <?php print $benefices[$i]->benefice." de bénéfice"; ?></td>

            </tr>
            <?php
        }
        ?>
    </table>
    
    
    
    
