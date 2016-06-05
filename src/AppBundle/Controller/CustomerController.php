<?php

namespace AppBundle\Controller;

use AppBundle\Model\Address;
use AppBundle\Model\Customer;
use Sensio\Bundle\FrameworkExtraBundle\Configuration as Feb;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CustomerController extends Controller
{
    /**
     * @Feb\Route("/customer", name="customer")
     * @param Request $request
     * @return Response
     */
    public function addAction(Request $request)
    {
        $customer = new Customer();
        $customer->name = 'John Smith';

        $customer->addresses[] = $address = new Address();

        $address->line1 = '220 East Cord Road';
        $address->line2 = 'Birchwood';
        $address->postcode = '6161';

        $form = $this->createForm('customer', $customer);

        $form->handleRequest($request);

        if ($form->isValid()) {
            return $this->render('AppBundle:Customer:success.html.twig', array(
                'customer' => $customer,
            ));
        }

        return $this->render('AppBundle:Customer:form.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
