<?php

    use application\bdd;
    use public\index;


    $id = (int)$params['id'];
    $slug = $params['slug'];

    $pdo = bdd::getPDO();
    $query = $pdo->prepare('SELECT * FROM post WHERE id = :id');
    $query->execute(['id'=> $id]);
    $query->setFetchMode(PDO::FETCH_CLASS, Post::class);

    $post = $query->fetch();

    if($post === false){
        throw new Exception('Aucun article ne correspond à cet ID');
    }
if($post->getSlug() !==$slug){

    $url = $router->url('post',['slug'=> $post->getSlug(), 'id'=>$id]);
    http_response_code(301);
    header('Location:' .$url);
}