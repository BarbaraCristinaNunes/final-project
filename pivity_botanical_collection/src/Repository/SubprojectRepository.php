<?php

namespace App\Repository;

use App\Entity\Subproject;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Subproject|null find($id, $lockMode = null, $lockVersion = null)
 * @method Subproject|null findOneBy(array $criteria, array $orderBy = null)
 * @method Subproject[]    findAll()
 * @method Subproject[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SubprojectRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Subproject::class);
    }

    public static function createSubroject($doctrine, Subproject $subproject)
    {
        $entityManager = $doctrine->getManager();
        $entityManager->persist($subproject);
        $entityManager->flush();
    }

    public static function readAllSubprojects($doctrine)
    {
        $db = $doctrine->getRepository(Subproject::class)->findAll();

        if(!$db){
            return false;
        }else{
            return $db;
        }
    }

    public static function findSubrojectByInstitutionId($doctrine, $institutionId)
    {
        $db = $doctrine->getRepository(Subproject::class)->findBy(array('institution_id' => $institutionId));

        if(!$db){

            return false;

        }else{

            return $db;
        }
    }

    public static function findSubprojectByName($doctrine, $subproject)
    {
        $db = $doctrine->getRepository(Subproject::class)->findBy(array('name' => $subproject));

        if(!$db){

            return false;

        }else{

            return $db;
        }
    }

    // /**
    //  * @return Subproject[] Returns an array of Subproject objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Subproject
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
