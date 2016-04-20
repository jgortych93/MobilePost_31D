<?php

namespace ParcelOrderBundle\Controller;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use ParcelOrderBundle\Repository\ParcelOrderRepository;
use ParcelOrderBundle\Resources\config\services;

class ParcelOrderController extends FOSRestController 
{
	public function getParcelsAction() {
		return $this->getDoctrine()->getRepository('ParcelOrderBundle:ParcelOrder')
		->findAll();
	}
	public function getParcelAction($id) {
		return $this->getDoctrine()->getRepository('ParcelOrderBundle:ParcelOrder')
		->find($id);
	}
	//stworzyć paczkę na jak w lab3
	public function postParcelOrderAction(Request $request) 
	{
		try {
				$pocz=1;
				$kon=9999;
				$los=rand($pocz,$kon);
				
				$request->request->set('parcelOrderHash',$los);
				$newParcelOrder = $this->container->get('parcelorder_rest.parcel_order_form.handler')
				->post(
				$request->request->all()
				);
				
				$routeOptions = array(
				'id' => $newParcelOrder->getId(),
				'_format' => $request->get('_format')
				);
				return $this->routeRedirectView('get_parcels', $routeOptions,
				Response::HTTP_CREATED);
			} 
			catch (InvalidFormException $exception) {
				return array('form' => $exception->getForm());
			}
	}
	
	public function putParcelOrderAction(Request $request, $id)
    {
        try {
            $parcel = getParcelAction($id);
	        $this->getDoctrine()->getRepository('ParcelOrderBundle:ParcelOrder')
		        ->find($id);

            if (!$parcel) {
                $statusCode = Response::HTTP_CREATED;
                $parcel = $this->container->get('parcelorder_rest.parcel_order_form.handler')->post($request->request->all());
            }
            else {
                $statusCode = Response::HTTP_NO_CONTENT;
                $parcel = $this->container->get('parcelorder_rest.parcel_order_form.handler')->put($parcel, $request->request->all());
            }

            $routeOptions = array ('id' => $parcel->getId(),
                                   '_format' => $request->get('_format')
                                  );
            return $this->routeRedirectView('api_1_get_parcel', $routeOptions, $statusCode);
        }
        catch (InvalidFormException $exception) {
            return $exception->getForm();
        }
    }
	public function deleteParcelOrderAction(Request $request, $id)
    {
        $parcel = getParcelAction($id);
	    $this->getDoctrine()->getRepository('ParcelOrderBundle:ParcelOrder')
	        ->find($id);

        if ($parcel) {
            $this->getDoctrine()->getRepository('ParcelOrderBundle:ParcelOrder')->delete($parcel);
        }
        else {
            throw new NotFoundHttpException(sprintf('The resource \'%s\' was not found.', $id));
        }
    }
}