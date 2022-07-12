<?php

namespace App\Repository;

use Doctrine\ORM\EntityRepository;

class CalculatorRecordRepository extends EntityRepository
{
    public function getRecords($limit = 5, $offset = 0)
    {
        $q = $this->_em->createQuery('SELECT t
        FROM App:CalculatorRecord t
        ORDER BY t.id DESC');
        $q->setFirstResult($offset);
        $q->setMaxResults($limit);

        return $q->getResult();
    }

}
