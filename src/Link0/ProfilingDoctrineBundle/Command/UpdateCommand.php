<?php

namespace Link0\ProfilingDoctrineBundle\Command;

use Doctrine\Bundle\DoctrineBundle\Registry;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class UpdateCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('profilingdoctrine:update')
            ->setDescription('Update database model');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /** @var Registry $doctrine */
        $container = $this->getContainer();
        $doctrine = $container->get('doctrine');
        $entityManager = $doctrine->getManager();

        $manyRepository = $doctrine->getRepository('Link0\ProfilingDoctrineBundle\Entity\Many');
        $manies = $manyRepository->findAll();

        foreach($manies as $many) {
            $many->setName($many->getName() . '_updated');
            $output->writeln($many->getName());

            $entityManager->persist($many);
        }

        $entityManager->flush();
    }
}