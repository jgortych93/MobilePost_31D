<?php
namespace ParcelOrderBundle\Model;

Interface ParcelOrderInterface
{
	public function setParcel(\ParcelBundle\Entity\Parcel $parcel = null);
	public function getParcel();
	public function setSender(\ParcelOrderBundle\Entity\AddressData $sender = null);
	public function getSender();
	public function setNotes($Notes);
	public function getNotes();
	public function setReceiver(\ParcelOrderBundle\Entity\AddressData $receiver = null);
	public function getReceiver();
	public function setTracking($Tracking);
	public function getTracking();
	public function setParcelOrderHash($parcelOrderHash);
	public function getParcelOrderHash();
}