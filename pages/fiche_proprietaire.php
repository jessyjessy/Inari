<?php
$mg = new ArticleManager($db);
$total_vente = $mg->getTotalVente();
$top_client = $mg->getTopClient();
$nbr = count($top_client);

?>

<form id="form_vente" action="<?php print $_SERVER['PHP_SELF']; ?>" method="get">

    <h1>Voici diverses informations sur vos ventes</h1>
    
    
    <h2>Montant total de vos ventes</h2>
    
     <?php print $total_vente[0]->sum; ?>
    

    <h2>Vos meilleurs clients</h2>
    <?php
    
    if($nbr>5)
     $nbr=5;
    
    for ($i = 0; $i <$nbr; $i++) {
    
    print $top_client[$i]->login."-------->".$top_client[$i]->total_achat;
    
    }
?>

</form>