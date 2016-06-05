<?php

namespace AppBundle\Controller;

use AppBundle\Model\Invoice;
use AppBundle\Model\InvoiceFreightLine;
use AppBundle\Model\InvoiceProductLine;
use Sensio\Bundle\FrameworkExtraBundle\Configuration as Feb;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class InvoiceController extends Controller
{
    /**
     * @Feb\Route("/invoice/", name="invoice_add")
     * @param Request $request
     * @return Response
     */
    public function invoiceCreateAction(Request $request)
    {
        $invoice = new Invoice();
        $invoice->recipient = 'John Smith';

        $invoice->lines[] = $productLine = new InvoiceProductLine();
        $productLine->setProductName('New Atlas 2016 Edition');
        $productLine->setQuantity(2);
        $productLine->setUnitPrice(104.95);

        $invoice->lines[] = $freightLine = new InvoiceFreightLine();
        $freightLine->setUnitPrice(15);
        $freightLine->setCourier('Overnight Couriers');

        $form = $this->createForm('invoice', $invoice);
        $form->handleRequest($request);

        if ($form->isValid()) {
            return $this->render('AppBundle:Invoice:success.html.twig', array(
                'invoice' => $invoice,
            ));
        }

        return $this->render('AppBundle:Invoice:add.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
