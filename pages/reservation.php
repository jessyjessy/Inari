<h2 id="titre_page">Réservation - Premier contact</h2>
<?php
$mg = new Jouet_petManager($db);
$liste_jouets=$mg->getListeJouet();
$nbr = count($liste_jouets);


?>
<section id="reserver">
    <form id="form_reservation" action="<?php print $_SERVER['PHP_SELF'];?>" method="get">
        <fieldset id="pensionnaire">
        <legend class="txtRoseLogo txtGras">Renseignements</legend>
        <table>
            <tr>
                <td>Nom du maître : </td>
                <td><input type="text" name="nom_maitre" id="nom_maitre" /></td>
            </tr>
            <tr>
                <td>Email du maître : </td>
                <td><input type="email" name="email_maitre" id="email_maitre" /></td>
            </tr>
            <tr>
                <td>Le pensionnaire : </td>
                <td>Chien <input type="radio" name="type" id="typeChien" value="Chiens" />
                &nbsp;&nbsp;&nbsp;Chat <input type="radio" name="type" id="typeChat" value="Chats" />
                </td>
            </tr>
            <tr>
                <td>Quel est son nom ? </td>
                <td><input type="text" name="nom_animal" id="nom_animal" /></td>									
            </tr>				
            <tr>
                <td>Date d'arrivée prévue</td>
                <td><input type="date" name="date_debut" id="date_debut" />
            </tr>
            <tr>
                <td>Nombre de jours d'hébergement<br />(minimum 2 jours): </td>
                <td><select name="nombre_jours" id="nombre_jours">
                <?php  
                for($i=2;$i<21;$i++) {
                ?>
                <option value="<?php print $i;?>"><?php print $i; ?></option>
                <?php
                }
                ?></select>
                </td>
            </tr>
            <tr>
                <td>Choisissez le jouet offert &agrave; votre compagnon : </td>
                <td><select name="id_jouet_pet" id="id_jouet_pet">                
                <option value="">Choisissez</option>
                <?php
                for($i=0;$i<$nbr;$i++) {
                    ?>
                <option value="<?php print $liste_jouets[$i]->id_jouet_pet;?>">
                    <?php print $liste_jouets[$i]->nom_jouet.' ('.$liste_jouets[$i]->type_animal.')';;?>
                </option>
                    <?php
                }
                ?>
                </select>
                </td>
            </tr>
            <tr>
                <td>Cochez cette case en cas de régime <br />alimentaire particulier</td>
                <td><input type="checkbox" name="regime" id="regime" /></td>
            </tr>
            
            <tr>
                <td colspan="2">
                <input type="submit" name="submit_reserv" id="submit_reserv" value="Envoyer la demande" />
                &nbsp;&nbsp;&nbsp;
                <input type="reset" id="reset" value="R&eacute;initialiser le formulaire" />
                </td>
            </tr>
            
        </table>
        </fieldset>
    </form>
</section>

