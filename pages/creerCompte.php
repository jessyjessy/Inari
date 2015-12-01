<?php
$mg = new ArticleManager($db);
$liste_pays = $mg->getListePays();
$nbr = count($liste_pays);
?>

<form id="form_creation" action="<?php print $_SERVER['PHP_SELF']; ?>" method="get">


    <table>
        <tr>
            <td>Login : </td>
            <td><input type="text" name="login" id="login" /></td>
        </tr>
        <tr>
            <td>Mot de passe : </td>
            <td><input type="text" name="mot_de_passe" id="mot_de_passe" /></td>
        </tr>
        <tr>
            <td>Nom : </td>
            <td><input type="text" name="nom" id="nom" /></td>
        </tr>
        <tr>
            <td>Prenom : </td>
            <td><input type="text" name="prenom" id="prenom" /></td>
        </tr>


        <tr>
            <td>Sexe : </td>
            <td>M <input type="radio" name="sexe" id="M" value="M" />
                &nbsp;&nbsp;&nbsp;F <input type="radio" name="sexe" id="F" value="F" />
            </td>
        </tr>



        <tr>
            <td>Age : </td>
            <td><input type="text" name="age" id="age" /></td>
        </tr>


        <tr>
            <td>Pays : </td>
            <td>
                <select name="choix_pays" id="choix_pays"> 
                    <option value="">Faites votre choix</option>
                    <?php
                    for ($i = 0; $i < $nbr; $i++) {
                        ?>
                        <option value="<?php print $liste_pays[$i]->id_pays; ?>">
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
            <td><input type="text" name="rue" id="rue" /></td>
        </tr>

        <tr>
            <td>Numero : </td>
            <td><input type="text" name="numero" id="numero" /></td>
        </tr>

        <tr>
            <td>CP : </td>
            <td><input type="text" name="cp" id="cp" /></td>
        </tr>

        <tr>
            <td>Localité : </td>
            <td><input type="text" name="localite" id="localite" /></td>
        </tr>

        <tr>
            <td>Mail : </td>
            <td><input type="text" name="mail" id="mail" /></td>
        </tr>


        <tr>
            <td colspan="2">
                <input type="submit" name="submit_inscription" id="submit_inscription" value="Inscription" />
                &nbsp;&nbsp;&nbsp;
                <input type="reset" id="reset" value="R&eacute;initialiser le formulaire" />
            </td>
        </tr>
    </table>



</form>

<?php
if (isset($_GET['submit_inscription'])) {
  
    $mg->ajouterClient($_GET['choix_pays'],$_GET['login'],$_GET['mot_de_passe'],$_GET['nom'],$_GET['prenom'],$_GET['rue'],$_GET['numero'],$_GET['cp'],$_GET['localite'],$_GET['mail'],$_GET['sexe'],$_GET['age']);
   
}
?>


