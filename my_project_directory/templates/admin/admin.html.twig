<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<?php
session_start();
if (!isset($_SESSION['connecte']) or $_SESSION['connecte'] == false) { # on vérifie que l'utilisateur ne soit pas connecté
?>
    <p>Vous n'êtes pas connecté, veuillez taper le mot de passe</p>
    <form action="admin.php" method="post">
    <input type='password' name='password'/>
    <input type="submit"/>
    </form>
<?php
    if (isset($_POST['password'])) { #si la variable mot de passe existe
        if ($_POST['password'] == '123456') {
            $_SESSION['connecte'] = true;
        }
        else {
            $_SESSION['connecte'] = false;
            echo "mauvais mot de passe";
        }
    }
    if (!isset($_SESSION['connecte']) or $_SESSION['connecte'] == false) { # on vérifie que l'utilisateur ne soit pas connecté
        ?>
            <p>Vous n'êtes pas connecté, veuillez taper le mot de passe</p>
            <form action="admin.php" method="post">
            <input type='password' name='password'/>
            <input type="submit"/>
            </form>
        <?php
         
        }
        
        else { # Dans cette partie, on écrit le code que l'utilisateur administrateur verras
            ?>
         
            <p>Bienvenue, vous êtes connecté</p>
            <p>Vous pouvez créer un nouvel article en remplissant le formulaire ci-dessous</p>
         
            <?php
            require 'articles.php';
            if (isset($_POST['titre']) and isset($_POST['contenu'])) {
                $art = new article();
                $art->nouvel_article($_POST['titre'], $_POST['contenu']);
                echo "l'article as bien été ajouté";
            }
            ?>
            <form method="post" action="admin.php">
                <input type="text" placeholder="titre" name="titre" />
                <textarea placeholder="contenu" name="contenu"></textarea>
                <input type="submit" />
            </form>
         
         
         
         
            <?php
        }
}
?>
</body>
</html>