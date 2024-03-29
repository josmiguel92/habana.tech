<?php

namespace App\Controller;

use App\Entity\Booking;
use App\Form\BookingType;
use App\Repository\BookingRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class BookingController extends AbstractController
{
    /**
     * @Route("/backend/booking/", name="booking_index", methods={"GET"})
     * @Route("/backend/booking/p/{page}", name="booking_index_paged", methods={"GET"}, requirements={"page":"\d+"})
     */
    public function index(BookingRepository $bookingRepository, $page = 1): Response
    {
        $limit = 10;
        if($page == 0)
            $bookings = $bookingRepository->findAll();
        else
            $bookings = $bookingRepository->findBy([],['id'=>'DESC'],$limit, ($page-1)*$limit);

        $count = $bookingRepository->count([]);
        $last_page = $count%$limit;
        return $this->render('backend/booking/index.html.twig', [
            'bookings' => $bookings,
            'page' => $page,
            'count' => $count,
            'last_page' => $last_page,
        ]);
    }

    /**
     * @Route("/booking/new", name="booking_new", methods={"GET","POST"})
     * @Route("/backend/booking/new", name="backend_booking_new", methods={"GET","POST"})
     */
    public function new(Request $request, \Swift_Mailer $mailer): Response
    {
        $booking = new Booking();
        $form = $this->createForm(BookingType::class, $booking);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            //TODO: en prod. no se ha creado el schem
            $entityManager->persist($booking);
            $entityManager->flush();


            $message = (new \Swift_Message('Nueva reserva en Vinales.taxi - '.$booking->getOrderNumber()))
                ->setFrom('booking@taxidriverscuba.com')
                ->setTo('taxidriverscuba@gmail.com')
                ->setCc(['14ndy15@gmail.com','josmiguel92@gmail.com'])


                ->setBody(
                    $this->renderView(
                    // templates/emails/registration.html.twig
                        'emails/bookingNotification.html.twig',
                        ['booking' => $booking]
                    ),
                    'text/html',
                    'UTF-8'
                )
                ->addPart(
                    $this->renderView(
                        'emails/bookingNotification.txt.twig',
                        ['booking' => $booking]
                    ),
                    'text/plain',
                    'UTF-8'
                )
            ;

            $mailer->send($message);
            return $this->render('frontend/booked.html.twig', [
            ]);

            //return $this->redirectToRoute('booking_index');
        }

        return $this->render('backend/booking/new.html.twig', [
            'booking' => $booking,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/backend/booking/{id}", name="booking_show", methods={"GET"})
     */
    public function show(Booking $booking): Response
    {
        return $this->render('backend/booking/show.html.twig', [
            'booking' => $booking,
        ]);
    }

    /**
     * @Route("/backend/booking/{id}/edit", name="booking_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Booking $booking): Response
    {
        $form = $this->createForm(BookingType::class, $booking);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('booking_index', [
                'id' => $booking->getId(),
            ]);
        }

        return $this->render('backend/booking/edit.html.twig', [
            'booking' => $booking,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/backend/booking/{id}", name="booking_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Booking $booking): Response
    {
        if ($this->isCsrfTokenValid('delete'.$booking->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($booking);
            $entityManager->flush();
        }

        return $this->redirectToRoute('booking_edit');
    }


}
