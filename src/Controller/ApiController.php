<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\BookingRepository;
use Symfony\Component\HttpFoundation\Response;

class ApiController extends AbstractController
{
    /**
     * @Route("/api", name="api")
     */
    public function index()
    {
        return $this->render('api/index.html.twig', [
            'controller_name' => 'ApiController',
        ]);
    }


    /**
     * @Route("/backend/api/booking/last2weeks_json", name="booking_last2weeks_json", methods={"GET"})
     */
    public function lastweek_json(BookingRepository $bookingRepository): Response
    {
        $max_days = 15;
        $bookings = $bookingRepository->createQueryBuilder("b")
            ->where("b.bookingTime > :last_week")
            ->setParameter("last_week", new \DateTime("-$max_days days"))
            ->orderBy("b.id", "DESC")
            ->getQuery()->getArrayResult();

        if(!$bookings)
            return $this->json(null, 404);

        $days = [];
        $day = $max_days;
        $calendar = [];
        $labels = [];
        while (count($days)<=$max_days and $day >= 0)
        {
            $_date = new \DateTime("now - $day days");
            $calendar[$_date->format('j/M')] = 0;
            $labels[]= $_date->format('j/M');
            $day--;
        }

        foreach ($bookings as $item){
            if (isset($calendar[$item['bookingTime']->format('j/M')]))
                $calendar[$item['bookingTime']->format('j/M')]++;
            else
                $calendar[$item['bookingTime']->format('j/M')] = 1;
        }

        return $this->json(['labels'=>$labels, 'bookings'=>array_values($calendar)]);
    }
}
