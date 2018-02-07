<?php

namespace Person\EmployeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Request;

class ToDoController extends Controller
{
    public function indexAction(Request $request)
    {
                //creation session
                $session = $request->getSession();
                if(!$session->has('mesTodos')){
                    $session->getFlashBag()->add('success','Nouvelle session ouverte');
                    $todos=array(
                        'Jeudi'=>'cours Framework',
                        'Samedi' => 'Dormir'
                    );
                    $session->set('mesTodos',$todos);
                }
        return $this->render('PersonEmployeBundle:Default:todo.html.twig');
    }
    public function addAction(Request $request,$cle,$valeur)
    {
        $session = $request->getSession();
        if($session->has('mesTodos'))
        {
            $todos=$session->get('mesTodos');
            if(isset($todos[$cle]))
            {
                $message = 'le todo de cle '.$cle.' est déjà existant';
                $session->getFlashBag()->add('error',$message);
            }
            else{
                $todos[$cle]=$valeur;
                $session->set('mesTodos',$todos);
                $message = 'le todo de cle '.$cle.' et de valeur '.$valeur.' a été ajouté avec succés';
              $session->getFlashBag()->add('success',$message);
            }
        }else{
            $message = 'Session innexistante';
            $session->getFlashBag()->add('error',$message);
        }
          return $this->render('PersonEmployeBundle:Default:todo.html.twig');   
    }
    public function deleteAction(Request $request,$cle)
    {
        $session=$request->getSession();
        if($session->has('mesTodos'))
        {
            $todos=$session->get('mesTodos');
            if(isset($todos[$cle]))
            {
                unset($todos[$cle]);
                $message = 'le todo de cle '.$cle.' a été supprimé avec succés';
                $session->set('mesTodos',$todos);
              $session->getFlashBag()->add('success',$message);
            }
            else{
                $message = 'le todo de cle '.$cle.' nexiste pas';
                $session->getFlashBag()->add('error',$message);
            }
        }else{
            $message = 'Session innexistante';
            $session->getFlashBag()->add('error',$message);
        }
        return $this->render('PersonEmployeBundle:Default:todo.html.twig'); 
    }
}