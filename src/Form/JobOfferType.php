<?php

namespace App\Form;
use App\Entity\JobType;
use App\Entity\JobOffer;
use App\Entity\JobCategory;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;



class JobOfferType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('reference')
            ->add('active')
            ->add('notes')
            ->add('location')
            ->add('closingDate')
            ->add('salary')
             ->add('dateDeCreation',DateType::class)
            ->add('jobTypeId', EntityType::class,[
                'class' => JobType::class,
                'query_builder' => function (EntityRepository $er){
                    return $er->createQueryBuilder('JobType')
                    ->orderBy('JobType.jobType', 'ASC');
                },
                'choice_label' => 'job_type'
            ])
            ->add('job_category_id', EntityType::class,[
                'class' => JobCategory::class,
                'query_builder' => function (EntityRepository $er){
                    return $er->createQueryBuilder('JobCategory')
                    ->orderBy('JobCategory.jobCategory', 'ASC');
                },
                'choice_label' => 'job_category'
            ])

    //         ->add('clientId', ClientType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => JobOffer::class,
        ]);
    }
}
