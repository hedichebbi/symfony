<?php

namespace Person\EmployeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($message)
    {
        $message="hello";
        return $this->render('PersonEmployeBundle:Default:index.html.twig',$message);
    }
}
