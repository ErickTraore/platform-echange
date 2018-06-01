<?php

namespace OC\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\HttpFoundation\Request;

class AnnonceController extends Controller
{
    public function indexAction()
    {
        $url = $this->generateUrl('oc_platform_homepage');
        return new Response($url);
    }
    public function unepageAction()
    {
        return $this->render('OCPlatformBundle:Advert:unepage.html.twig');
    }
    public function deuxpagesAction()
    {
        return $this->render('OCPlatformBundle:Advert:deuxpages.html.twig');
    }
    public function troispagesSlugAction($slug, $year, $format)
    {
        return new Response(
            "On pourrait afficher l'annonce correspondant au
            slug '".$slug."', créée en ".$year." et au format ".$format."."
        );
    }
  
    public function cinqpagesAction()
    {
        // On veut avoir l'URL de l'annonce d'id 5.
        $url = $this->get('router')->generate(
            'oc_platform_cinqpages', // 1er argument : le nom de la route
            array('id' => 5)    // 2e argument : les valeurs des paramètres
        );
        // $url vaut « /platform/advert/5 »
        
        return new Response($url);
    }

    public function viewAction($id, Request $request)
  {
    // On récupère notre paramètre tag
    $tag = $request->query->get('tag');

    return new Response(
      "Affichage de l'annonce d'id : ".$id.", avec le tag : ".$tag
    );
  }

  public function viewbisAction($id)
  {
    // On crée la réponse sans lui donner de contenu pour le moment
    $response = new Response();

    // On définit le contenu
    $response->setContent("Ceci est une page privéed'erreur 404");

    // On définit le code HTTP à « Not Found » (erreur 404)
    $response->setStatusCode(Response::HTTP_NOT_FOUND);

    // On retourne la réponse
    return $response;
  }
}
