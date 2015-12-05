<?php
session_start();
?>
<!doctype html>
<?php
include ('./lib/php/Pliste_include.php');
$db = Connexion::getInstance($dsn,$user,$pass);

$scripts= array();
$i=0;
foreach(glob('./admin/lib/js/jquery/*.js') as $js)  {
   $scripts[$i]=$js;
   $i++; 
}
?>
<html>
    <head>
        <title>Bienvenue</title>
        <meta charset="UTF-8"/>
        <link rel="stylesheet" type="text/css" href="./admin/lib/css/style_pc.css" />
        <link rel="stylesheet" type="text/css" href="./admin/lib/css/mediaqueries.css" />
        <?php
        foreach($scripts as $js) {
            ?>
        <script type="text/javascript" href="<?php print $js;?>">
        </script>
            <?php
        }
        ?>
    </head>
<body>
    <section id="page">
        <header>
         
          <?php
          
          
         
          if($_SESSION['login']<>null)
           echo $_SESSION['login'];
          else
              print "veuillez vous connecter";
          
                    ?>
           
            <img src="./admin/images/banniere.jpg" alt="Pets-Sitting" />
        </header>
        <section id="colGauche">
            <nav>
                <?php
                if(file_exists('./lib/php/Pmenu.php')){
                    include ('./lib/php/Pmenu.php');
                }                
                ?>
            </nav>
        </section>
        <section id="contenu">
            <div id="main">
                <?php
  //quand on arrive sur le site 
  if(!isset($_SESSION['page'])) {
      $_SESSION['page']="accueil";
  }  //si on a cliqué sur un lien du menu
  if(isset($_GET['page'])) {
      $_SESSION['page']=$_GET['page'];
  }
  $_SESSION['page']=$_SESSION['page'];
  if(file_exists('./pages/'.$_SESSION['page'].'.php')){
      include ('./pages/'.$_SESSION['page'].'.php');
  }               
                ?>
            </div>
        </section>
        
    </section> 
    <footer>
        Pied de page en construction
    </footer>
</body>
    
</html>