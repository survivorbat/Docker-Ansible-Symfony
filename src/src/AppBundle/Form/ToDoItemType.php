<?php

namespace AppBundle\Form;

use AppBundle\Entity\ToDoItem;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ToDoItemType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'Title'
            ])
            ->add('description', TextType::class, [
                'label' => 'Description'
            ])
            ->add('status', ChoiceType::class, [
                'label' => 'Status',
                'choices' => [
                    ToDoItem::STATUS_TODO => ToDoItem::STATUS_TODO,
                    ToDoItem::STATUS_DOING => ToDoItem::STATUS_DOING,
                    ToDoItem::STATUS_DONE => ToDoItem::STATUS_DONE,
                ],
            ])
            ->add('relatedToDoItems', EntityType::class, [
                'label' => 'Related ToDo items',
                'class' => ToDoItem::class,
                'multiple' => true,
                'required' => false
            ])
        ;
    }

    /**
     * @return null|string
     */
    public function getBlockPrefix()
    {
        return 'todo';
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ToDoItem::class,
        ]);
    }
}
