<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Booking;
use App\Form\BookingType;

class FrontendController extends AbstractController
{
    /**
     * @Route("/{_locale}",
     *     defaults={"_locale": "en"},
     *     requirements={"_locale": "en|es|fr"},
     *     name="frontend")
     */
    public function index($_locale)
    {
        $form = $this->createForm(BookingType::class,
            new Booking(),
            ['action'=> $this->generateUrl('booking_new'),
            'method'=>'POST']);

        return $this->render('frontend/index.html.twig', [
            'controller_name' => 'FrontendController',
            'form' => $form->createView(),
        ]);
    }
}
