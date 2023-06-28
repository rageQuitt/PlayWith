<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route; 
use Symfony\Component\Routing\Attribute\Route as RouteAttribute; 
use App\Repository\UsersRepository;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\ArticleRepository;




/**
 * @Route("/blog", name="blog_")
 */

class BlogController extends AbstractController
{
    private $usersRepository;
    private $articleRepository;

    public function __construct(UsersRepository $usersRepository, ArticleRepository $articleRepository)
    {
        $this->usersRepository = $usersRepository;
        $this->articleRepository = $articleRepository;
    }

    #[RouteAttribute("/", name: "index", methods: ["GET"])]
    public function index(SessionInterface $session): Response
    {
        // Récupère tous les utilisateurs
        $users = $this->usersRepository->findAll();

        // Récupère tous les articles
        $articles = $this->articleRepository->findAll();

        // get the selected data from session
        $selected = $session->get('selected');
        
        // Passe la variable 'users' et 'articles' à la vue
        return $this->render('blog/index.html.twig', [
            'controller_name' => 'BlogController',
            'users' => $users,
            'articles' => $articles,
        ]);
    }


    
    #[RouteAttribute("/article/{id}", name: "article", methods: ["GET"])]
    public function article(int $id): Response
    {
        // Récupère l'article par son id
        $article = $this->articleRepository->find($id);
    
        // Passe l'article à la vue
        return $this->render('blog/article.html.twig', [
            'article' => $article,
        ]);
    }
    
    
    
    #[RouteAttribute("/blog", name: "app_blog_post", methods: ["POST"])]
    public function receiveData(Request $request, SessionInterface $session): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
    
        // store the data in session
        $session->set('selected', $data);

        return new JsonResponse(['status' => 'success']);
    }

    // ...
}
