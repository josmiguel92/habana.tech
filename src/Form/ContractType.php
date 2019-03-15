<?php

namespace App\Form;

use App\Entity\Contract;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

use FOS\CKEditorBundle\Form\Type\CKEditorType;

class ContractType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('numero', null)
            ->add('nombre_vendedor', null, ['label'=>'Nombre de la Empresa', 'help'=>'Ej: SUMINISTROS ELECTRICOS ERKA S.L (SOCIEDAD UNIPERSONAL) '])
            ->add('vendedor', CKEditorType::class, ['label'=> 'Personeria del Vendedor', 'help'=>'Ej: La Compañía SUMINISTROS ELECTRICOS ERKA S.L (SOCIEDAD UNIPERSONAL) con domicilio legal en Polígono Txirrita Maleo Nº4, 20100, Errentería, Gipúzkoa,  San Sebastián, España y Licencia No. 539 de la Cámara de Comercio de Cuba del 04/04/1997,  Registro Mercantil, Tomo 269, Folio 164, Hoja 815, Inscripción  1ª del Libro de Sociedades, NIF: B-20.042842, cuenta bancaria ES05 0081 5182 5800 0105 0809, en el Banco Sabadell, código Swift No. BSABESBB'])
            ->add('representante_vendedor', CKEditorType::class, ['help'=>'Ej: el Sr. Marc Erick Schoettel en su carácter de Representante/Administrador Único'])
            ->add('objeto_contrato', null, ['help'=>'Luminarias led 200 W'])
            
            ->add('moneda', ChoiceType::class,[
                'choices'=>[
                    'EUR'=>'EUR',
                    'USD'=>'USD',
                ],'expanded'=>false
            ])
            ->add('precio_cfr', null, ['help'=>'267,797.67 EUR (Doscientos sesenta y siete mil setecientos noventa y siete con 67/100 EUR)'])
            ->add('precio_sin_inspeccion', null, ['help'=>'267.67 EUR (Doscientos sesenta y siete con 67/100 EUR)'])
            ->add('precio_inspeccion', null, ['help'=>'267.67 EUR (Doscientos sesenta y siete con 67/100 EUR)'])
            ->add('precio_flete', null, ['help'=>'267.67 EUR (Doscientos sesenta y siete con 67/100 EUR)'])
            
            ->add('tipo_carta_credito', null, ['help'=>'el cien por ciento (100%) a la Vista'])
            ->add('puerto_origen', null, ['help'=>'Puerto Limón en Costa Rica'])
            ->add('cantidad_embarques', null, ['help'=>'un (1) embarque'])
            ->add('cantidad_contenedores', null, ['help'=>'dos (2) contenedores, uno (1) de veinte pies y uno (1) de  cuarenta pies (1x20’+1x40’)'])
            ->add('tiempo_entrega', null, ['help'=>'catorce (14) semanas'])
            ->add('correo_comprador', null, ['help'=>'correo@huhuhu.jjjkjk'])
            ->add('tiempo_garantia', null, ['help'=>'dos (2) años'])
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contract::class,
        ]);
    }
}
