<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add(
                'fullname',
                TextType::class,
                [
                    'required' => false,
                    'attr' => [
                        'placeholder' => 'Full Name',
                        'class' => 'ui big input'
                    ]
                ]
            )
            ->add(
                'email',
                EmailType::class,
                [
                    'required' => false,
                    'attr' => [
                        'placeholder' => 'Email'
                    ]
                ]
            )
            ->add(
                'username',
                TextType::class,
                [
                    'required' => false,
                    'attr' => [
                        'placeholder' => 'Username'
                    ]
                ]
            )

            ->add('Roles', ChoiceType::class, [
                'choices'  => [
                    'Select Role' => null,
                    'User' => true,
                    'Administrator' => false,
                ],
            ])
//            ->add('Password', PasswordType::class, [
//                // instead of being set onto the object directly,
//                // this is read and encoded in the controller
//                'mapped' => false,
//                'attr' => ['autocomplete' => 'new-password'],
//                'constraints' => [
//                    new NotBlank([
//                        'message' => 'Please enter a password',
//                    ]),
//                    new Length([
//                        'min' => 8,
//                        'minMessage' => 'Your password should be at least 8 characters',
//                        // max length allowed by Symfony for security reasons
//                        'max' => 4096,
//                    ]),
//                ],
//            ]);

            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => 'The password fields must match.',
                'options' => [
                    'attr' => [
                        'class' => 'password-field'
                    ],
                    'constraints' => [
                        new NotBlank([
                            'message' => 'Please enter a password',
                        ]),
                        new Length([
                            'min' => 8,
                            'minMessage' => 'Your password should be at least 8 characters',
                            // max length allowed by Symfony for security reasons
                            'max' => 4096,
                        ]),
                    ],
                ],
                'required' => true,
                'first_options' => [
                    'label' => 'Password',
                    'attr' => [
                        'placeholder' => 'Password'
                    ]
                ],
                'second_options' => [
                    'label' => 'Confirm Password',
                    'attr' => [
                        'placeholder' => 'Confirm Password'
                    ]
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
