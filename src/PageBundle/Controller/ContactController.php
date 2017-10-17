<?php

namespace PageBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

/**
* @package PageBundle\Controller@
* @Route("/contact", name="contact_index")
*/
class ContactController extends Controller
{
    /**
     * @package PageBundle\Controller@
     * @Route("/", name="contact_show")
     */
    public function indexAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $page = $em->getRepository('PageBundle:Contact')->findBy(array('published' => true));
        return $this->render('Contact/index.html.twig', array(
            'page' => $page,
        ));
    }


}