<?php

namespace App\Repository;

use App\Entity\Produit;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Produit|null find($id, $lockMode = null, $lockVersion = null)
 * @method Produit|null findOneBy(array $criteria, array $orderBy = null)
 * @method Produit[]    findAll()
 * @method Produit[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProduitRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Produit::class);
    }

    // /**
    //  * @return Produit[] Returns an array of Produit objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Produit
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
    public function listeProduitsPourChaqueCategorie($nomCategorie)
    {
        $qb = $this
            ->createQueryBuilder('p')
            // Jointure avec la table Categorie
            ->join('p.categorie', 'ca')
            ->addSelect('ca')
            // Jointure avec la table Image
            ->leftJoin('p.images', 'im')
            ->addSelect('im')
            // Jointure avec la table Marque
            ->leftJoin('p.marque', 'ma')
            ->addSelect('ma')
        ;
        // Filtrer sur les images MASTER
        $qb->where($qb->expr()->in('im.master', 1));
        // filtrer sur une gategorie
        //$qb->andWhere($qb->expr()->in('ca.id', 1));
        $qb->andWhere($qb->expr()->in('ca.id', $nomCategorie));
        return $qb
            ->getQuery()
            ->getResult();
    }
}
