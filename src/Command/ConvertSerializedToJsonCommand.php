<?php

namespace App\Command;

use App\Entity\Users;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ConvertSerializedToJsonCommand extends Command
{
    protected static $defaultName = 'app:convert-serialized-to-json';

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;

        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setDescription('Converts serialized data to JSON')
            ->setHelp('This command should be run once to convert all existing serialized data to JSON');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $repository = $this->entityManager->getRepository(Users::class);
        $entities = $repository->findAll();

        foreach ($entities as $entity) {
            $data = unserialize($entity->getRoles());
            $entity->setRoles($data);
            $this->entityManager->persist($entity);
        }

        $this->entityManager->flush();

        $output->writeln('Data conversion completed successfully!');

        return Command::SUCCESS;
    }
}
