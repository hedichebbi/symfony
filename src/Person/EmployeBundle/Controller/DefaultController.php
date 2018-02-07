<?php

namespace Person\EmployeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($id)
    {
        // $message="hello world";
        return $this->render('PersonEmployeBundle:Default:index.html.twig',array('id'  => $id));
    }
}
