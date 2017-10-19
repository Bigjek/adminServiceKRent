<?php

namespace PageBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

/**
* @package PageBundle\Controller@
* @Route("/team", name="team_index")
*/
class TeamController extends Controller
{
    /**
     * @package PageBundle\Controller@
     * @Route("/", name="team_show")
     */
    public function indexAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $page = $em->getRepository('PageBundle:Team')->findBy(array('published' => true));
        return $this->render('Team/index.html.twig', array(
            'page' => $page,
        ));
    }

}