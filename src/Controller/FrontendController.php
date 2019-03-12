<?php

namespace App\Controller;

use App\Entity\Contact;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Booking;
use App\Form\BookingType;
use App\Form\ContactType;
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
        $form = $this->createForm(ContactType::class,
            new Contact(),
            ['action'=> $this->generateUrl('contact'),
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


    /**
     * @Route("/contact",
     *     name="contact")
     */
    public function contact(Request $request,  \Swift_Mailer $mailer)
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($contact);
            $entityManager->flush();


            $message = (new \Swift_Message('Nuevo mensaje en Vinales.taxi'))
                ->setFrom('messages@taxidriverscuba.com')
                ->setTo('taxidriverscuba@gmail.com')
                ->setCc(['14ndy15@gmail.com','josmiguel92@gmail.com'])


                ->setBody(
                    $this->renderView(
                    // templates/emails/registration.html.twig
                        'emails/contact.html.twig',
                        ['contact' => $contact]
                    ),
                    'text/html'
                )
                ->addPart(
                    $this->renderView(
                        'emails/contact.txt.twig',
                        ['contact' => $contact]
                    ),
                    'text/plain'
                )
            ;

            $mailer->send($message);

            //todo: enviar form mediante AJAX para evitar la redireccion al home
            //return $this->json(['info'=>'Message delivered'], 200);
        }

        return $this->redirectToRoute('frontend');
        //return $this->json(['info'=>'The form is not valid'], 400);
    }
}
