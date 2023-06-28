<?php

namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use App\Entity\Users;
//
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;


#[AsCommand(
    name: 'app:promote-admin',
    description: 'From Human to Adminstrator',
)]
class PromoteAdminCommand extends Command
{
    protected static $defaultName = 'app:promote-admin';

    private $entityManager;
    private $passwordHasher;

    public function __construct(EntityManagerInterface $entityManager,  UserPasswordHasherInterface $passwordHasher)
    {
        $this->entityManager = $entityManager;
        $this->passwordHasher = $passwordHasher;
        
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
        ->setDescription('From Zero to Hero')
        ->addArgument('email', InputArgument::REQUIRED, 'Email utilisateur.')
    ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        // récupérer l'argument email
        $email = $input->getArgument('email');
    
        // trouver l'utilisateur par email
        $user = $this->entityManager->getRepository(Users::class)->findOneBy(['email' => $email]);
    
        if (!$user) {
            $output->writeln('<error>User not found</error>');
            return Command::FAILURE;
        }
    
        // ajouter le rôle admin à l'utilisateur
        $user->setRoles(['ROLE_ADMIN']);
    
        // enregistrer les changements
        $this->entityManager->flush();
    
        $output->writeln('<info>Promotion to administrator</info>');
    
        return Command::SUCCESS;
    }
    
}
