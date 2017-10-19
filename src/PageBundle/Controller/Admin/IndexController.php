<?php

namespace PageBundle\Controller\Admin;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class IndexController extends Controller
{

    /**
     * Lists all page entities.
     *
     * @Route("/", name="admin_page_i")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        // $em = $this->getDoctrine()->getManager();

        // $entities = $em->getRepository('PageBundle:Page')->findAll();

        return $this->render('PageBundle:Admin/Index:index.html.twig', array(
            // 'entities' => $entities,
        ));

    }

}
