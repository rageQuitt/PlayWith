<?php require '../vendor/autoload.php';

require '..\blog\layout.phtml';
$uri = $_SERVER['REQUEST_URI'];
$router = new AltoRouter();

/*Abrévation pour cibler templates*/
define('VIEW_PATH', dirname(__DIR__).'/templates');

$router-> map('GET','/','homeView');
/*Routes des articles*/
$router-> map('GET','/','articles');
/*route catégories*/
$router ->map('GET','/blog',function(){
                require VIEW_PATH.'/templates/post/index.php';
});

$router ->map('GET','/blog/category',function(){
        require VIEW_PATH.'/templates/category/show.php';
});
/*Routes du layout*/
$router-> map('GET','/','layout');
$router-> map('GET','/nous-contacter','contact');
$router-> map('GET','/blog/[*:slug]-[i:id]','blog/templates');
$router-> map('GET', '/[:action]','404');

$match = $router->match();
if (is_array($match)){
        require '..\blog\layout.phtml';
        if (is_callable($match['target'])) {
                call_user_func_array($match['target'],$match['params']);
        } else{
                $params = $match['params'];
                require "../templates/{$match['target']}.php";
        }
       
}
/*test de route*/
/*Routes des articles du blog ** Attention au require*/
$match2 = $router->match();
if (is_array($match2)){
        require '..\blog\layout.phtml';
        require '..\blog\templates\homeView.php';
        if (is_callable($match2['target'])) {
                call_user_func_array($match2['target'],$match2['params']);
        } else{
                $params = $match2['params'];
                require "../templates/{$match2['target']}.php";
        }
       
};
/*Routes du layout Head/Foot** Attention au require*/
$match3 = $router->match();
if (is_array($match3)){
        require '..\blog\layout.phtml';
        require '..\blog\templates\articles.php';
        if (is_callable($match2['target'])) {
                call_user_func_array($match3['target'],$match3['params']);
        } else{
                $params = $match3['params'];
                require "../templates/{$match2['target']}.php";
        }


};



