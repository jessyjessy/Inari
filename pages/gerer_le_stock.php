 <!-- Peut-être mettre à jour chemin d'accès par après -->
        <script type="text/javascript" src="./admin/lib/js/jquery/jquery-1.11.3.min.js"></script>
        <script type="text/javascript" src="./admin/lib/js/jquery/jquery-1.11.js"></script>
        <script type="text/javascript" src="./admin/lib/js/jquery/jquery-ui.js"></script>
        <script type="text/javascript" src="./admin/lib/js/fonctionJquery.js"></script>
        <script type="text/javascript" src="./admin/lib/js/jquery/external/jquery/jquery.js"></script>
        <script type="text/javascript" src="./admin/lib/js/jquery/jquery-ui.min.js"></script>





<?php
$mg = new ArticleManager($db);
$liste_fournisseur = $mg->getListeFournisseur();
$liste_sous_type = $mg->getListeSousType();
$liste_article = $mg->getListeArticles2();
$nbr = count($liste_sous_type);
$nbr2 = count($liste_fournisseur);
$nbr3 = count($liste_article);

?>

<form id="form_ajout_article" action="<?php print $_SERVER['PHP_SELF']; ?>" method="get">
    <h1>Ajouter un article</h1>

    <table>
        <tr>
            <td>Nom de l'article : </td>
            <td><input type="text" name="nom" id="nom" /></td>
        </tr>
        <tr>
            <td>Descritpion : </td>
            <td><input type="text" name="description" id="description" /></td>
        </tr>
        <tr>
            <td>Quantite en stock : </td>
            <td><input type="text" name="quantite" id="quantite" /></td>
        </tr>
        <tr>
            <td>Prix d'achat : </td>
            <td><input type="text" name="prixA" id="prixA" /></td>
        </tr>
        <tr>
            
            <td>Prix de vente : </td>
            <td><input type="text" name="prixV" id="prixV" /></td>
        </tr>

<tr>
            <td>Type d'article: </td>
            <td>
                <select name="choix_type" id="choix_type"> 
                    <option value="">Faites votre choix</option>
                    <?php
                    for ($i = 0; $i < $nbr; $i++) {
                        ?>
                        <option value="<?php print $liste_sous_type[$i]->id_type_article; ?>">
                            <?php print $liste_sous_type[$i]->description; ?>
                        </option>
                        <?php
                    }
                    ?>
                </select>
            </td>
        </tr>
        

        <tr>
            <td>Fournisseur : </td>
            <td>
                <select name="choix_fournisseur" id="choix_fournisseur"> 
                    <option value="">Faites votre choix</option>
                    <?php
                    for ($i = 0; $i < $nbr2; $i++) {
                        ?>
                        <option value="<?php print $liste_fournisseur[$i]->id_fournisseur; ?>">
                            <?php print $liste_fournisseur[$i]->nom_fournisseur; ?>
                        </option>
                        <?php
                    }
                    ?>
                </select>
            </td>
        </tr>




        <tr>
            <td colspan="2">
                <input type="submit" name="submit_ajout_article" id="submit_inscription" value="Ajouter l'article" />
                &nbsp;&nbsp;&nbsp;
                <input type="reset" id="reset" value="R&eacute;initialiser le formulaire" />
            </td>
        </tr>
    </table>



</form>












