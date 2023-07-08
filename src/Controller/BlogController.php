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
use App\Repository\CategoriesRepository;



/**
 * @Route("/blog", name="blog_")
 */

class BlogController extends AbstractController
{
    private $usersRepository;
    private $articleRepository;
    private $categoriesRepository;

    public function __construct(UsersRepository $usersRepository, ArticleRepository $articleRepository, CategoriesRepository $categoriesRepository)
    {
        $this->usersRepository = $usersRepository;
        $this->articleRepository = $articleRepository;
        $this->categoriesRepository = $categoriesRepository;
    }

    #[RouteAttribute("/", name: "index", methods: ["GET"])]
    public function index(SessionInterface $session): Response
    {
        // Récupère tous les utilisateurs
        $users = $this->usersRepository->findAll();

        // Récupère tous les articles
        $articles = $this->articleRepository->findAll();

        //Récupère toutes les catégories

        $categories = $this->categoriesRepository->findAll();

        // get the selected data from session
        $selected = $session->get('selected');
        
        // Passe la variable 'users' et 'articles' à la vue
        return $this->render('blog/index.html.twig', [
            'controller_name' => 'BlogController',
            'users' => $users,
            'articles' => $articles,
            'categories' => $categories
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

   /**
 * @Route("/article/random", name="random_article", methods={"GET"})
 */
public function randomArticle(): Response
{
    // Récupère tous les articles
    $articles = $this->articleRepository->findAll();

    // Choisissez un article aléatoire
    $randomArticle = $articles[array_rand($articles)];

    // Redirige vers l'article aléatoire
    return $this->redirectToRoute('app_blog_article', ['id' => $randomArticle->getId()]);
}

}
