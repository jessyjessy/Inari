<?php
$mg = new ArticleManager($db);
$liste_pays = $mg->getListePays();
$nbr = count($liste_pays);
$client = $mg->getCompte($_SESSION['login']);
  
?>


<form id="form_creation" action="<?php print $_SERVER['PHP_SELF']; ?>" method="get">


    <table>
        <tr>
            <td>Login : </td>
            <td><input type="text" name="login" id="login" value=<?php echo $client[0]->login; ?> /></td>
        </tr>
        <tr>
            <td>Mot de passe : </td>
            <td><input type="text" name="mot_de_passe" id="mot_de_passe" value=<?php echo $client[0]->mot_de_passe; ?>  /></td>
        </tr>
        <tr>
            <td>Nom : </td>
            <td><input type="text" name="nom" id="nom" value=<?php echo $client[0]->nom_client; ?> /></td>
        </tr>
        <tr>
            <td>Prenom : </td>
            <td><input type="text" name="prenom" id="prenom" value=<?php echo $client[0]->prenom_client; ?> /></td>
        </tr>


        <tr>
            <td>Sexe : </td>
            <td>M <input type="radio" name="sexe" id="M" value="M" />
                &nbsp;&nbsp;&nbsp;F <input type="radio" name="sexe" id="F" value="F" />
            </td>
        </tr>



        <tr>
            <td>Age : </td>
            <td><input type="text" name="age" id="age" value=<?php echo $client[0]->age;?> /></td>
        </tr>


        <tr>
            <td>Pays : </td>
            <td>
                <select name="choix_pays" id="choix_pays" > 
                    <option>Choisissez un pays</option>
                    <?php
                    for ($i = 0; $i < $nbr; $i++) {
                        ?>
                        <option value="<?php print $liste_pays[$i]->id_pays;?>">
                            <?php print $liste_pays[$i]->nom_pays; ?>
                        </option>
                        <?php
                    }
                    ?>
                </select>
            </td>
        </tr>


        <tr>
            <td>Rue : </td>
            <td><input type="text" name="rue" id="rue" value=<?php echo $client[0]->rue;?> /></td>
        </tr>

        <tr>
            <td>Numero : </td>
            <td><input type="text" name="numero" id="numero" value=<?php echo $client[0]->numero;?> /></td>
        </tr>

        <tr>
            <td>CP : </td>
            <td><input type="text" name="cp" id="cp" value=<?php echo $client[0]->cp;?> /></td>
        </tr>

        <tr>
            <td>Localité : </td>
            <td><input type="text" name="localite" id="localite" value=<?php echo $client[0]->localite;?> /></td>
        </tr>

        <tr>
            <td>Mail : </td>
            <td><input type="text" name="mail" id="mail" value=<?php echo $client[0]->mail;?> /></td>
        </tr>


        <tr>
            <td colspan="2">
                <input type="submit" name="submit_maj" id="submit_maj" value="Mettre à jour" />
                
            </td>
        </tr>
    </table>

<a href="index.php?page=accueil">  <input type="submit" name="submit_delete" id="submit_delete" value="Cliquer ici pour supprimer définitivement votre compte" /><a/>

</form>



<?php
if (isset($_GET['submit_maj'])) {
  
   $mg->MAJclient($_GET['choix_pays'],$_GET['login'],$_GET['mot_de_passe'],$_GET['nom'],$_GET['prenom'],$_GET['rue'],$_GET['numero'],$_GET['cp'],$_GET['localite'],$_GET['mail'],$_GET['sexe'],$_GET['age'],$_SESSION['id_client']);
    
   
}

if (isset($_GET['submit_delete'])) {
 $mg->supprimerClient($_SESSION['id_client']);   
 $_SESSION['id_client']=null;
   
 
  
   
}

?>



