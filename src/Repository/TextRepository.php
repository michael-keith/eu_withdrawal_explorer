<?php

namespace App\Repository;

use App\Entity\Text;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Text|null find($id, $lockMode = null, $lockVersion = null)
 * @method Text|null findOneBy(array $criteria, array $orderBy = null)
 * @method Text[]    findAll()
 * @method Text[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TextRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Text::class);
    }

    // /**
    //  * @return Text[] Returns an array of Text objects
    //  */
    public function getAllPages()
    {
        return $this->createQueryBuilder('page')
        ->select(' page.page_num as page_num, page.annex, page.annex_title, page.part, page.part_title, page.article, page.article_title')
        ->getQuery()
        ->getResult();
        ;
    }

    public function searchWord($word)
    {
        return $this->createQueryBuilder('page')
        ->select('page.page_num, page.line_num ,page.text')
        ->where('page.text LIKE :word')
        ->setParameter('word', '%'.$word.'%')
        ->getQuery()
        ->getResult();
        ;
    }

    public function searchPage($page_num)
    {
        return $this->createQueryBuilder('page')
        ->select('page.text, page.page_num')
        ->where('page.page_num = :page_num')
        ->setParameter('page_num', $page_num)
        ->getQuery()
        ->getResult();
        ;
    }


    /*
    public function findOneBySomeField($value): ?Text
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
