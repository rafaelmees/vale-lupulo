<?php

namespace AlunoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class AlunoType extends AbstractType {

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
            ->add('nome', TextType::class)
            ->add('email', EmailType::class)
            ->add('american_pale_ale', CheckboxType::class, [
                'required' => false,
            ])
            ->add('catarina_sour', CheckboxType::class, [
                'required' => false,
            ])
            ->add('cpf', TextType::class, [
                'attr' => [
                    'class' => 'mask-cpf'
                ],
            ])
            ->add('telefone', TextType::class, [
                'attr' => [
                    'class' => 'mask-phone'
                ],
            ])
            ->add('dataNascimento', DateType::class, [
                'attr' => [
                    'class' => 'mask-date'
                ],
                'widget' => 'single_text',
                'html5' => false,
                'format' => 'dd/MM/yyyy',
            ])
            ->add('cep', TextType::class, [
                'attr' => [
                    'class' => 'mask-cep'
                ],
            ])
            ->add('rua', TextType::class)
            ->add('numero', IntegerType::class)
            ->add('bairro', TextType::class)
            ->add('estado', ChoiceType::class, [
                'choices' => [
                    '' => '',
                    'Acre' => 'Acre',
                    'Alagoas' => 'Alagoas',
                    'Amapá' => 'Amapá',
                    'Amazonas' => 'Amazonas',
                    'Bahia' => 'Bahia',
                    'Ceará' => 'Ceará',
                    'Distrito Federal' => 'Distrito Federal',
                    'Espírito Santo' => 'Espírito Santo',
                    'Goiás' => 'Goiás',
                    'Maranhão' => 'Maranhão',
                    'Mato Grosso' => 'Mato Grosso',
                    'Mato Grosso do Sul' => 'Mato Grosso do Sul',
                    'Minas Gerais' => 'Minas Gerais',
                    'Pará' => 'Pará',
                    'Paraíba' => 'Paraíba',
                    'Paraná' => 'Paraná',
                    'Pernambuco' => 'Pernambuco',
                    'Piauí' => 'Piauí',
                    'Rio de Janeiro' => 'Rio de Janeiro',
                    'Rio Grande do Norte' => 'Rio Grande do Norte',
                    'Rio Grande do Sul' => 'Rio Grande do Sul',
                    'Rondônia' => 'Rondônia',
                    'Roraima' => 'Roraima',
                    'Santa Catarina' => 'Santa Catarina',
                    'São Paulo' => 'São Paulo',
                    'Sergipe' => 'Sergipe',
                    'Tocantins' => 'Tocantins',
                ],
            ])
            ->add('cidade', TextType::class)
            ->add('complemento', TextType::class, [
                'required' => false,
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'AlunoBundle\Entity\Aluno'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix() {
        return 'alunobundle_aluno';
    }
}
