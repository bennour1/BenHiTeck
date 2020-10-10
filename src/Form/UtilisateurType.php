<?php
namespace App\Form;
use App\Entity\Utilisateur;
use App\Entity\Ville;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
class UtilisateurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomUtilisateur')
            ->add('prenomUtilisateur')
            ->add('dateDeNaissance', DateType::class, [
                'widget' => 'single_text',
                // this is actually the default format for single_text
                //'format' => 'dd-MM-yyyy',
            ])
            ->add('adresse')
            ->add('ville', EntityType::class, [
                'class' => Ville::class,
                'choice_label' => 'nomVille'
            ])
            ->add('telephone')
            ->add('email')
            ->add('motDePasse', PasswordType::class)
            ->add('confirmation_mdp', PasswordType::class)
            //->add('dateAjout')
            //->add('activationCompte')
            //->add('dateDesactivation')
        ;
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Utilisateur::class,
        ]);
    }
}