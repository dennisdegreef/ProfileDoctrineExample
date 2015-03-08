<?php

namespace Link0\ProfilingDoctrineBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     * @Template()
     */
    public function indexAction()
    {
        $doctrine = $this->getDoctrine();
        $manyRepository = $doctrine->getRepository('Link0\ProfilingDoctrineBundle\Entity\Many');

        return array(
            'manies' => $manyRepository->findAll()
        );
    }
}
