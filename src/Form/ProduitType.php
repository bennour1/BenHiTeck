<?php
namespace App\Form;
use App\Entity\Categorie;
use App\Entity\Marque;
use App\Entity\Produit;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
class ProduitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomProduit')
            ->add('description')
            ->add('motRecherche')
            ->add('marque', EntityType::class, [
                'class' =>Marque::class,
                'choice_label' => 'nomMarque'
            ])
            ->add('categorie', EntityType::class, [
                'class' =>Categorie::class,
                'choice_label' => 'nomCategorie'
            ])
        ;
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Produit::class,
        ]);
    }
}