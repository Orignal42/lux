<?php

namespace App\Form;

use App\Entity\Candidate;
use App\Entity\JobCategory;
use App\Entity\Experience;
use App\Entity\InfoAdminCandidat;
use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Form\Extension\Core\Type\FileType;


          



class CandidateType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('gender', ChoiceType::class, [
                'choices'  => [
                    'Transgenre' => null,
                    'Homme' => true,
                    'Femme' => false,
                ],
            ])
            ->add('firstName')
            ->add('lastName')
            ->add('adress')
            ->add('country')
            ->add('nationality')
            ->add('passport', FileType::class,[
                'mapped' => false,
                'required' => false,
                'constraints' => [
                    new File([
                        'maxSize' => '20000000k',
                        'mimeTypes' => [
                            'image/png',
                            'application/x-pdf',
                            'application/pdf',
                            'image/jpg',
                            'image/gif',
                        ],
                        'mimeTypesMessage' => 'Please upload a valid document',
                        ])
                    ],
                ])
                ->add('cv', FileType::class,[
                    'mapped' => false,
                    'required' => false,
                    'constraints' => [
                        new File([
                            'maxSize' => '20000000k',
                            'mimeTypes' => [
                                'image/png',
                                'application/x-pdf',
                                'application/pdf',
                                'image/jpg',
                                'image/gif',
                            ],
                            'mimeTypesMessage' => 'Please upload a valid document',
                            ])
                        ],
                ])
                ->add('profil_picture', FileType::class,[
                'mapped' => false,
                'required' => false,
                'constraints' => [
                    new File([
                        'maxSize' => '20000000k',
                        'mimeTypes' => [
                            'image/png',
                            'application/x-pdf',
                            'application/pdf',
                            'image/jpg',
                            'image/gif',
                        ],
                        'mimeTypesMessage' => 'Please upload a valid document',
                        ])
                    ],
                ])
            ->add('currentLocation')
            ->add('dateOfBirth',BirthdayType::class)
            ->add('placeOfBirth')
            ->add('description')
            ->add('experienceId',EntityType::class,[
            'class' => Experience::class,
            'query_builder' => function (EntityRepository $er){
                return $er->createQueryBuilder('Experience')
                ->orderBy('Experience.experience', 'ASC');
            },
            'choice_label' => 'experience'
        ])
            // ->add('infoAdminCandidatId')
            ->add('job_category_id', EntityType::class,[
                'class' => JobCategory::class,
                'query_builder' => function (EntityRepository $er){
                    return $er->createQueryBuilder('JobCategory')
                    ->orderBy('JobCategory.jobCategory', 'ASC');
                },
                'choice_label' => 'job_category'
            ])
            // ->add('userId',RegistrationFormType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Candidate::class,
        ]);
    }
}

         
