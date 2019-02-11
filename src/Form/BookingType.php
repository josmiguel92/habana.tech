<?php

namespace App\Form;

use App\Entity\Booking;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;

class BookingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('peopleCount')
            ->add('pickupDate', DateType::class, ['widget'=>'single_text'])
            ->add('pickupTime', TimeType::class)
            ->add('tourOption')

            ->add('airportPickup')
            ->add('flyNumber')
            ->add('pickupPlace')

            ->add('clientName')
            ->add('clientEmail')
            ->add('telephone')

            ->add('returnTravel')
            ->add('returnPickupPlace')
            ->add('returnPickupDate', DateType::class, ['widget'=>'single_text'])
            ->add('returnPickupTime', TimeType::class)

            ->add('bookingLang', HiddenType::class)
            ->add('campaign',HiddenType::class)

            ->add('firstCheckValue', HiddenType::class)
            ->add('secondCheckValue', HiddenType::class)
            ->add('thirdCheckValue', HiddenType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Booking::class,
        ]);
    }
}
