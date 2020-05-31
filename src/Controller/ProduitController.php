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
    public function home(Request $request)
    {
        dump($request);
        return $this->render('produit/home.html.twig', [
            'titre' => 'J\'ai choisi pour vous les bon produit avec des meilleur prix',
            'titre2' => 'chez benhiteck vous trouvee toujour des bon plans'
        ]);
    }

    /**
     * @Route("/produit/ListeProduits/{categorie}", name="liste_produits_par_categorie")
     */
    public function index($categorie)
    {
        // Récupération du repository de la class Produit : src/Repository/ProduitRepository.php
        $repo = $this->getDoctrine()->getRepository(Produit::class);
        // requéte SQL
        //$articles = $repo->findAll();
        $articles = $repo->listeProduitsPourChaqueCategorie($categorie);
        dump($articles);
        /*
        foreach ($articles as $unArticle) {
            var_dump($unArticle->getNomProduit());
            foreach ($unArticle->getVariantes() as $variante) {
                var_dump($variante->getMaster());
                var_dump($variante->getPrix());
            }
            foreach ($unArticle->getImages() as $photo) {
                var_dump($photo->getMaster());
                var_dump($photo->getNomImage());
            }
        }
        */
        return $this->render('produit/index.html.twig', [
            'articles' => $articles,
        ]);
    }
}
