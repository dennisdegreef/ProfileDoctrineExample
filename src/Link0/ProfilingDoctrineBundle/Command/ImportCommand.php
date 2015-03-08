<?php

namespace Link0\ProfilingDoctrineBundle\Command;

use Doctrine\Bundle\DoctrineBundle\Registry;
use Link0\ProfilingDoctrineBundle\Entity\Many;
use Link0\ProfilingDoctrineBundle\Entity\One;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class ImportCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('profilingdoctrine:import')
            ->setDescription('Import database model');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /** @var Registry $doctrine */
        $container = $this->getContainer();
        $doctrine = $container->get('doctrine');
        $entityManager = $doctrine->getManager();

        $one = new One();
        $one->setName('one');
        $entityManager->persist($one);

        for($i = 0; $i < 32; $i++) {
            $many = new Many();
            $many->setName('many_' . $i);
            $many->setOne($one);
            $entityManager->persist($many);
        }

        $entityManager->flush();
    }
}