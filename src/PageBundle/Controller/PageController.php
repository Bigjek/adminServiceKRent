<?php

namespace PageBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PageController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexPageAction(Request $request)
    {
        // replace this example code with whatever you need
        // return $this->render('default/index.html.twig', array(
        //     'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..'),
        // ));

        $em = $this->getDoctrine()->getManager();
        $page = $em->getRepository('PageBundle:Page')->findAll();
        return $this->render('Page/index.html.twig', array(
            'page' => $page,
        ));
    }

    /**
     * @Route("/article/{link}", name="page_show", requirements={"link"=".+"})
     *
    */
    public function showPageAction($link)
    {

        $em = $this->getDoctrine()->getManager();
        $page = $em->getRepository('PageBundle:Page')->findOneBy(array('link' => $link));

        if (!$page) {
            throw $this->createNotFoundException('Unable to find Page entity.');
        }

        return $this->render('Page/show.html.twig', array(
            'page' => $page,
        ));
    }

    public function getPageListAction()
    {
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('PageBundle:Page')->findBy(array('published' => true));
        return $this->render('Page/listMenuPage.html.twig', array(
            'entities' => $entities,
        ));
    }




}