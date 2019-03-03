<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Booking;
use App\Form\BookingType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;

class FrontendController extends AbstractController
{
    /**
     * @Route("/{_locale}",
     *     defaults={"_locale": "en"},
     *     requirements={"_locale": "en|es|fr"},
     *     name="frontend")
     *
     * @Cache(expires="+2 hour", maxage=15, public=true, mustRevalidate=false)
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

    /**
     * @Route("/{_locale}/booking",
     *     defaults={"_locale": "en"},
     *     requirements={"_locale": "en|es|fr"},
     *     name="booking")
     */
    public function booking($_locale)
    {
        $form = $this->createForm(BookingType::class,
            new Booking(),
            ['action'=> $this->generateUrl('booking_new'),
                'method'=>'POST']);

        return $this->render('frontend/booking.html.twig', [
            'controller_name' => 'FrontendController',
            'form' => $form->createView(),
        ]);
    }
}
