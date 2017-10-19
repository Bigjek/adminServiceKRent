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

    // /**
    //  * @Route("/order", name="order_page")
    //  */
    // public function indexFormAction(Request $request)
    // {
    //     return $this->render('Form/index.html.twig');
    // }

    /**
     * @param $id
     * @Route("/shooting", name="shooting_order")
     * @Method("POST")
     * @return Response
     */
    public function shootingAction(Request $request)
    {
        $person = [
            'list' => $request->get('list'),
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'tel' => $request->get('tel'),
            'msg' => $request->get('msg'),
        ];
        $entity = array_map(function($v){
            return trim(strip_tags($v));
        }, $person);

        $message = \Swift_Message::newInstance()
            ->setSubject('Заявка на услуги')
            ->setFrom(array('robot@kino.rent' => 'KinoRentBot'))
            ->setTo(array('prod@kino.rent'))
            ->setBody( $this->renderView('Email/shooting.html.twig', array('entity' => $entity )), 'text/html');

        if(empty($_FILES['pack'])){
            $message->attach(\Swift_Attachment::fromPath($_FILES['pack']['tmp_name'])->setFilename($_FILES['pack']['name']));
        }
        
        $failedRecipients = array();
        $this->get('mailer')->send($message, $failedRecipients);
        if(count($failedRecipients)==0)
        {
            return new Response(null, 200);
        }
        else{
            return new Response(null, 400);
        }
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