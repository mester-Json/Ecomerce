<?php

namespace App\Form;

use App\Entity\Produit;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;


class ProduitsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add(
                'name',
                TextType::class,
                [
                    "constraints" => [
                        new NotBlank([
                            "message" => "Le nom du produit est obligatoire"
                        ]),
                        new Length([
                            "min" => 3,
                            "minMessage" => "Le nom du produit doit contenir au moins 3 caractères",
                            "max" => 255,
                            "maxMessage" => "Le nom du produit doit contenir au maximum 255 caractères"
                        ])
                    ],
                ]
            )

            ->add(
                'price',
                TextType::class,
                [
                    "constraints" => [
                        new NotBlank([
                            "message" => "Le prix du produit est obligatoire"
                        ]),
                        new Length([
                            "min" => 1,
                            "minMessage" => "Le prix du produit doit contenir au moins 1 caractères",
                            "max" => 255,
                            "maxMessage" => "Le prix du produit doit contenir au maximum 255 caractères"
                        ])
                    ],
                ]
            )
            ->add(
                'code',
                NumberType::class,
                [
                    "constraints" => [
                        new NotBlank([
                            "message" => "Le code du produit est obligatoire"
                        ]),
                        new Length([
                            "min" => 3,
                            "minMessage" => "Le code du produit doit contenir au moins 3 caractères",
                            "max" => 255,
                            "maxMessage" => "Le code du produit doit contenir au maximum 255 caractères"
                        ])
                    ],
                ]
            )
            // ->add(
            //     'url_img',
            //     TextType::class,
            //     [
            //         "constraints" => [
            //             new NotBlank([
            //                 "message" => "L'url de l'image du produit est obligatoire"
            //             ]),
            //             new Length([
            //                 "min" => 3,
            //                 "minMessage" => "L'url de l'image du produit doit contenir au moins 3 caractères",
            //                 "max" => 255,
            //                 "maxMessage" => "L'url de l'image du produit doit contenir au maximum 255 caractères"
            //             ])
            //         ],
            //     ]
            // )
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Produit::class,
        ]);
    }
}
