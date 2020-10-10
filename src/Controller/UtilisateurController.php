<?php
namespace App\Controller;
use App\Entity\Utilisateur;
use App\Form\UtilisateurType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
class UtilisateurController extends AbstractController
{
    /**
     * @Route("/inscription", name="inscription_utilisateur")
     * @Route("/inscription/{id}/modifier", name="modifier_utilisateur")
     * http://127.0.0.1:8000/inscription/18/modifier
     */
    public function inscrireModifierUtilisateur(Request $request, UserPasswordEncoderInterface $encoder, Utilisateur $utilisateur = null) {
        if ( !$utilisateur) {
            $utilisateur = new Utilisateur();
        }
        // Création du formulaire inscription
        $formulaireInscriptionUtilisateur = $this->createForm(UtilisateurType::class, $utilisateur);
        // Analyse de la requette http
        $formulaireInscriptionUtilisateur->handleRequest($request);
        if ($formulaireInscriptionUtilisateur->isSubmitted() && $formulaireInscriptionUtilisateur->isValid()) {
            /*
            On va crypter notre mot de pass via le fichier config/packages/security.yaml
            encoders:
            App\Entity\Utilisateur:
            algorithm: bcrypt
            */
            $motDePassseCrypte = $encoder->encodePassword($utilisateur, $utilisateur->getMotDePasse());
            $utilisateur->setMotDePasse($motDePassseCrypte);
            // Je n'ajoute pas la date de création et activation de compte si l'utilisateur existe déjà
            if( !$utilisateur->getId()) {
                $utilisateur->setActivationCompte('OUI')
                    ->setDateAjout(new \DateTime());
            }
            dump($utilisateur);
            // Persister mon objet utilisateur
            $entiteManager = $this->getDoctrine()->getManager();
            $entiteManager->persist($utilisateur);
            $entiteManager->flush();
            // Après une inscription je me dérige vers la route se connecter
            return $this->redirectToRoute('connexion_utilisateur');
        }
        return $this->render('utilisateur/inscrireUtilisateur.html.twig', [
            'formulaireInscriptionUtilisateur' => $formulaireInscriptionUtilisateur->createView()
        ]);
    }
    /**
     * @Route("/connexion", name="connexion_utilisateur")
     */
    public function seConnecter() {
        return $this->render('utilisateur/seConnecter.html.twig');
    }
    /**
     * @Route("/deconnexion", name="security_logout")
     */
    public function logout(){}
}