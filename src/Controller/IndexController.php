<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class IndexController extends AbstractController
{

    /**
     * @Route("/")
     */
    public function actionIndex(){
        //return $this->render('index.html.twig');
    }
}