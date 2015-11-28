<?php
$mg = new ArticleManager($db);

?>

<h2>Bienvenue sur Inari</h2>

<img src="./admin/images/image_inari.jpg" alt="Pets-Sitting" />


<form action="<?php print $_SERVER['PHP_SELF']; ?>" method="get">
    <table>
        <tr>
            <td>Votre login : </td>
            <td><input type="text" name="login" id="login" /></td>
        </tr>
        <tr>
            <td>Votre mot de passe : </td>
            <td><input type="text" name="mot_de_passe" id="mot_de_passe" /></td>
        </tr>
        <tr>
            <td>
                <input type="submit" name="valider" id="valider" value="valider" />
            </td>
        </tr>
    </table>
    
    
 
    
    
    
</form>




   <?php
if (isset($_GET['valider'])) {
    print "Logiiiiiiiiiiiiiin";
  


    $client = $mg->getCompte($_GET['login']);
    $nbr = count($client);
    
    
    

    if ($client[0]->login == NULL) {

        print "Login incorect";
    }
    else{
        print "Login OK";
    
            if ($client[0]->mot_de_passe == $_GET["mot_de_passe"]) {

            print "mot de passe ok";
               print "Bonjour ".$client[0]->prenom_client;
            $_SESSION['login'] = $client[0]->login;
          
            
            ?>
         
            <?php
            
            
            
            }
            else
                print "mot depasse incorrect";
    }
    ?>



    <?php
//accueil.php est contenu dans l'index, qui contient une
//instance de db
    ?>

    


    <?php
}
?>






