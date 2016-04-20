<?php
namespace ParcelOrderBundle\Handler;
use ParcelOrderBundle\Model\ParcelOrderInterface;

Interface ParcelFormHandlerInterface
{
	public function post(array $parameters);
	public function put(ParcelOrderInterface $parcel, array $parameters);
}