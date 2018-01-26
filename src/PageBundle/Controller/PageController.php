<?php

namespace PageBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Response;

class PageController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexPageAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $page = $em->getRepository('PageBundle:Page')->findOneBy(array('id' => 1));
        if (!$page) {
            throw $this->createNotFoundException('Unable to find Page entity.');
        }
        return $this->render('Page/index.html.twig', array(
            'page' => $page,
        ));
    }

    /**
     * @Route("/{linkNew}", name="page_show", requirements={"linkNew"=".+"})
     *
    */
    public function showPageAction($linkNew)
    {
        $em = $this->getDoctrine()->getManager();
        $page = $em->getRepository('PageBundle:Page')->findOneBy(array('linkNew' => $linkNew));

        if (!$page) {
            throw $this->createNotFoundException('Unable to find Page entity.');
        }

        return $this->render('Page/show.html.twig', array(
            'page' => $page,
        ));
    }

}