<?php

namespace PageBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

/**
* @package PageBundle\Controller@
* @Route("/portfolio", name="portfolio_index")
*/
class PortfolioController extends Controller
{
    /**
     * @package PageBundle\Controller@
     * @Route("/", name="portfolio_show")
     */
    public function indexAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $page = $em->getRepository('PageBundle:Portfolio')->findBy(array('published' => true));
        return $this->render('Portfolio/index.html.twig', array(
            'page' => $page,
        ));
    }

}