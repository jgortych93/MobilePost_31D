<?php

namespace ParcelOrderBundle\Repository;
use Symfony\Component\HttpFoundation\Request;

/**
 * ParcelRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ParcelOrderRepository extends \Doctrine\ORM\EntityRepository
{
	public function find($id)
	{
		return $this->getEntityManager()
		->createQuery("SELECT p FROM ParcelOrderBundle:ParcelOrder p WHERE p.id = " . $id)
		->getResult();
	}
	public function findAll()
	{
		return $this->getEntityManager()
		->createQuery("SELECT p FROM ParcelOrderBundle:ParcelOrder p")
		->getResult();
	}
}
