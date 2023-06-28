<?php


namespace App\Controller;

use App\Entity\Users;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UsersController extends AbstractController
{
  
    /**
     * @Route("/user/create", name="create_user")
     */
    public function createUser(UserPasswordHasherInterface $passwordHasher, EntityManagerInterface $entityManager): Response
    {
    // Nouvel utilisateur
    $user = new Users(null, $passwordHasher);
    $user->setEmail('admin@admin.com');
    $user->setLastname('Doe');
    $user->setFirstname('John');
    // Hachage du mot de passe
    $plainPassword = 'admin';
    $hashedPassword = $passwordHasher->hashPassword($user, $plainPassword);
    $user->setPassword($hashedPassword);

    // Attribution du rôle
    $user->setRoles(['ROLE_ADMIN']);

    // Enregistrement de l'utilisateur
    $entityManager->persist($user);
    $entityManager->flush();

    return new Response('Utilisateur admin créé');
    }


}
