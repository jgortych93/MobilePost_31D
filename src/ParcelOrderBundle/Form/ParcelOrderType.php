<?php
/*wyświetlane liczby zgłoszeń dla adminisratora w parcelorder*/
namespace ParcelOrderBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use ParcelBundle\Form\ParcelType;


class ParcelOrderType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('tracking')
            ->add('notes')
            ->add('parcelOrderHash')
            ->add('parcel',ParcelType::class)
            ->add('sender',AdressDataType::class)
            ->add('receiver',AdressDataType::class)
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ParcelOrderBundle\Entity\ParcelOrder',
			'csrf_protection' => false

        ));
    }
}
