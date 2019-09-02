<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;


class WelcomeController extends AbstractController
{
    /**
     * @Route("/welcome", name="welcome")
     */
    public function index()
    {
        return $this->render('welcome/index.html.twig', [
            'controller_name' => 'WelcomeController',
        ]);
    }

    /**
     * @Route("/hello_page/{name}",
     *      name="hello_page",
     *     defaults={"name" = "CodeReviewVidoes"},
     *     requirements = {"name"="[A-Za-z]+"
     * })
     */
    public function hello($name='Chris'){
    	return $this->render('hello_page.html.twig',
    		[
    			'name' =>$name,
    		]
    	);
    }
}
 