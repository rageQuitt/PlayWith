<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

class ExceptionController
{
    /**
     * @Route("/exception/{message}")
     */
    public function showException($message)
    {
        throw new NotFoundHttpException($message);
    }

    /**
 * @Route("/redirect-to-home")
 */
public function redirectToHome()
{
    return $this->redirectToRoute('homepage');
}

}
