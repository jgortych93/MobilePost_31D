<?php
namespace ParcelBundle\Tests\Utility;

use ParcelBundle\Controller\ParcelController;
use ParcelBundle\Handler\ParcelFormHandler;
use ParcelBundle\Model\ParcelInterface;

class ParcelFormHandlerTest extends \PHPUnit_Framework_TestCase
{
    public function testput(ParcelInterface $parcel, array $parameters)
    {
		$if= new ParcelInterface();
		$arr=array();
        $fun = new ParcelFormHandler();
        $result = $fun->put($if,$arr);

        // assert that your calculator added the numbers correctly!
        $this->assertFalse($this->processForm($parcel, $parameters, 'PUT'), $result);
    }
}