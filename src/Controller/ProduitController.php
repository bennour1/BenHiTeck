<?php

namespace App\Controller;

use App\Entity\Produit;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ProduitController extends AbstractController
{
    /**
     * @Route("/", name="home")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function home(Request $request){
        dump($request);
        return $this->render('produit/home.html.twig', [
            'titre' => 'j\'ai choisi pour vous les bon produit avec des meilleur prix',
            'titre2' => 'chez benhiteck vous trouvee toujour des bon plans'
        ]);
    }
    /**
     * @Route("/produit/ListeProduits/{categorie}", name="liste_produits_par_categorie")
     */
    public function index($categorie)
    {
        // exemple 0
        $repo = $this->getDoctrine()->getRepository(Produit::class);
        // exemple 1
        //$articles = $repo->findAll();
        $articles = $repo->listeProduitsPourChaqueCategorie($categorie);
        dump($articles);
        return $this->render('produit/index.html.twig', [
            'articles' => $articles,
        ]);
    }
}
