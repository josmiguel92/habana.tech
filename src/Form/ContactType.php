<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', null, [
                'required'=>true,
                'label'=>'Your name'
            ])
            ->add('email', EmailType::class,[
                'required'=>true,
                'label'=>'Your email'
            ])
            ->add('message', TextareaType::class,[
                'required'=>true,
                'label'=>'Your message'
            ])
            ->add('submit', SubmitType::class,[
                'attr'=>['class'=>'btn btn--primary-gradient'],
                    'label'=>'Send message',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
