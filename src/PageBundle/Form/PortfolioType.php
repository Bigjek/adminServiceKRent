<?php

namespace PageBundle\Form;

use Ivory\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Vich\UploaderBundle\Form\Type\VichFileType;

class PortfolioType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', null, array('label'=> 'Заголовок', 'required' => false))
            ->add('videoid', null, array('label'=> 'Id видео ютуба', 'required' => false))
            ->add('content', CKEditorType::class, array(
                'config' => array(
                    'uiColor' => '#ffffff',
                ),
                'label'=> 'Описание',
            ))
            ->add('published', null, array('label'=>'Опубликованно?'))

        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'PageBundle\Entity\Portfolio'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'contentbundle_portfolio';
    }
}
