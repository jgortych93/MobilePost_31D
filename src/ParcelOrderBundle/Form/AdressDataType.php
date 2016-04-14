<?php
namespace ParcelOrderBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
class AdressDataType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('city')
            ->add('postal_code')
            ->add('street')
            ->add('first_name')
            ->add('last_name')
            ->add('phone')
            ->add('email')
            ->add('weight')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'PAI\ParcelBundle\Entity\Parcel',
            'csrf_protection' => false
        ));
    }
}