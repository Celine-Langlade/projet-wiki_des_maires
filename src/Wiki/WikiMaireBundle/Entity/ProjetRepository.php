<?php

namespace Wiki\WikiMaireBundle\Entity;

use Doctrine\ORM\Query\ResultSetMapping;

/**
 * ProjetRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ProjetRepository extends \Doctrine\ORM\EntityRepository
{

    public function RechercheProjet($tags)
    {
        $queryBuilder = $this->_em->createQueryBuilder()
            ->select('p')
            ->from($this->_entityName, 'p')// Dans un repository, $this->_entityName est le namespace de l'entité gérée
            ->Where('p.nomprojet LIKE :str')
            ->setParameter('str', '%'.$tags.'%');
        $query = $queryBuilder->getQuery();
        return $query->getResult();
    }

    public function getSuggested($nb, $env)
    {
        $rsm = new ResultSetMapping();
        $rsm->addEntityResult('Wiki\WikiMaireBundle\Entity\Projet', 'p');
        $rsm->addFieldResult('p', 'id', 'id');
        $rsm->addFieldResult('p', 'nomprojet', 'nomprojet');
        $rsm->addFieldResult('p', 'description', 'description');
        $rsm->addFieldResult('p', 'duree', 'duree');
        $rsm->addFieldResult('p', 'gains', 'gains');
        $rsm->addFieldResult('p', 'daterealisation', 'daterealisation');
        $rsm->addFieldResult('p', 'cout', 'cout');
        $rsm->addFieldResult('p', 'photo', 'photo');
        $rsm->addFieldResult('p', 'financement', 'financement');
        $rsm->addFieldResult('p', 'user', 'user');

        if ($env=='test')
            $sql = 'SELECT * FROM projet ORDER BY RANDOM() LIMIT ?';
        else
            $sql = 'SELECT * FROM projet ORDER BY RAND() LIMIT ?';

        $query = $this->_em->createNativeQuery($sql, $rsm);
        $query->setParameter(1, $nb);

        return $query->getResult();
    }
}
