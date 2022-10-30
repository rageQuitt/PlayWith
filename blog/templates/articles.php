<!-- MySql Feat. PHP -->

<!-- La classe qui manipule les données-->
<?php
 $art = new article();
 $art->nouvel_article('hello world2', 'comment ça va ?');
 
 $art = new article();
$articles = $art->lire();
print_r($articles);
class article {

    public $bdd;
    /*Crée un objet qui représente notre base de donnée dans la fonction*/
    public function __construct(){
        
    /*Connection à la base de données*/

        $this->bdd = new PDO('mysql:host=localhost;dbname=playwith;charset=utf8', 'root', '');
    }

    /*créer la méthode permettant de créer un nouvel article.
    Elle va prendre deux arguments, le titre et le contenu */
    public function nouvel_article($titre, $contenu) {
        
        if (empty($titre) or empty($contenu)) { # Si jamais il manque un argument, la fonction ne s'exécute pas
            echo "il manque un argument";
            return;
        }
  
        $this->bdd->exec("INSERT INTO articles(titre, contenu) VALUES('$titre', '$contenu')");
       
    }
    public function lire()
    {
        $articles = $this->bdd->query('SELECT * from articles'); #recuperation
        return $articles->fetchAll(\PDO::FETCH_ASSOC); #transformation en liste
    }
}
