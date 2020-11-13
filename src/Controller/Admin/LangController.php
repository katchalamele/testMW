<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class LangController extends AbstractController
{
    
    /**
     * @Route("/change-lang/{lang}", name="change_lang")
     */
    public function change_lang($lang, Request $request)
    {
        $request->getSession()->set('_locale', $lang);

        return $this->redirect($request->headers->get('referer'));
    }
}