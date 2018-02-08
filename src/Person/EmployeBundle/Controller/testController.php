<?php

namespace Person\EmployeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class testController extends Controller
{
    public function addAction()
    {
        return $this->render('PersonEmployeBundle:test:add.html.twig', array(
            // ...
        ));
    }

}
