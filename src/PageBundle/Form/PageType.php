<?php

namespace PageBundle\Form;

use Ivory\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Vich\UploaderBundle\Form\Type\VichFileType;

class PageType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', null, array('label'=> 'Заголовок', 'required' => false))
            ->add('linkNew', null, array('label'=> 'Ссылка URL', 'required' => false))
            ->add('content', CKEditorType::class, array(
                'config' => array(
                    'uiColor' => '#ffffff',
                ),
                'label'=> 'Контент',
                'required' => false,
            ))
            ->add('metaDescription', null, array('label'=> 'SEO - Описание', 'required' => false))
            ->add('metaKeywords', null, array('label'=> 'SEO - Ключевые слова', 'required' => false))
            ->add('link', null, array('label'=> 'Автоматическая ссылка', 'required' => false))
            ->add('published', null, array('label'=>'Опубликованно?'))

        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'PageBundle\Entity\Page'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'contentbundle_page';
    }
}
