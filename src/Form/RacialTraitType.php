<?php
namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType; // Correct import for EntityType
use App\Entity\RacialTrait;
use App\Entity\Race; // Ensure the Race entity is imported

class RacialTraitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('size', ChoiceType::class, [
                'choices' => [
                    'Small' => 'Small',
                    'Medium' => 'Medium',
                    'Large' => 'Large'
                ],
                'label' => 'Size',
                'expanded' => false, // Set to true for radio buttons, false for a dropdown menu
                'required' => true,
            ])
            ->add('speed', TextType::class)
            ->add('extraLanguage', TextType::class)
            ->add('abilityBonus', TextType::class)
            ->add('racialAbility', TextType::class)
            ->add('race', EntityType::class, [  // Use EntityType to select Race
                'class' => Race::class,
                'choice_label' => 'id', // Adjust this to a more descriptive field if needed
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => RacialTrait::class,
        ]);
    }
}
