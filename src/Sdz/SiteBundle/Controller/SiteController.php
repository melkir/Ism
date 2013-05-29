<?php

namespace Sdz\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sdz\SiteBundle\Form\Handler\ContactHandler;
use Sdz\SiteBundle\Form\Type\ContactType;

class SiteController extends Controller
{
    public function indexAction()
    {
        return $this->render('SdzSiteBundle:Site:index.html.twig');
    }

    public function contactAction()
    {
        $form = $this->createForm(new ContactType);

        // On récupère la requête
        $request = $this->getRequest();

        //On récupère le handler associé au formulaire
        $formHandler = new ContactHandler($form, $request, $this->get('mailer'));

        // Le handler s'occupe de la gestion du formulaire
        $process = $formHandler->process(); // Contient true si la requête est POST et le formulaire valide
        if ($process)
        {
            $this->get('session')->getFlashBag()->add('info', 'Message envoyé');
        }

        return $this->render('SdzSiteBundle:Site:contact.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    public function roadmapAction()
    {
        return $this->render('SdzSiteBundle:Site:roadmap.html.twig');
    }
}
