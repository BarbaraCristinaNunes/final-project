<?php

namespace App\Repository;

use App\Entity\Institution;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Institution|null find($id, $lockMode = null, $lockVersion = null)
 * @method Institution|null findOneBy(array $criteria, array $orderBy = null)
 * @method Institution[]    findAll()
 * @method Institution[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InstitutionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $doctrine)
    {
        parent::__construct($doctrine, Institution::class);
    }

    // Create new institution in database
    public static  function createInstitution($doctrine, Institution $institution)
    {
        $entityManager = $doctrine->getManager();
        $entityManager->persist($institution);
        $entityManager->flush();
    }

    // Find an institution by name in database
    public static function findInstitutionByName($doctrine, $institution)
    {
        $db = $doctrine->getRepository(Institution::class)->findBy(array('name' => $institution));

        if(!$db){

            return false;

        }else{

            return $db;
        }
    }

    // Find an institution by laboratory
    public static function findInstitutionByLaboratory($doctrine, $laboratory)
    {
        $db = $doctrine->getRepository(Institution::class)->findBy(array('laboratory' => $laboratory));

        if(!$db){

            // There is no insitution called $institution
            return false;

        }else{

            // There is an insitution called $institution
            return $db;
        }
    }
    
    // /**
    //  * @return Institution[] Returns an array of Institution objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Institution
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