<form id="form_maj_article" action="<?php print $_SERVER['PHP_SELF']; ?>" method="get">
    <h1>Mettre à jour un article</h1>

    <table>
        <tr>
            <td>Nom de l'article:</td>
            <td>
            <select name="choix_article" id="choix_article"> 
                    <option value="">Faites votre choix</option>
                    <?php
                    for ($i = 0; $i < $nbr3; $i++) {
                        ?>
                        <option value="<?php print $liste_article[$i]->id_article; ?>">
                            <?php print $liste_article[$i]->nom_article; ?>
                        </option>
                        <?php
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Nouveau Nom : </td>
            <td><input type="text" name="nom2" id="nom2" /></td>
        </tr>
        <tr>
            <td>Descritpion : </td>
            <td><input type="text" name="description2" id="description2" /></td>
        </tr>
        <tr>
            <td>Quantite en stock : </td>
            <td><input type="text" name="quantite2" id="quantite2" /></td>
        </tr>
        <tr>
            <td>Prix d'achat : </td>
            <td><input type="text" name="prixA2" id="prixA2" /></td>
        </tr>
        <tr>
            
            <td>Prix de vente : </td>
            <td><input type="text" name="prixV2" id="prixV2" /></td>
        </tr>

<tr>
            <td>Type d'article: </td>
            <td>
                <select name="choix_type" id="choix_type"> 
                    <option value="">Faites votre choix</option>
                    <?php
                    for ($i = 0; $i < $nbr; $i++) {
                        ?>
                        <option value="<?php print $liste_sous_type[$i]->id_type_article; ?>">
                            <?php print $liste_sous_type[$i]->description; ?>
                        </option>
                        <?php
                    }
                    ?>
                </select>
            </td>
        </tr>
        

        <tr>
            <td>Fournisseur : </td>
            <td>
                <select name="choix_fournisseur" id="choix_fournisseur"> 
                    <option value="">Faites votre choix</option>
                    <?php
                    for ($i = 0; $i < $nbr2; $i++) {
                        ?>
                        <option value="<?php print $liste_fournisseur[$i]->id_fournisseur; ?>">
                            <?php print $liste_fournisseur[$i]->nom_fournisseur; ?>
                        </option>
                        <?php
                    }
                    ?>
                </select>
            </td>
        </tr>




        <tr>
            <td colspan="2">
                <input type="submit" name="submit_ajout_article" id="submit_inscription" value="Mettre à jour l'article" />
                &nbsp;&nbsp;&nbsp;
                <input type="reset" id="reset" value="R&eacute;initialiser le formulaire" />
            </td>
        </tr>
    </table>



</form>













<form id="form_supprimer_article" action="<?php print $_SERVER['PHP_SELF']; ?>" method="get">
    <h1>Supprimer un article</h1>

    <table>
        <tr>
            <td>Nom de l'article : </td>
            <td><input type="text" name="nom3" id="nom3" /></td>
        </tr>
        <tr>
            <td>Descritpion : </td>
            <td><input type="text" name="description3" id="description3" /></td>
        </tr>
        <tr>
            <td>Quantite en stock : </td>
            <td><input type="text" name="quantite3" id="quantite3" /></td>
        </tr>
        <tr>
            <td>Prix d'achat : </td>
            <td><input type="text" name="prixA3" id="prixA3" /></td>
        </tr>
        <tr>
            
            <td>Prix de vente : </td>
            <td><input type="text" name="prixV3" id="prixV3" /></td>
        </tr>

<tr>
            <td>Type d'article: </td>
            <td>
                <select name="choix_type" id="choix_type"> 
                    <option value="">Faites votre choix</option>
                    <?php
                    for ($i = 0; $i < $nbr; $i++) {
                        ?>
                        <option value="<?php print $liste_sous_type[$i]->id_type_article; ?>">
                            <?php print $liste_sous_type[$i]->description; ?>
                        </option>
                        <?php
                    }
                    ?>
                </select>
            </td>
        </tr>
        

        <tr>
            <td>Fournisseur : </td>
            <td>
                <select name="choix_fournisseur" id="choix_fournisseur"> 
                    <option value="">Faites votre choix</option>
                    <?php
                    for ($i = 0; $i < $nbr2; $i++) {
                        ?>
                        <option value="<?php print $liste_fournisseur[$i]->id_fournisseur; ?>">
                            <?php print $liste_fournisseur[$i]->nom_fournisseur; ?>
                        </option>
                        <?php
                    }
                    ?>
                </select>
            </td>
        </tr>




        <tr>
            <td colspan="2">
                <input type="submit" name="submit_ajout_article" id="submit_inscription" value="Supprimer l'article" />
                &nbsp;&nbsp;&nbsp;
                <input type="reset" id="reset" value="R&eacute;initialiser le formulaire" />
            </td>
        </tr>
    </table>



</form>












<?php
if (isset($_GET['submit_ajout_article'])) {
  
    //$mg->ajouterClient($_GET['choix_pays'],$_GET['login'],$_GET['mot_de_passe'],$_GET['nom'],$_GET['prenom'],$_GET['rue'],$_GET['numero'],$_GET['cp'],$_GET['localite'],$_GET['mail'],$_GET['sexe'],$_GET['age']);
   
}



if (isset($_GET['submit_maj_article'])) {
  
    //$mg->ajouterClient($_GET['choix_pays'],$_GET['login'],$_GET['mot_de_passe'],$_GET['nom'],$_GET['prenom'],$_GET['rue'],$_GET['numero'],$_GET['cp'],$_GET['localite'],$_GET['mail'],$_GET['sexe'],$_GET['age']);
   
}


if (isset($_GET['submit_supprimer_article'])) {
  
    //$mg->ajouterClient($_GET['choix_pays'],$_GET['login'],$_GET['mot_de_passe'],$_GET['nom'],$_GET['prenom'],$_GET['rue'],$_GET['numero'],$_GET['cp'],$_GET['localite'],$_GET['mail'],$_GET['sexe'],$_GET['age']);
   
}

$lala="hoho";
?>








<script>
    
    var choix_article = document.getElementById('choix_article');
    
    choix_article.addEventListener('change',function(){
        
        
      //  alert(choix_article.options[choix_article.selectedIndex].innerHTML);
        document.getElementById("nom2").value='<?php echo $liste_article[9]->nom_article;?>';
        
    }, true);
    
    
    
</script>












