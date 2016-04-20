<?php

namespace ParcelOrderBundle\Handler;

use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Form\FormFactoryInterface;
use ParcelOrderBundle\Model\ParcelOrderInterface;
use ParcelOrderBundle\Form\ParcelOrderType;
use ParcelOrderBundle\Exception\InvalidFormException;
use ParcelOrderBundle\Repository\ParcelOrderRepository;

class ParcelOrderFormHandler implements ParcelFormHandlerInterface
{
	private $entityClass;
	private $repository;
	private $formFactory;
	private $formType;
	
	public function __construct(ObjectManager $om, $entityClass,FormFactoryInterface $formFactory, $formType)
	{
		$this->entityClass = $entityClass;
		$this->repository = $om->getRepository($this->entityClass);
		$this->formFactory = $formFactory;
		$this->formType = $formType;
	}
	public function post(array $parameters)
    {
        $parcel = $this->createParcel();
        return $this->processForm($parcel, $parameters, 'POST');
    }
	public function put(ParcelOrderInterface $parcel, array $parameters)
	{
		return $this->processForm($parcel, $parameters, 'PUT');
	}
	private function processForm(ParcelOrderInterface $parcel, array $parameters,$method = "PUT")
	{
		$form = $this->formFactory->create($this->formType, $parcel, array('method' => $method));
		$form->submit($parameters, 'PATCH' !== $method);
		if ($form->isValid()) {
			$note = $form->getData();
			$this->repository->save($parcel);
			return $parcel;
		}
		throw new InvalidFormException('Invalid submitted data', $form);
	}
	private function createParcel()
	{
		return new $this->entityClass();
	}
}